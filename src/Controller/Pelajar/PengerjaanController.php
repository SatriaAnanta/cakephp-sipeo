<?php
namespace App\Controller\Pelajar;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Network\Http\Client;
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
        $Pengguna = TableRegistry::get('pengguna');
        $session = $this->request->session();
        $key_pengguna = $session->read('Auth.User.key_pengguna');
        $pengguna = $Pengguna
        ->find('all')
        ->where(['Pengguna.key_pengguna' => $key_pengguna])
        ->contain(['PenggunaAuth','PenggunaAuth.Peran']);
        foreach ($pengguna as $pengguna) {
        }

        $key_data_pengguna = $pengguna->key_data_pengguna;
        $this->paginate = [
            'contain' => ['Pertanyaan','Pengguna'],
            'sortWhitelist' => [
                'Pertanyaan.pertanyaan',
            ],
        ];
        $query = $this->Pengerjaan->find('all')
        ->where(['Pengerjaan.key_data_pengguna' => $key_data_pengguna]);
        $pengerjaan = $this->paginate($query);

        $this->set(compact('pengerjaan'));
    }
    
    public function data()
    {
        $pengerjaan = $this->paginate($this->Pengerjaan);
        $this->set(compact('pengerjaan'));
    }

    public function kerjakan($id = null)
    {
        $Pertanyaan = TableRegistry::get('pertanyaan');
        $pertanyaan = $Pertanyaan->get($id, [
            'contain' => ['Materi','Materi.Topik']
        ]);
        $this->set('pertanyaan', $pertanyaan);
    }

    public function topik()
    {
        $Topik = TableRegistry::get('topik');
        $topik = $Topik->find('all')
        ->where(['topik.is_delete' => 0]);
        $this->set('topik', $topik);
    }

    public function materi($key_topik = null)
    {
        $Materi = TableRegistry::get('materi');
        $materi = $Materi
        ->find('all')
        ->where(['materi.key_topik' => $key_topik,
        'materi.is_delete' => 0 ]);
        $this->set('materi', $materi);
    }

    public function sejarahtopik()
    {
        $Pengguna = TableRegistry::get('Pengguna');
        $session = $this->request->session();
        $key_pengguna = $session->read('Auth.User.key_pengguna');
        $pengguna = $Pengguna
        ->find('all')
        ->where(['pengguna.key_pengguna' => $key_pengguna])
        ->contain(['PenggunaAuth','PenggunaAuth.Peran']);
        foreach ($pengguna as $pengguna) {
        }
        $key_data_pengguna = $pengguna->key_data_pengguna;

        $topik = $this->Pengerjaan->find('all')
        ->where(['Pengerjaan.key_data_pengguna' => $key_data_pengguna])
        ->group('topik')
        ->contain(['Pertanyaan','Pertanyaan.Materi','Pertanyaan.Materi.Topik']);

        $this->set('topik', $topik);
    }
    public function sejarahmateri($key_topik = null)
    {
        $Pengguna = TableRegistry::get('pengguna');
        $session = $this->request->session();
        $key_pengguna = $session->read('Auth.User.key_pengguna');
        $pengguna = $Pengguna
        ->find('all')
        ->where(['pengguna.key_pengguna' => $key_pengguna])
        ->contain(['PenggunaAuth','PenggunaAuth.Peran']);
        foreach ($pengguna as $pengguna) {
        }
        $key_data_pengguna = $pengguna->key_data_pengguna;

        $materi = $this->Pengerjaan->find('all')
        ->where(['Pengerjaan.key_data_pengguna' => $key_data_pengguna,
        'Topik.key_topik' => $key_topik ])
        ->group('materi')
        ->contain(['Pertanyaan','Pertanyaan.Materi','Pertanyaan.Materi.Topik']);

        $this->set('materi', $materi);
    }

    public function sejarahpengerjaan($key_materi = null)
    {
        $Pengguna = TableRegistry::get('pengguna');
        $session = $this->request->session();
        $key_pengguna = $session->read('Auth.User.key_pengguna');
        $pengguna = $Pengguna
        ->find('all')
        ->where(['pengguna.key_pengguna' => $key_pengguna])
        ->contain(['PenggunaAuth','PenggunaAuth.Peran']);
        foreach ($pengguna as $pengguna) {
        }
        $key_data_pengguna = $pengguna->key_data_pengguna;

        $pengerjaan = $this->Pengerjaan->find('all')
        ->where(['Pengerjaan.key_data_pengguna' => $key_data_pengguna,
        'Materi.key_materi' => $key_materi ])
        ->contain(['Pertanyaan','Pertanyaan.Materi','Pertanyaan.Materi.Topik']);

        $this->set('pengerjaan', $pengerjaan);
    }


    public function tes()
    {
        $pengerjaan = $this->Pengerjaan->newEntity();
        $Pengguna = TableRegistry::get('pengguna');
        $session = $this->request->session();
        $key_pengguna = $session->read('Auth.User.key_pengguna');
        $pengguna = $Pengguna
        ->find('all')
        ->where(['pengguna.key_pengguna' => $key_pengguna])
        ->contain(['PenggunaAuth','PenggunaAuth.Peran']);
        foreach ($pengguna as $pengguna) {
        }

        $key_data_pengguna = $pengguna->key_data_pengguna;

        if ($this->request->is('post')) {
            $postData = new \stdClass();
            $postData->id_soal = $this->request->getData('key');
            $postData->sentence = $this->request->getData('jawaban');
            $this->autoRender = false;
            $apiLink = 'http://127.0.0.1:5000/koreksi';
        
            $http = new Client();
            $response = $http->post(
                $apiLink,
                json_encode($postData),
                ['type' => 'json']
              );
            $json = $response->json;
            $datas = json_encode($json);
            $obj = json_decode($datas);
            foreach ($obj->hasilkoreksi as $hasilkoreksi)
            {
                $nilai =  $hasilkoreksi->nilai ;
            }
                $pengerjaan->nilai = $nilai;
                $pengerjaan->key_data_pengguna = $key_data_pengguna;
                $pengerjaan->key_pertanyaan = $this->request->getData('key');
                $pengerjaan->jawaban = $this->request->getData('jawaban');
                $key_pertanyaan = $this->request->getData('key');

                $percobaan = $this->Pengerjaan
                ->find('all')
                ->select(['total' => 'MAX(Pengerjaan.percobaan)'])
                ->where(['Pengerjaan.key_data_pengguna' => $key_data_pengguna,'Pengerjaan.key_pertanyaan' => $key_pertanyaan]);
                foreach ($percobaan as $percobaan) { }
                $pengerjaan->percobaan = $percobaan->total+1;
                if ($this->Pengerjaan->save($pengerjaan)) {
                    $this->Flash->success(__('The pengerjaan has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }

                $this->Flash->error(__('The pengerjaan could not be saved. Please, try again.'));
            
        }
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
            'contain' => ['Pertanyaan','Pengguna','Pertanyaan.Materi','Pertanyaan.Materi.Topik']
        ]);
        $this->set('pengerjaan', $pengerjaan);
    }

    public function pertanyaan($key_materi = null)
    {
        $Pertanyaan = TableRegistry::get('pertanyaan');
        $pertanyaan = $Pertanyaan
        ->find('all')
        ->where(['pertanyaan.key_materi' => $key_materi,
        'pertanyaan.is_delete' => 0 ]);
        $this->set('pertanyaan', $pertanyaan);
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
