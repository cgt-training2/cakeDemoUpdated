<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

use Cake\Event\Event;

use Cake\Cache\Cache;


class UsersController extends AppController {

    //public $components = array('Session');

    public $paginate = array(

        'limit' => 25,

        'order' => array('Users.id' => 'asc' ) 

    );

    // initializes the controller.

    public function initialize() {

        parent::initialize();

        $this->viewBuilder()->layout('frontendflook');

    }

    // Before every action.

    public function beforeFilter(Event $event) {

        parent::beforeFilter($event);

        // Allow users to register and logout.
        // pr($this->Session->read('Auth'));

        $this->Auth->allow(['add', 'logout','login']);

        //if($this->Session->check('Auth'))
        //print_r($this->Session->read('Auth')); exit;    

    }

    public function index() {

        $this->set('users', $this->Users->find('all'));

    }


    public function view($id) {

        $user = $this->Users->get($id);
        $this->set(compact('user'));

    }


/*                                                       Older Login                                                                    */


    // Login action contains the code related to the login.

    public function login() {

        // if user not logged out then redirect him/her to the last visited page.
        
        if ($this->Auth->User('id') > 0) {

            $this->redirect($this->Auth->redirectUrl());

        }

        $this->loadModel('Users');

        $user = $this->Users->newEntity();
          
        if ($this->request->is('POST')) {

            $data = $this->Users->newEntity($this->request->data());
            
            $user = $this->Auth->identify();
    
            if ($user['role'] == 'admin') {

                $this->Auth->setUser($user);

                return $this->redirect($this->Auth->redirectUrl());

            } 

        
            $this->Flash->error(__('Incorrect UserName or PassWord',['class'=>'flashRed']));

        }


        $this->set('user', $user);

    }
        

    // LogOut action contains the code related to the logOut.

    public function logout() {

        $this->Flash->success('You are now logged out.');

        $session = $this->request->session();

        $session->destroy();

        return $this->redirect(['controller' => 'Users', 'action' => 'login']);

    }

    public function add_user() {

        // Way of getting new entities is using the newEntity() method. Which is equivalent to:

        // $user = new Users();

        $user = $this->Users->newEntity();

        if ($this->request->is('post')) {

            // You can merge an array of raw data into an existing entity using the patchEntity() method.

            // the patchEntity() method will validate the data before it is copied to the entity.

            $user = $this->Users->patchEntity($user, $this->request->data);

            if ($this->Users->save($user)) {

                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'add_user']);

            }

            $this->Flash->error(__('Unable to add the user.'));

        }

        $this->set('user', $user);

    }


    public function fetchuser() {

         $this->paginate = array(

            'limit' => 6,

            'order' => array('Users.id' => 'asc' )

        );

        $userfetch = $this->paginate('Users');

        $this->set(compact('userfetch'));

    }

}