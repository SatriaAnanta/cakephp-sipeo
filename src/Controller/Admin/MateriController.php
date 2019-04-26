<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Materi Controller
 *
 * @property \App\Model\Table\MateriTable $Materi
 *
 * @method \App\Model\Entity\Materi[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MateriController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $materi = $this->Materi->find('all')
        ->where(['Materi.is_delete' => 0])
        ->contain(['Topik']);
        $this->set(compact('materi'));
    }

    /**
     * View method
     *
     * @param string|null $id Materi id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $materi = $this->Materi->get($id, [
            'contain' => ['Topik','Pertanyaan', 'Pertanyaan.Jawaban']
        ]);

        $this->set('materi', $materi);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $materi = $this->Materi->newEntity();
        if ($this->request->is('post')) {
            $materi = $this->Materi->patchEntity($materi, $this->request->getData());
            if ($this->Materi->save($materi)) {
                $this->Flash->success(__('The materi has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The materi could not be saved. Please, try again.'));
        }
        $topik = $this->Materi->Topik
        ->find('list')
        ->where(['Topik.is_delete' => 0 ]);
        $this->set('topik',$topik);
        $this->set(compact('materi'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Materi id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $materi = $this->Materi->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $materi = $this->Materi->patchEntity($materi, $this->request->getData());
            if ($this->Materi->save($materi)) {
                $this->Flash->success(__('The materi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The materi could not be saved. Please, try again.'));
        }

        $topik = $this->Materi->Topik
        ->find('list')
        ->where(['Topik.is_delete' => 0 ]);
        $this->set('topik',$topik);      
        $this->set(compact('materi'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Materi id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    /*
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $materi = $this->Materi->get($id);
        if ($this->Materi->delete($materi)) {
            $this->Flash->success(__('The materi has been deleted.'));
        } else {
            $this->Flash->error(__('The materi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    */

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $materi = $this->Materi->get($id, [
            'contain' => []
        ]);
        $materi->is_delete = 1;
        if ($this->Materi->save($materi)) {
            $this->Flash->success(__('The materi has been deleted.'));
        } else {
            $this->Flash->error(__('The materi could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }    
}
