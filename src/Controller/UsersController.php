<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    public $helpers = ['NavigationSelector'];

    public function initialize()
    {
        parent::initialize();

        // Add the selected sidebar-menu 'active' class
        // Valid value can be found in NavigationSelectorHelper
        if ($this->request->action == "dashboard") {
            $nav_selected = ["dashboard"];
        } else {
            $nav_selected = ["user"];
        }
        $this->set('nav_selected', $nav_selected);
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['logout', 'login']);
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $user = $this->Users->find('all', [
            'contain' => ['Groups']
        ]);
        $this->set('users', $this->paginate($user));
        $this->set('_serialize', ['users']);
    }

    /**
     * Dashboard method
     *
     * @return void
     */
    public function dashboard()
    {
        $this->set('page_title', 'Dashboard');
    }   

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ["Groups"]
        ]);
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            $user->group_id = $this->request->data['groups'];
            $result = $this->Users->save($user);
            if ($result) {
                $this->Flash->success('The user has been saved.');
                if(isset($this->request->data['edit'])) {
                    return $this->redirect(['action' => 'edit', $result->id]);
                }else{
                    return $this->redirect(['action' => 'index']);
                }
            } else {
                $this->Flash->error('The user could not be saved. Please, try again.');
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);

        $this->set('groups', $this->Users->Groups->find('list', array('fields' => array('name','id') ) ) );
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            $result = $this->Users->save($user);
            if ($result) {
                $this->Flash->success('The user has been saved.');
                if(isset($this->request->data['edit'])) {
                    return $this->redirect(['action' => 'edit', $result->id]);
                }else{
                    return $this->redirect(['action' => 'index']);
                }
            } else {
                $this->Flash->error('The user could not be saved. Please, try again.');
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);

         $this->set('groups', $this->Users->Groups->find('list', array('fields' => array('name','id') ) ) );
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        /*if ($this->Users->delete($user)) {
            $this->Flash->success('The user has been deleted.');
        } else {
            $this->Flash->error('The user could not be deleted. Please, try again.');
        }*/
        $this->Flash->error('Deleting of user is currently disabled.');
        return $this->redirect(['action' => 'index']);
    }

    /**
     * Login
     *
     *
     */
    public function login()
    {
        // Change layout
        $this->layout = "Users/login"; 
        //if already logged-in, redirect
        if($this->Auth->user()){
            $this->redirect(array('action' => 'index'));      
        }

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                $_SESSION['KCEDITOR']['disabled'] = false;
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function logout()
    {
        session_destroy();
        return $this->redirect($this->Auth->logout());
    }
}
