<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * KomentarFotos Controller
 *
 * @property \App\Model\Table\KomentarFotosTable $KomentarFotos
 */
class KomentarFotosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->KomentarFotos->find()
            ->contain(['Fotos', 'Users']);
        $komentarFotos = $this->paginate($query);

        $this->set(compact('komentarFotos'));
    }

    /**
     * View method
     *
     * @param string|null $id Komentar Foto id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $komentarFoto = $this->KomentarFotos->get($id, contain: ['Fotos', 'Users']);
        $this->set(compact('komentarFoto'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $komentarFoto = $this->KomentarFotos->newEmptyEntity();
        if ($this->request->is('post')) {
            $komentarFoto = $this->KomentarFotos->patchEntity($komentarFoto, $this->request->getData());
            if ($this->KomentarFotos->save($komentarFoto)) {
                $this->Flash->success(__('The komentar foto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The komentar foto could not be saved. Please, try again.'));
        }
        $fotos = $this->KomentarFotos->Fotos->find('list', limit: 200)->all();
        $users = $this->KomentarFotos->Users->find('list', limit: 200)->all();
        $this->set(compact('komentarFoto', 'fotos', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Komentar Foto id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $komentarFoto = $this->KomentarFotos->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $komentarFoto = $this->KomentarFotos->patchEntity($komentarFoto, $this->request->getData());
            if ($this->KomentarFotos->save($komentarFoto)) {
                $this->Flash->success(__('The komentar foto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The komentar foto could not be saved. Please, try again.'));
        }
        $fotos = $this->KomentarFotos->Fotos->find('list', limit: 200)->all();
        $users = $this->KomentarFotos->Users->find('list', limit: 200)->all();
        $this->set(compact('komentarFoto', 'fotos', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Komentar Foto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $komentarFoto = $this->KomentarFotos->get($id);
        if ($this->KomentarFotos->delete($komentarFoto)) {
            $this->Flash->success(__('The komentar foto has been deleted.'));
        } else {
            $this->Flash->error(__('The komentar foto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
