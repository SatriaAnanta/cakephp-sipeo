<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Pertanyaan Controller
 *
 * @property \App\Model\Table\PertanyaanTable $Pertanyaan
 *
 * @method \App\Model\Entity\Pertanyaan[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PertanyaanController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $pertanyaan = $this->Pertanyaan->find('all')
        ->where(['Pertanyaan.is_delete' => 0])
        ->contain(['Materi']);
        $this->set(compact('pertanyaan'));
    }

    /**
     * View method
     *
     * @param string|null $id Pertanyaan id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pertanyaan = $this->Pertanyaan->get($id, [
            'contain' => ['Materi','Materi.Topik', 'Jawaban']
        ]);

        $this->set('pertanyaan', $pertanyaan);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pertanyaan = $this->Pertanyaan->newEntity();
        if ($this->request->is('post')) {
            $pertanyaan = $this->Pertanyaan->patchEntity($pertanyaan, $this->request->getData());
            if ($this->Pertanyaan->save($pertanyaan)) {
                $this->Flash->success(__('The pertanyaan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pertanyaan could not be saved. Please, try again.'));
        }
        $materi = $this->Pertanyaan->Materi
        ->find('list')
        ->where(['Materi.is_delete' => 0 ]); 
        $this->set('materi',$materi);

        $this->set(compact('pertanyaan'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pertanyaan id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pertanyaan = $this->Pertanyaan->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pertanyaan = $this->Pertanyaan->patchEntity($pertanyaan, $this->request->getData());
            if ($this->Pertanyaan->save($pertanyaan)) {
                $this->Flash->success(__('The pertanyaan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pertanyaan could not be saved. Please, try again.'));
        }

        $materi = $this->Pertanyaan->Materi
        ->find('list')
        ->where(['Materi.is_delete' => 0 ]); 
        $this->set('materi',$materi);
        $this->set(compact('pertanyaan'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pertanyaan id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

     /*
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pertanyaan = $this->Pertanyaan->get($id);
        if ($this->Pertanyaan->delete($pertanyaan)) {
            $this->Flash->success(__('The pertanyaan has been deleted.'));
        } else {
            $this->Flash->error(__('The pertanyaan could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    */

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pertanyaan = $this->Pertanyaan->get($id, [
            'contain' => []
        ]);
        $pertanyaan->is_delete = 1;
        if ($this->Pertanyaan->save($pertanyaan)) {
            $this->Flash->success(__('The pertanyaan has been deleted.'));
        } else {
            $this->Flash->error(__('The pertanyaan could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }     
}
