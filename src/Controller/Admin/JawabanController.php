<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Jawaban Controller
 *
 * @property \App\Model\Table\JawabanTable $Jawaban
 *
 * @method \App\Model\Entity\Jawaban[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class JawabanController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $jawaban = $this->Jawaban->find('all')
        ->contain(['Pertanyaan']);
        $this->set(compact('jawaban'));
    }

    /**
     * View method
     *
     * @param string|null $id Jawaban id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $jawaban = $this->Jawaban->get($id, [
            'contain' => ['Pertanyaan', 'Pertanyaan.Materi', 'Pertanyaan.Materi.Topik']
        ]);

        $this->set('jawaban', $jawaban);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $jawaban = $this->Jawaban->newEntity();
        if ($this->request->is('post')) {
            $jawaban = $this->Jawaban->patchEntity($jawaban, $this->request->getData());
            if ($this->Jawaban->save($jawaban)) {
                $this->Flash->success(__('The jawaban has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The jawaban could not be saved. Please, try again.'));
        }
        $pertanyaan = $this->Jawaban->Pertanyaan
        ->find('list')
        ->where(['Pertanyaan.is_delete' => 0 ]);
        $this->set('pertanyaan',$pertanyaan);       
        $this->set(compact('jawaban'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Jawaban id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $jawaban = $this->Jawaban->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $jawaban = $this->Jawaban->patchEntity($jawaban, $this->request->getData());
            if ($this->Jawaban->save($jawaban)) {
                $this->Flash->success(__('The jawaban has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The jawaban could not be saved. Please, try again.'));
        }
        $pertanyaan = $this->Jawaban->Pertanyaan
        ->find('list')
        ->where(['Pertanyaan.is_delete' => 0 ]);

        $this->set('pertanyaan',$pertanyaan);
        $this->set(compact('jawaban'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Jawaban id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $jawaban = $this->Jawaban->get($id);
        if ($this->Jawaban->delete($jawaban)) {
            $this->Flash->success(__('The jawaban has been deleted.'));
        } else {
            $this->Flash->error(__('The jawaban could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
