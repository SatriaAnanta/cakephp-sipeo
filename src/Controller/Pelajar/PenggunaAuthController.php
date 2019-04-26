<?php
namespace App\Controller\Pelajar;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Network\Exception\NotFoundException;
use Cake\Routing\Router;
use Cake\View\Exception\MissingTemplateException;
use Cake\Mailer\Email;
use Cake\Auth\DefaultPasswordHasher;


/**
 * PenggunaAuth Controller
 *
 * @property \App\Model\Table\PenggunaAuthTable $PenggunaAuth
 *
 * @method \App\Model\Entity\PenggunaAuth[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */

class PenggunaAuthController extends AppController
{
    
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

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['login']);
    } 
      
}
