<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pengguna Controller
 *
 * @property \App\Model\Table\PenggunaTable $Pengguna
 *
 * @method \App\Model\Entity\Pengguna[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PenggunaController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $pengguna = $this->paginate($this->Pengguna);

        $this->set(compact('pengguna'));
    }

    /**
     * View method
     *
     * @param string|null $id Pengguna id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pengguna = $this->Pengguna->get($id, [
            'contain' => []
        ]);

        $this->set('pengguna', $pengguna);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pengguna = $this->Pengguna->newEntity();
        if ($this->request->is('post')) {
            $pengguna = $this->Pengguna->patchEntity($pengguna, $this->request->getData());
            if ($this->Pengguna->save($pengguna)) {
                $this->Flash->success(__('The pengguna has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pengguna could not be saved. Please, try again.'));
        }
        $this->set(compact('pengguna'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pengguna id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pengguna = $this->Pengguna->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pengguna = $this->Pengguna->patchEntity($pengguna, $this->request->getData());
            if ($this->Pengguna->save($pengguna)) {
                $this->Flash->success(__('The pengguna has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pengguna could not be saved. Please, try again.'));
        }
        $this->set(compact('pengguna'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pengguna id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pengguna = $this->Pengguna->get($id);
        if ($this->Pengguna->delete($pengguna)) {
            $this->Flash->success(__('The pengguna has been deleted.'));
        } else {
            $this->Flash->error(__('The pengguna could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function profil($id = null)
    {
        $Topik = TableRegistry::get('topik');
        $session = $this->request->session();
        $key_pengguna = $session->read('Auth.User.key_pengguna');
        
        $pengguna = $this->Pengguna
        ->find('all')
        ->where(['Pengguna.key_pengguna' => $key_pengguna])
        ->contain(['PenggunaAuth','PenggunaAuth.Peran']);
        foreach ($pengguna as $pengguna) {
        }
        $this->set('pengguna', $pengguna);
    }
}
