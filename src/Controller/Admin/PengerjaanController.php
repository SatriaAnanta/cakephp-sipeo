<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Pengerjaan Controller
 *
 * @property \App\Model\Table\PengerjaanTable $Pengerjaan
 *
 * @method \App\Model\Entity\Pengerjaan[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PengerjaanController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $pengerjaan = $this->paginate($this->Pengerjaan);

        $this->set(compact('pengerjaan'));
    }

    /**
     * View method
     *
     * @param string|null $id Pengerjaan id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pengerjaan = $this->Pengerjaan->get($id, [
            'contain' => []
        ]);

        $this->set('pengerjaan', $pengerjaan);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pengerjaan = $this->Pengerjaan->newEntity();
        if ($this->request->is('post')) {
            $pengerjaan = $this->Pengerjaan->patchEntity($pengerjaan, $this->request->getData());
            if ($this->Pengerjaan->save($pengerjaan)) {
                $this->Flash->success(__('The pengerjaan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pengerjaan could not be saved. Please, try again.'));
        }
        $this->set(compact('pengerjaan'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pengerjaan id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pengerjaan = $this->Pengerjaan->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pengerjaan = $this->Pengerjaan->patchEntity($pengerjaan, $this->request->getData());
            if ($this->Pengerjaan->save($pengerjaan)) {
                $this->Flash->success(__('The pengerjaan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pengerjaan could not be saved. Please, try again.'));
        }
        $this->set(compact('pengerjaan'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pengerjaan id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pengerjaan = $this->Pengerjaan->get($id);
        if ($this->Pengerjaan->delete($pengerjaan)) {
            $this->Flash->success(__('The pengerjaan has been deleted.'));
        } else {
            $this->Flash->error(__('The pengerjaan could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
