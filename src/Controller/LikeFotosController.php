<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * LikeFotos Controller
 *
 * @property \App\Model\Table\LikeFotosTable $LikeFotos
 */
class LikeFotosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->LikeFotos->find()
            ->contain(['Fotos', 'Users']);
        $likeFotos = $this->paginate($query);

        $this->set(compact('likeFotos'));
    }

    /**
     * View method
     *
     * @param string|null $id Like Foto id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $likeFoto = $this->LikeFotos->get($id, contain: ['Fotos', 'Users']);
        $this->set(compact('likeFoto'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $likeFoto = $this->LikeFotos->newEmptyEntity();
        if ($this->request->is('post')) {
            $likeFoto = $this->LikeFotos->patchEntity($likeFoto, $this->request->getData());
            if ($this->LikeFotos->save($likeFoto)) {
                $this->Flash->success(__('The like foto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The like foto could not be saved. Please, try again.'));
        }
        $fotos = $this->LikeFotos->Fotos->find('list', limit: 200)->all();
        $users = $this->LikeFotos->Users->find('list', limit: 200)->all();
        $this->set(compact('likeFoto', 'fotos', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Like Foto id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $likeFoto = $this->LikeFotos->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $likeFoto = $this->LikeFotos->patchEntity($likeFoto, $this->request->getData());
            if ($this->LikeFotos->save($likeFoto)) {
                $this->Flash->success(__('The like foto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The like foto could not be saved. Please, try again.'));
        }
        $fotos = $this->LikeFotos->Fotos->find('list', limit: 200)->all();
        $users = $this->LikeFotos->Users->find('list', limit: 200)->all();
        $this->set(compact('likeFoto', 'fotos', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Like Foto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $likeFoto = $this->LikeFotos->get($id);
        if ($this->LikeFotos->delete($likeFoto)) {
            $this->Flash->success(__('The like foto has been deleted.'));
        } else {
            $this->Flash->error(__('The like foto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
