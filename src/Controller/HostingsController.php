<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Collection\Collection;

/**
 * Hostings Controller
 *
 * @property \App\Model\Table\HostingsTable $Hostings
 */
class HostingsController extends AppController
{

    public $helpers = ['NavigationSelector'];

    public function initialize()
    {
        parent::initialize();
    
        // Add the selected sidebar-menu 'active' class
        // Valid value can be found in NavigationSelectorHelper
        $nav_selected = ["hosting_related"];
        $this->set('nav_selected', $nav_selected);

    }


    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('hostings', $this->paginate($this->Hostings));
        $this->set('_serialize', ['hostings']);
    }

    /**
     * View method
     *
     * @param string|null $id Hosting id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $hosting = $this->Hostings->get($id, [
            'contain' => []
        ]);
        $this->set('hosting', $hosting);
        $this->set('_serialize', ['hosting']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $hosting = $this->Hostings->newEntity();

        // Get the highest sorting value
        $hosting_obj = $this->Hostings->find('all')->toArray();
        $collection = new Collection($hosting_obj);
        $max_sort = $collection->max(function ($hosting_obj) {
            return $hosting_obj->sort;
        });
        if($max_sort) {
            // Assign next sorting value by adding 1
            $sorting = $max_sort->sorting + 1;
        }else{
            // Assign sorting value by default 1
            $sorting = 1;
        }

        if ($this->request->is('post')) {
            $hosting = $this->Hostings->patchEntity($hosting, $this->request->data);
            $hosting->sorting = $sorting;
            $result = $this->Hostings->save($hosting);
            if ($result) {
                $this->Flash->success('The hosting has been saved.');
                if(isset($this->request->data['edit'])) {
                    return $this->redirect(['action' => 'edit', $result->id]);
                }else{
                    return $this->redirect(['action' => 'index']);
                }
            } else {
                $this->Flash->error('The hosting could not be saved. Please, try again.');
            }
        }
        $this->set(compact('hosting'));
        $this->set('_serialize', ['hosting']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Hosting id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $hosting = $this->Hostings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hosting = $this->Hostings->patchEntity($hosting, $this->request->data);
            $result = $this->Hostings->save($hosting);
            if ($result) {
                $this->Flash->success('The hosting has been saved.');
                if(isset($this->request->data['edit'])) {
                    return $this->redirect(['action' => 'edit', $result->id]);
                }else{
                    return $this->redirect(['action' => 'index']);
                }
            } else {
                $this->Flash->error('The hosting could not be saved. Please, try again.');
            }
        }
        $this->set(compact('hosting'));
        $this->set('_serialize', ['hosting']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Hosting id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hosting = $this->Hostings->get($id);
        if ($this->Hostings->delete($hosting)) {
            $this->Flash->success('The hosting has been deleted.');
        } else {
            $this->Flash->error('The hosting could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

    public function updatePublish() 
    {
        // Set layout as blank to enable json
        $this->layout = ''; 

        $id = $this->request->data['id'];
        $hosting = $this->Hostings->get($id, [
            'contain' => []
        ]);

        $service = $this->Hostings->patchEntity($hosting, $this->request->data);
        if($hosting->is_publish == 1) {
            $hosting->is_publish = 0;
            $message = "Unpublish";
        }else{
            $hosting->is_publish = 1;
            $message = "Publish";
        }

        // Update is_publish
        if ($this->Hostings->save($hosting)) {
            $return['message'] = 'You have successfully set as '.$message;
        } else {
            $return['message'] = 'Unable to update publish.';
        }

        echo json_encode($return);
    }

}
