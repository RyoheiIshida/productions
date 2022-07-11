<?php
namespace App\Controller;

use App\Controller\AppController;

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
            'contain' => [],
        ]);

        $this->set('production', $production);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $production = $this->Productions->newEntity();
        if ($this->request->is('post')) {
            $production = $this->Productions->patchEntity($production, $this->request->getData());
            if ($this->Productions->save($production)) {
                $this->Flash->success(__('The production has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The production could not be saved. Please, try again.'));
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
        $production = $this->Productions->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $production = $this->Productions->patchEntity($production, $this->request->getData());
            if ($this->Productions->save($production)) {
                $this->Flash->success(__('The production has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The production could not be saved. Please, try again.'));
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
            $this->Flash->success(__('The production has been deleted.'));
        } else {
            $this->Flash->error(__('The production could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
