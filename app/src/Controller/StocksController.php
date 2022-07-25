<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

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
        $stocks = $this->paginate($this->Stocks,['contain'=>['Productions']]);

        $this->set(compact('stocks'));
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
            'contain' => ['Productions'],
        ]);

        $this->set(compact('stock'));
    }

    

    /**
     * Edit method
     *
     * @param string|null $id Stock id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $stock = $this->Stocks->get($id, [
            'contain' => ['Productions'],
        ]);
        $connection = ConnectionManager::get('default');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $connection->begin(); // トランザクション開始
            try {
                $stock = $this->Stocks->patchEntity($stock, $this->request->getData());
                if ($this->Stocks->save($stock)) {
                    $connection->commit(); // 保存に成功したためコミット
                    $this->Flash->success(__('在庫情報が保存されました。'));

                    return $this->redirect(['action' => 'index']);
                }
                $connection->rollback(); // 保存に失敗したためロールバック
                $this->Flash->error(__('在庫情報が保存されませんでした。もう一度試してください。'));
            }catch (\Exception $e){
                $connection->rollback();
                $this->Flash->error(__('在庫情報が保存されませんでした。もう一度試してください。'));

            }
        }
        $this->set(compact('stock'));
        
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
        $stock = $this->Stocks->get($id);
        if ($this->Stocks->delete($stock)) {
            $this->Flash->success(__('在庫情報が削除されました。'));
        } else {
            $this->Flash->error(__('在庫情報が削除されませんでした。もう一度試してください。'));
        }

        return $this->redirect(['action' => 'index']);
    }


    /**
     * csvToPage
     * @info  output orders to browser as csv.
     * @param nothing.
     * @return nothing.
     */
    public function csvToPage(){
        $stocks=$this->Stocks->find('all',['contain'=>['Productions']]);
        $this->set(compact('stocks'));
    }
    /**
     * csvToFile method
     * @info make csv file.
     * @param nothing.
     * @return nothing.
     */
    public function csvToFile()
    {

        date_default_timezone_set('Asia/Tokyo');
        $file = fopen(date('Y-m-d_Hi') . '.csv', 'w');
        if ($file) {
            fputcsv($file, ['id', '名称', '価格', '在庫数', '作成日', '変更日']);
            $data = $this->Stocks->find('all', ['contain' => ['Productions']]);
            foreach ($data as $row) {
                fputcsv(
                    $file,
                    [
                        $row['id'],
                        $row['production']['name'],
                        $row['production']['price'],
                        $row['stock_quantity'],
                        $row['created'],
                        $row['modified']
                    ]
                );
            }
        }
        if (fclose($file)) {
            $this->Flash->success(__('CSV出力が成功しました。'));
        } else {
            $this->Flash->error(__('CSV出力が失敗しました。もう一度試してください。'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        if (in_array($action, ['csvToFile','csvToPage'])) {
            return true;
        }
        if (in_array($action, ['edit'])) {
            if($this->Auth->user('authority')==='在庫発注管理者')
            return true;
        }

        // 他のすべてのアクションにはスラッグが必要です。
        $slug = $this->request->getParam('pass.0');
        if (!$slug) {
            return false;
        }

    }
}
