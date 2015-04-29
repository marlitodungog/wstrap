<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Collection\Collection;

/**
 * Services Controller
 *
 * @property \App\Model\Table\ServicesTable $Services
 */
class ServicesController extends AppController
{

    public $helpers = ['NavigationSelector'];

    public function initialize()
    {
        parent::initialize();
    
        // Add the selected sidebar-menu 'active' class
        // Valid value can be found in NavigationSelectorHelper
        $nav_selected = ["services_related"];
        $this->set('nav_selected', $nav_selected);

    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('services', $this->paginate($this->Services));
        $this->set('_serialize', ['services']);
    }

    /**
     * View method
     *
     * @param string|null $id Service id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $service = $this->Services->get($id, [
            'contain' => []
        ]);
        $this->set('service', $service);
        $this->set('_serialize', ['service']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $service = $this->Services->newEntity();

        // Get the highest sorting value
        $service_obj = $this->Services->find('all')->toArray();
        $collection = new Collection($service_obj);
        $max_sort = $collection->max(function ($service_obj) {
            return $service_obj->sort;
        });
        if($max_sort) {
            // Assign next sorting value by adding 1
            $sorting = $max_sort->sorting + 1;
        }else{
            // Assign sorting value by default 1
            $sorting = 1;
        }

        if ($this->request->is('post')) {
            $service = $this->Services->patchEntity($service, $this->request->data);
            $service->sorting = $sorting;
            $result = $this->Services->save($service);
            if ($result) {
                $this->Flash->success('The service has been saved.');
                if(isset($this->request->data['edit'])) {
                    return $this->redirect(['action' => 'edit', $result->id]);
                }else{
                    return $this->redirect(['action' => 'index']);
                }
            } else {
                $this->Flash->error('The service could not be saved. Please, try again.');
            }
        }
        $this->set(compact('service'));
        $this->set('_serialize', ['service']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Service id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $service = $this->Services->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $service = $this->Services->patchEntity($service, $this->request->data);
            $result = $this->Services->save($service);
            if ($result) {
                $this->Flash->success('The service has been saved.');
                if(isset($this->request->data['edit'])) {
                    return $this->redirect(['action' => 'edit', $result->id]);
                }else{
                    return $this->redirect(['action' => 'index']);
                }
            } else {
                $this->Flash->error('The service could not be saved. Please, try again.');
            }
        }
        $this->set(compact('service'));
        $this->set('_serialize', ['service']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Service id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $service = $this->Services->get($id);
        if ($this->Services->delete($service)) {
            $this->Flash->success('The service has been deleted.');
        } else {
            $this->Flash->error('The service could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

    public function updatePublish() 
    {
        // Set layout as blank to enable json
        $this->layout = ''; 

        $id = $this->request->data['id'];
        $service = $this->Services->get($id, [
            'contain' => []
        ]);

        $service = $this->Services->patchEntity($service, $this->request->data);
        if($service->is_publish == 1) {
            $service->is_publish = 0;
            $message = "Unpublish";
        }else{
            $service->is_publish = 1;
            $message = "Publish";
        }

        // Update is_publish
        if ($this->Services->save($service)) {
           $return['message'] = 'You have successfully set as '.$message; 
        } else {
            $return['message'] = 'Unable to update publish.';
        }

        echo json_encode($return);
    }

}
