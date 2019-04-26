<?php
namespace App\Controller\Admin;


use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Topik Controller
 *
 * @property \App\Model\Table\TopikTable $Topik
 *
 * @method \App\Model\Entity\Topik[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TopikController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $topik = $this->Topik->find('all')->where(['is_delete' => 0]);
        $this->set(compact('topik'));
    }

    /**
     * View method
     *
     * @param string|null $id Topik id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $topik = $this->Topik->get($id, [
            'contain' => ['Materi', 'Materi.Pertanyaan', 'Materi.Pertanyaan.Jawaban']
        ]);

        $this->set(compact('topik'));
    }

    public function home()
    { 
       $Pengguna = TableRegistry::get('pengguna_auth');
       $queryPengguna = $Pengguna->find('all');
       $queryTopik = $this->Topik->find('all');
       $queryMateri = $this->Topik->Materi->find('all');
       $queryPertanyaan = $this->Topik->Materi->Pertanyaan->find('all');
       $queryJawaban = $this->Topik->Materi->Pertanyaan->Jawaban->find('all');
       $this->set('topik',$queryTopik->count());
       $this->set('materi',$queryMateri->count());
       $this->set('pertanyaan',$queryPertanyaan->count());
       $this->set('jawaban',$queryJawaban->count());
       $this->set('pengguna',$queryPengguna->count());
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $topik = $this->Topik->newEntity();
        if ($this->request->is('post')) {
            $topik = $this->Topik->patchEntity($topik, $this->request->getData());
            if ($this->Topik->save($topik)) {
                $this->Flash->success(__('The topik has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The topik could not be saved. Please, try again.'));
        }
        $this->set(compact('topik'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Topik id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $topik = $this->Topik->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $topik = $this->Topik->patchEntity($topik, $this->request->getData());
            if ($this->Topik->save($topik)) {
                $this->Flash->success(__('The topik has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The topik could not be saved. Please, try again.'));
        }
        $this->set(compact('topik'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Topik id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

     /*
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $topik = $this->Topik->get($id);
        if ($this->Topik->delete($topik)) {
            $this->Flash->success(__('The topik has been deleted.'));
        } else {
            $this->Flash->error(__('The topik could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    */
    public function delete($id = null)
    {
        $this->request->allowMethod(['delete']);
        $topik = $this->Topik->get($id, [
            'contain' => []
        ]);
        $topik->is_delete = 1;
        if ($this->Topik->save($topik)) {
            $this->Flash->success(__('The topik has been deleted.'));
        } else {
            $this->Flash->error(__('The topik could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
