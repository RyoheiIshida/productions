<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;


/**
 * Productions Controller
 *
 * @property \App\Model\Table\ProductionsTable $Productions
 *
 * @method \App\Model\Entity\Production[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $productions = $this->paginate($this->Productions);

        $this->set(compact('productions'));
    }

    /**
     * View method
     *
     * @param string|null $id Production id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $production = $this->Productions->get($id, [
            'contain' => ['Stocks', 'Orders'],
        ]);

        $this->set(compact('production'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        date_default_timezone_set('Asia/Tokyo');
        $production = $this->Productions->newEntity();
        $stock = $this->Productions->Stocks->newEntity();
        $connection = ConnectionManager::get('default');
        if ($this->request->is('post')) {
            $connection->begin(); // トランザクション開始
            try {
                $production = $this->Productions->patchEntity($production, $this->request->getData());
                if ($this->Productions->save($production)) {
                    $stock->productions_id = $production->id;
                    if ($this->Productions->Stocks->save($stock)) {
                        $connection->commit(); // 保存に成功したためコミット
                        $this->Flash->success(__('商品情報を保存しました。'));

                        return $this->redirect(['action' => 'index']);
                    }
                }
                $connection->rollback(); // 保存に失敗したためロールバック
                $this->Flash->error(__('商品情報を保存できませんでした。もう一度試してください。'));
            } catch (\Exception $e) { // 例外処理
                $connection->rollback();
                $this->Flash->error(__('商品情報を保存できませんでした。もう一度試してください。'));
            }
        }
        $this->set(compact('production'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Production id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        date_default_timezone_set('Asia/Tokyo');
        $production = $this->Productions->get($id, [
            'contain' => [],
        ]);
        $connection = ConnectionManager::get('default');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $connection->begin(); // トランザクション開始
            try {
                $production = $this->Productions->patchEntity($production, $this->request->getData());
                if ($this->Productions->save($production)) {
                    $connection->commit(); // 保存に成功したためコミット
                    $this->Flash->success(__('商品情報が保存されました。'));

                    return $this->redirect(['action' => 'index']);
                }
                $connection->rollback(); // 保存に失敗したためロールバック
                $this->Flash->error(__('商品情報が保存されませんでした。もう一度試してください。'));
            } catch (\Throwable $e) { // 例外処理
                $connection->rollback();
                $this->Flash->error(__('商品情報が保存されませんでした。もう一度試してください。'));
            }
        }
        $this->set(compact('production'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Production id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $production = $this->Productions->get($id);
        if ($this->Productions->delete($production)) {
            $this->Flash->success(__('商品情報が削除されました。'));
        } else {
            $this->Flash->error(__('商品情報が削除されませんでした。もう一度試してください。'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');

        if (in_array($action, ['add'])) {

            if ($user['authority'] === '在庫受注社員') {
                return false;
            } elseif ($user['authority'] === '在庫発注社員' or $user['authority'] === '在庫発注管理者') {
                return true;
            }
        }
        if (in_array($action, ['edit'])) {
            if ($user['authority'] === '在庫発注管理者')
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
