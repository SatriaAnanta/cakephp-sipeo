<?php
namespace App\Controller\Pelajar;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Pengguna Controller
 *
 * @property \App\Model\Table\PenggunaTable $Pengguna
 *
 * @method \App\Model\Entity\Pengguna[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PenggunaController extends AppController
{
    public function view($id = null)
    {
        $pengguna = $this->Pengguna->get($id, [
            'contain' => []
        ]);

        $this->set('pengguna', $pengguna);
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
        $queryPengerjaan = $this->Pengguna->Pengerjaan
        ->find('all')
        ->where(['Pengerjaan.key_data_pengguna' => $pengguna->key_data_pengguna]);

        $this->set('pengerjaan',$queryPengerjaan->count());
        $this->set('pengguna', $pengguna);
    }

    public function home()
    {
        $Topik = TableRegistry::get('topik');
        $session = $this->request->session();
        $key_pengguna = $session->read('Auth.User.key_pengguna');
        $pengguna = $this->Pengguna
        ->find('all')
        ->select('key_data_pengguna')
        ->where(['Pengguna.key_pengguna' => $key_pengguna])
        ->contain(['PenggunaAuth']);
        foreach ($pengguna as $pengguna) {
        }
        $queryPertanyaan = $Topik->Materi->Pertanyaan->find('all');
        $queryPengerjaan = $this->Pengguna->Pengerjaan
        ->find('all')
        ->where(['Pengerjaan.key_data_pengguna' => $pengguna->key_data_pengguna]);
        $this->set('pertanyaan',$queryPertanyaan->count());
        $this->set('pengerjaan',$queryPengerjaan->count());
    }
    
    public function edit($id = null)
    {
        $pengguna = $this->Pengguna->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pengguna = $this->Pengguna->patchEntity($pengguna, $this->request->getData());
            if ($this->Pengguna->save($pengguna)) {
                $this->Flash->success(__('The pengguna has been saved.'));

                return $this->redirect(['action' => 'profil']);
            }
            $this->Flash->error(__('The pengguna could not be saved. Please, try again.'));
        }
        $this->set(compact('pengguna'));
    }
}
