<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * PenggunaAuth Controller
 *
 * @property \App\Model\Table\PenggunaAuthTable $PenggunaAuth
 *
 * @method \App\Model\Entity\PenggunaAuth[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PenggunaAuthController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Peran']
        ];

        $penggunaAuth = $this->paginate($this->PenggunaAuth);

        $this->set(compact('penggunaAuth'));
    }

    /**
     * View method
     *
     * @param string|null $id Pengguna Auth id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $penggunaAuth = $this->PenggunaAuth->get($id, [
            'contain' => []
        ]);

        $this->set('penggunaAuth', $penggunaAuth);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $penggunaAuth = $this->PenggunaAuth->newEntity();
        if ($this->request->is('post')) {
            $penggunaAuth = $this->PenggunaAuth->patchEntity($penggunaAuth, $this->request->getData());
            if ($this->PenggunaAuth->save($penggunaAuth)) {
                $this->Flash->success(__('The pengguna auth has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pengguna auth could not be saved. Please, try again.'));
        }

        $peran = $this->PenggunaAuth->Peran->find('list');

        $this->set('peran',$peran);

        $this->set(compact('penggunaAuth'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pengguna Auth id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $penggunaAuth = $this->PenggunaAuth->get($id, [
            'contain' => []
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $penggunaAuth = $this->PenggunaAuth->patchEntity($penggunaAuth, $this->request->getData());
            if ($this->PenggunaAuth->save($penggunaAuth)) {
                $this->Flash->success(__('The pengguna auth has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pengguna auth could not be saved. Please, try again.'));
        }
        $peran = $this->PenggunaAuth->Peran->find('list');
        $this->set('peran',$peran);
        $this->set(compact('penggunaAuth'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pengguna Auth id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $penggunaAuth = $this->PenggunaAuth->get($id);
        if ($this->PenggunaAuth->delete($penggunaAuth)) {
            $this->Flash->success(__('The pengguna auth has been deleted.'));
        } else {
            $this->Flash->error(__('The pengguna auth could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $penggunaAuth = $this->Auth->identify();
            if ($penggunaAuth) {
                $this->Auth->setUser($penggunaAuth);
                if($this->Auth->user('key_peran') == '1')
                {
                    return $this->redirect(array('controller' => 'Topik', 'action' => 'home', 'prefix' =>'admin'));
                }else{
                    return $this->redirect(array('controller' => 'Pengerjaan', 'action' => 'index', 'prefix' =>'pelajar'));
                }
                
            }
            $this->Flash->error(__('Invalid email or password, try again'));
        }
    }

    public function changePassword() 
    {
        $session = $this->request->session();
        $key_pengguna = $session->read('Auth.User.key_pengguna');

        $user = $this->PenggunaAuth->get($key_pengguna);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->PenggunaAuth->patchEntity($user, $this->request->data);
            if ($this->PenggunaAuth->save($user)) {
                $this->Flash->success(__('Password Berhasil Diganti'));
                return;
            } 
            else 
            {
                $this->Flash->error(__($user->errors('current_password')));
                $this->Flash->error(__($user->errors('password')));
                $this->Flash->error(__($user->errors('confirm_password')));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    } 
}
