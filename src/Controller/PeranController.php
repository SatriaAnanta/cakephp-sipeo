<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Peran Controller
 *
 * @property \App\Model\Table\PeranTable $Peran
 *
 * @method \App\Model\Entity\Peran[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PeranController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $peran = $this->paginate($this->Peran);

        $this->set(compact('peran'));
    }

    /**
     * View method
     *
     * @param string|null $id Peran id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $peran = $this->Peran->get($id, [
            'contain' => []
        ]);

        $this->set('peran', $peran);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $peran = $this->Peran->newEntity();
        if ($this->request->is('post')) {
            $peran = $this->Peran->patchEntity($peran, $this->request->getData());
            if ($this->Peran->save($peran)) {
                $this->Flash->success(__('The peran has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The peran could not be saved. Please, try again.'));
        }
        $this->set(compact('peran'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Peran id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $peran = $this->Peran->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $peran = $this->Peran->patchEntity($peran, $this->request->getData());
            if ($this->Peran->save($peran)) {
                $this->Flash->success(__('The peran has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The peran could not be saved. Please, try again.'));
        }
        $this->set(compact('peran'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Peran id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $peran = $this->Peran->get($id);
        if ($this->Peran->delete($peran)) {
            $this->Flash->success(__('The peran has been deleted.'));
        } else {
            $this->Flash->error(__('The peran could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
