<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\NotFoundException;

/**
 * Groups Controller
 *
 * @property \App\Model\Table\GroupsTable $Groups
 */
class GroupsController extends AppController
{

    public $helpers = ['NavigationSelector'];

    public function initialize()
    {
        parent::initialize();
    
        // Add the selected sidebar-menu 'active' class
        // Valid value can be found in NavigationSelectorHelper
        $nav_selected = ["user"];
        $this->set('nav_selected', $nav_selected);
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('groups', $this->paginate($this->Groups));
        $this->set('_serialize', ['groups']);
    }

    /**
     * View method
     *
     * @param string|null $id Group id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $group = $this->Groups->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('group', $group);
        $this->set('_serialize', ['group']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $group = $this->Groups->newEntity();
        if ($this->request->is('post')) {
            $group = $this->Groups->patchEntity($group, $this->request->data);
            $result = $this->Groups->save($group);
            if ($result) {
                $this->Flash->success('The group has been saved.');
                if(isset($this->request->data['edit'])) {
                    return $this->redirect(['action' => 'edit', $result->id]);
                }else{
                    return $this->redirect(['action' => 'index']);
                }
            } else {
                $this->Flash->error('The group could not be saved. Please, try again.');
            }
        }
        $this->set(compact('group'));
        $this->set('_serialize', ['group']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Group id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $group = $this->Groups->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $group = $this->Groups->patchEntity($group, $this->request->data);
            $result = $this->Groups->save($group);
            if ($result) {
                $this->Flash->success('The group has been saved.');
                if(isset($this->request->data['edit'])) {
                    return $this->redirect(['action' => 'edit', $result->id]);
                }else{
                    return $this->redirect(['action' => 'index']);
                }
            } else {
                $this->Flash->error('The group could not be saved. Please, try again.');
            }
        }
        $this->set(compact('group'));
        $this->set('_serialize', ['group']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Group id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $group = $this->Groups->get($id);
        if ($this->Groups->delete($group)) {
            $this->Flash->success('The group has been deleted.');
        } else {
            $this->Flash->error('The group could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
