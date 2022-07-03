<?php

namespace App\Controller;

use App\Model\Entity\Stock;
use App\Controller\AppController;

/**
 * Stocks Controller
 *
 * @property \App\Model\Table\StocksTable $Stocks
 *
 * @method \App\Model\Entity\Stock[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StocksController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $stocks = $this->paginate($this->Stocks);
        $login_user = $this->Auth->user();
        $this->set(compact('stocks', 'login_user'));
    }

    /**
     * View method
     *
     * @param string|null $id Stock id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $stock = $this->Stocks->get($id, [
            'contain' => [],
        ]);
        $login_user = $this->Auth->user();
        $this->set(compact('stock', 'login_user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $stock = $this->Stocks->newEntity();
        if ($this->request->is('post')) {
            $stock = $this->Stocks->patchEntity($stock, $this->request->getData());
            if ($this->Stocks->save($stock)) {
                $this->Flash->success(__('The stock has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stock could not be saved. Please, try again.'));
        }
        $login_user = $this->Auth->user();
        $this->set(compact('stock', 'login_user'));
    }

    /**
     * Edit method
     * 
     * @info Edit method change stock['status'] and stock['order_quantity'] according to user['authority'].
     * @param string|null $id Stock id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $stock = $this->Stocks->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $stock = $this->Stocks->patchEntity($stock, $this->request->getData());
            $authority = $this->Auth->user('authority');

            #ユーザーの権限ごとに処理を分類
            if ($authority === '在庫発注社員' and ($stock['status'] === '発注受け取り済み' or $stock['status'] === '初期ステータス')) {
                $stock['status'] = '発注確認';
            } elseif ($authority === '在庫発注管理者' and $stock['status'] === '発注確認') {
                $stock['status'] = '発注状態';
            } elseif ($authority === '在庫受注社員' and $stock['status'] === '発注状態') {
                $stock['status'] = '発注済み';
            } elseif ($authority === '在庫発注管理者' and $stock['status'] === '発注済み') {
                $stock['status'] = '発注受け取り済み';
                $stock['stock_quantity'] = $stock['stock_quantity'] + $stock['order_quantity'];
                $stock['order_quantity'] = 0;
            } else {
                return $this->Flash->error(__('The stock could not be saved. Please, try again.'));
                debug('else');
            }

            if ($this->Stocks->save($stock)) {
                $this->Flash->success(__('The stock has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stock could not be saved. Please, try again.'));
        }
        $login_user = $this->Auth->user();
        $this->set(compact('stock', 'login_user'));

    }

    /**
     * Delete method
     *
     * @param string|null $id Stock id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $stock = $this->Stocks->get($id);
        if ($this->Stocks->delete($stock)) {
            $this->Flash->success(__('The stock has been deleted.'));
        } else {
            $this->Flash->error(__('The stock could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        // add アクションは、常にログインしているユーザーに許可されます。
        if (in_array($action, ['add'])) {
            return true;
        }

        // 他のすべてのアクションにはスラッグが必要です。
        $slug = $this->request->getParam('pass.0');
        if (!$slug) {
            return false;
        }

        $authority = $this->Auth->user([('authority')]);
        $status = $this->Stocks->get($this->request->getParam('pass.0'))['status'];

        if ($authority === '在庫発注社員' and ($status === '発注受け取り済み' or $status === '初期ステータス')) {
            return true;
        } elseif ($authority === '在庫発注管理者' and $status === '発注確認') {
            return true;
        } elseif ($authority === '在庫受注社員' and $status === '発注状態') {
            return true;
        } elseif ($authority === '在庫発注管理者' and $status === '発注済み') {
            return true;
        }
    }

}
