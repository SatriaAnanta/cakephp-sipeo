<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Network\Exception\NotFoundException;
use Cake\Routing\Router;
use Cake\View\Exception\MissingTemplateException;
use Cake\Mailer\Email;
use Cake\Datasource\ConnectionManager;

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
                    return $this->redirect(array('controller' => 'Pengguna', 'action' => 'home', 'prefix' =>'pelajar'));
                }  
            }

            $this->Flash->error(__('Username atau password salah, silahkan coba lagi.'));
        }
    }

    public function logout()
    {
        $session = $this->request->session();
        $session->destroy();
        return $this->redirect($this->Auth->logout());
    }

    public function register()
    {
        $Pengguna = TableRegistry::get('pengguna');
        $penggunaAuth = $this->PenggunaAuth->newEntity();
        $datasource = $this->PenggunaAuth->connection();
            if ($this->request->is('post')) {
                $otp=substr(md5(microtime()),0,10);
                $penggunaAuth = $this->PenggunaAuth->patchEntity($penggunaAuth, $this->request->getData('penggunaAuth'));
                $penggunaAuth->otp=$otp;
                $datasource->begin();
                
                if ($this->PenggunaAuth->save($penggunaAuth)) {
                    $pengguna = $Pengguna->newEntity();
                    $pengguna = $Pengguna->patchEntity($pengguna, $this->request->getData('pengguna'));
                    $getUserEmail = $this->request->getData('pengguna.email');
                    $pengguna->key_pengguna = $penggunaAuth->key_pengguna;

                    if ($Pengguna->save($pengguna))
                        {
                        $bodyEmail = "Anda telah berhasil melakukan registrasi.";
                        $bodyEmail .= "Untuk mengaktifkan akun klik link dibawah";
                        $aLink = Router::url(array("controller"=>"PenggunaAuth","action"=>"activate", $otp),true);
                        $bodyEmail .= '<p><br><br><a style="width:50%;color:#fff;text-decoration:none;background:#333;display:block;padding:10px;text-align:center;-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;margin:10px auto " href="'.$aLink.'"> Aktifkan Akun </a></p>';
                        $email = new Email();
                        $email->transport('default');
                        $email
                            ->template('themetemplate', 'themelayout')
                            ->subject('Registrasi Berhasil')
                            ->set(["content" => $bodyEmail , 'title'=>'Registrasi Berhasil'])
                            ->emailFormat('html')
                            ->to($getUserEmail)
                            ->from('sipeo@sipeo.com')
                            ->send();

                            $this->Flash->success(__('Proses Registrasi Berhasil Harap Verifikasi Email Anda'));
                        }

                    else{
                        $datasource->rollback();
                        $this->Flash->error(__($pengguna->errors('email')));
                    }
                    
                    $datasource->commit();
                    //return $this->redirect('/login');

                } else{
                    $this->Flash->error(__($penggunaAuth->errors('username')));
                }
               }
               else{
                
               }
               
    }

    public function activate($otp) 
    {
        $this->autoRender = false;
       if(trim($otp)!="") {
         $otp = filter_var($otp, FILTER_SANITIZE_STRING);
         $getUser = $this->PenggunaAuth->find('all',['conditions'=> ['otp'=> $otp,'status'=> 0]])->first(); 
         if($getUser) {
           $getUserId = $getUser->key_pengguna;
           $updateActivate  = $this->PenggunaAuth->updateAll(['status'=> 1, 'otp'=> ''], ['key_pengguna'=> $getUserId]);
           $this->Flash->success(__('Your account has been Activated successfully. please login')); 
         }
       }

    }
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['login', 'logout','register','activate']);
    } 
      
}
