<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 *
 * @method \App\Model\Entity\Order[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Stocks', 'Productions'],
        ];
        $orders = $this->paginate($this->Orders);

        $this->set(compact('orders'));
    }

    /**
     * View method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => ['Stocks', 'Productions'],
        ]);

        $this->set(compact('order'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        date_default_timezone_set('Asia/Tokyo');
        if ($this->Auth->user('authority') !== '在庫発注社員' and $this->Auth->user('authority') !== '在庫発注管理者') {
            $this->Flash->error(__('権限がありません。管理者へお問い合わせください。'));
            return $this->redirect(['action' => 'index']);
        }

        $order = $this->Orders->newEntity();
        $connection = ConnectionManager::get('default');
        if ($this->request->is('post')) {
            $connection->begin(); // トランザクション開始
            try {
                if ($this->request->getData('status') !== '発注確認') {
                    $this->Flash->error(__('初期ステータスは発注確認を選択してください。'));
                    return $this->redirect(['action' => 'add']);
                }
                $order = $this->Orders->patchEntity($order, $this->request->getData());
                $stock = $this->Orders->Stocks->findByProductionsId($this->request->getData()['productions_id'])->first();
                $order['stocks_id'] = $stock['id'];
                if ($this->Orders->save($order)) {
                    $connection->commit(); // 保存に成功したためコミット
                    $this->Flash->success(__('発注情報が保存されました。'));

                    return $this->redirect(['action' => 'index']);
                }
                $connection->rollback(); // 保存に失敗したためロールバック
                $this->Flash->error(__('発注情報が保存されませんでした。もう一度試してください。'));
            } catch (\Exception $e) {
                $connection->rollback(); // 保存に失敗したためロールバック
                $this->Flash->error(__('発注情報が保存されませんでした。もう一度試してください。'));
            }
        }
        $stocks = $this->Orders->Stocks->find('list', ['limit' => 200]);
        $productions = $this->Orders->Productions->find('list', ['limit' => 200]);
        $this->set(compact('order', 'stocks', 'productions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        date_default_timezone_set('Asia/Tokyo');
        $order = $this->Orders->get($id, [
            'contain' => ['stocks'],
        ]);
        $connection = ConnectionManager::get('default');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $connection->begin(); // トランザクション開始
            try {
                if (
                    !$this->isEditableStatus(
                        $this->Auth->user('authority'),
                        $this->Orders->get($id)['status'],
                        $this->request->getData('status')
                    )
                ) {
                    $this->Flash->error(__('権限がありません。管理者へお問い合わせください。'));
                    return $this->redirect(['action' => 'index']);
                }

                $order = $this->Orders->patchEntity($order, $this->request->getData());
                if ($this->request->getData('status') === '発注受け取り済み') {
                    $stock = $this->Orders->Stocks->get($order['stocks_id']);
                    $stock['stock_quantity'] = $stock['stock_quantity'] + $order['order_quantity'];
                    if ($this->Orders->save($order, ['associated' => ['Stocks']]) and $this->Orders->Stocks->save($stock)) {
                        $connection->commit();
                        $this->Flash->success(__('発注情報が保存されました。'));
                        return $this->redirect(['action' => 'index']);
                    }
                }
                if ($this->Orders->save($order)) {
                    $connection->commit(); // 保存に成功したためコミット
                    $this->Flash->success(__('発注情報が保存されました。'));
                    return $this->redirect(['action' => 'index']);
                }
                $connection->rollback(); // 保存に失敗したためロールバック
                $this->Flash->error(__('発注情報が保存されませんでした。もう一度試してください。'));
            } catch (\Exception $e) {
                $connection->rollback(); // 保存に失敗したためロールバック
                $this->Flash->error(__('発注情報が保存されませんでした。もう一度試してください。'));
            }
        }
        $stocks = $this->Orders->Stocks->find('list', ['limit' => 200]);
        $productions = $this->Orders->Productions->find('list', ['limit' => 200]);
        $this->set(compact('order', 'stocks', 'productions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        if ($this->Orders->delete($order)) {
            $this->Flash->success(__('発注情報が削除されました。'));
        } else {
            $this->Flash->error(__('発注情報が削除されませんでした。もう一度試してください。'));
        }

        return $this->redirect(['action' => 'index']);
    }


    /**
     * @info whether user can or can't edit status of orders table 
     * @param string $authority users->authority,
     * @param string $bs before status.
     * @param string $as after status.
     * @return bool true means status is editable.
     */
    public function isEditableStatus($authority, $bs, $as)
    {
        if ($authority === '在庫発注管理者') {
            return true;
        } elseif ($authority === '在庫発注社員' and $bs === '発注状態' and $as === '発注済み') {
            return true;
        } elseif ($authority === '在庫受注社員' and $bs === '発注状態' and $as === '発注済み') {
            return true;
        } else {
            return false;
        }
    }
    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        if (in_array($action, ['add'])) {
            if ($user['authority'] === '在庫発注管理者' or $user['authority'] === '在庫発注社員') {
                return true;
            } 
        } 

        if (in_array($action, ['edit'])) {
                return true;
        }
        if (in_array($action, ['delete'])) {
            if ($user['authority'] === '在庫発注管理者') {
                return true;
            }
        }
        $slug = $this->request->getParam('pass.0');
        if (!$slug) {
            return false;
        }
    }
}
