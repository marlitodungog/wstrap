<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Collection\Collection;

/**
 * OtherPages Controller
 *
 * @property \App\Model\Table\OtherPagesTable $OtherPages
 */
class OtherPagesController extends AppController
{

    public $helpers = ['NavigationSelector'];

    public function initialize()
    {
        parent::initialize();
    
        // Add the selected sidebar-menu 'active' class
        // Valid value can be found in NavigationSelectorHelper
        $nav_selected = ["other_pages"];
        $this->set('nav_selected', $nav_selected);

    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('otherPages', $this->paginate($this->OtherPages));
        $this->set('_serialize', ['otherPages']);
    }

    /**
     * View method
     *
     * @param string|null $id Other Page id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $otherPage = $this->OtherPages->get($id, [
            'contain' => []
        ]);
        $this->set('otherPage', $otherPage);
        $this->set('_serialize', ['otherPage']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $otherPage = $this->OtherPages->newEntity();

        // Get the highest sorting value
        $otherPage_obj = $this->OtherPages->find('all')->toArray();
        $collection = new Collection($otherPage_obj);
        $max_sort = $collection->max(function ($otherPage_obj) {
            return $otherPage_obj->sort;
        });
        if($max_sort) {
            // Assign next sorting value by adding 1
            $sorting = $max_sort->sorting + 1;
        }else{
            // Assign sorting value by default 1
            $sorting = 1;
        }

        if ($this->request->is('post')) {
            $otherPage = $this->OtherPages->patchEntity($otherPage, $this->request->data);
            $otherPage->sorting = $sorting;
            $result = $this->OtherPages->save($otherPage);
            if ($result) {
                $this->Flash->success('The other page has been saved.');
                if(isset($this->request->data['edit'])) {
                    return $this->redirect(['action' => 'edit', $result->id]);
                }else{
                    return $this->redirect(['action' => 'index']);
                }
            } else {
                $this->Flash->error('The other page could not be saved. Please, try again.');
            }
        }
        $this->set(compact('otherPage'));
        $this->set('_serialize', ['otherPage']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Other Page id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $otherPage = $this->OtherPages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $otherPage = $this->OtherPages->patchEntity($otherPage, $this->request->data);
            $result = $this->OtherPages->save($otherPage);
            if ($result) {
                $this->Flash->success('The other page has been saved.');
                if(isset($this->request->data['edit'])) {
                    return $this->redirect(['action' => 'edit', $result->id]);
                }else{
                    return $this->redirect(['action' => 'index']);
                }
            } else {
                $this->Flash->error('The other page could not be saved. Please, try again.');
            }
        }
        $this->set(compact('otherPage'));
        $this->set('_serialize', ['otherPage']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Other Page id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $otherPage = $this->OtherPages->get($id);
        if ($this->OtherPages->delete($otherPage)) {
            $this->Flash->success('The other page has been deleted.');
        } else {
            $this->Flash->error('The other page could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

    public function updatePublish() 
    {
        // Set layout as blank to enable json
        $this->layout = ''; 

        $id = $this->request->data['id'];
        $otherPage = $this->OtherPages->get($id, [
            'contain' => []
        ]);

        $otherPage = $this->OtherPages->patchEntity($otherPage, $this->request->data);
        if($otherPage->is_publish == 1) {
            $otherPage->is_publish = 0;
            $message = "Unpublish";
        }else{
            $otherPage->is_publish = 1;
            $message = "Publish";
        }

        // Update is_publish
        if ($this->OtherPages->save($otherPage)) {
            $return['message'] = 'You have successfully set as '.$message;
        } else {
            $return['message'] = 'Unable to update publish.';
        }

        echo json_encode($return);
    }

}
