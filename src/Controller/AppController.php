<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Routing\Router;
use Cake\Cache\Cache;
use Cake\ORM\TableRegistry;

// namespace App\Network\Session;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */

    // public $components = array(

    //     'DebugKit.Toolbar',

    //     'Session'

    //     );
   
    // public $components = [
    //     'Auth' => [
    //         'loginRedirect' => [
    //             'controller' => 'Postsupdate',
    //             'action' => 'index'
    //         ],
    //         'logoutRedirect' => [
    //             'controller' => 'Users',
    //             'action' => 'login',
    //         ]
    //     ]
    // ];

   // public $components = array('Session');

    // if(isset($this->request->prefix) && ($this->request->prefix == 'admin')){
    //         if($this->Auth->loggedIn()){
    //             $this->Auth->allow();
    //             $this->layout = 'admin';
    //         }else{
    //             $this->Auth->deny();
    //             $this->layout = 'front';
    //         }
    //     }else{
    //         $this->Auth->allow();
    //         $this->layout = 'front';
    //     }


    public function initialize() {

        $this->loadComponent('Flash');   
        $this->loadComponent('Cookie');


        $user = $this->request->session()->read('Auth.User.role');

        if(isset($this->request->prefix) && ($this->request->prefix == 'admin')){

        // if($user == 'admin'){
    
                    $this->loadComponent('Auth', [   

                        'authorize' => 'Controller',  

                        'loginRedirect' => [
                        'controller' => 'Postsupdate',
                        'action' => 'dashboard',
                        'prefix' => 'admin',
                        // 'prefix' => false,
                        ],

                        'logoutRedirect' => [
                        'controller' => 'Users',
                        'action' => 'login',
                        'prefix' => false,
                            
                        ],

                        'authenticate' => [
                            'Form' => [
                                'fields' => ['username' => 'username', 'password' => 'password']
                            ]

                        ],
                        
                    ]);
        }else{


                     $this->loadComponent('Auth', [ 

                        // 'authorize' => 'Controller',

                        'loginRedirect' => [
                        'controller' => 'Postsupdate',
                        'action' => 'home',
                        // 'prefix' => 'admin',
                        'prefix' => false,
                        ],

                        'logoutRedirect' => [
                        'controller' => 'Postsupdate',
                        'action' => 'home',
                        'prefix' => false,
                            

                        ],

                        'authenticate' => [
                            'Form' => [
                                'fields' => ['username' => 'username', 'password' => 'password']
                            ]

                        ],
                        
                    ]);

        }     

        // Calls the function where we handled the cookie.

        $this->checkCookie();


    }

    /**
     * Before render callback.
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */

    public function beforeRender(Event $event) {

        if (!array_key_exists('_serialize', $this->viewVars) && in_array($this->response->type(), ['application/json', 'application/xml'])) {

            $this->set('_serialize', true);
            
        }

    }

    public function beforeFilter(Event $event) {

        //$this->Auth->allow(['view', 'login']);

        $this->Auth->allow(['view', 'home']);

        $this->Auth->allow(['view', 'index']);

        $this->Auth->allow(['view', 'attorney']);

        $this->Auth->allow(['view', 'contact']);

        $this->Auth->allow(['view', 'addrest']);

        $this->Auth->autoRedirect = false;

       
        // $this->Auth->allow(['add', 'logout']);
        // $this->Auth->config('authenticate', ['Form'=>['username'=>'username','password'=>'password']]);

    }

    public function isAuthorized($user = null) {

        // Any registered user can access public functions

        // if (empty($this->request->params['prefix'])) {

        //     $this->Flash->error(__('You are Not authorized to access this page'));

        //     return $this->redirect('/',
                
        //         ['controller' => 'Postsupdate', 'action' => 'home']
        //     );

        // }

        // Only admins can access admin functions
        if ($this->request->params['prefix'] === 'admin') {

            if($user['role'] != 'admin'){
                $this->Flash->error("Unauthorized access");     
                $this->redirect(array('controller' => 'Postsupdate','action' => 'home', 'prefix' => false));
                return false;
            }            //return true;

        }


       
        // Default deny
        //return false;

        return true;
    }
    


    // Checks that the cookie exist or not.

    function checkCookie(){

        $session = $this->request->session()->read("Auth");
        $this->loadModel('Users');
         // pr($session);
          //      exit();
        // echo "abc";
        // exit();
        if(empty($session))
        {
            // $user = $this->Auth->user();

            
                $cookieId = $this->Cookie->read('UserNew.id');

                $cookieUser = $this->Cookie->read('UserNew.name');

                $cookiePass = $this->Cookie->read('UserNew.pass');

                $cookie = ['username' => $cookieUser, 'pass'=> $cookiePass];                         
                   // pr($cookie);exit();
                if (!is_null($cookie)) 
                {
                    
                    $user1 = $this->Users->findByUsername($cookie['username'])->toArray();

                    if (!empty($user1[0])) 
                    {
                        // $this->Session->delete('Message.auth');
                        $this->Auth->setUser($user1[0]->toArray());
                        $this->redirect($this->Auth->redirectUrl());
                    }
                    else 
                    { 
                        $this->Cookie->delete('UserNew');
                    }
                }else {

                         $this->redirect($this->Auth->redirectUrl());
                }
            
        }
        
    }

}



// Cake PHP 2 method 
                    // $user1 = $this->Users->find('first', array('conditions' => array('username' => $cookie['username'])));

                    // Cake PHP 3 method
                    // $user1 = $this->Users->find('all')->where(['Users.username' => $cookie['username']])->toArray();

                    //$data = $this->Users->get($cookieId);

// $results = $user1->all();

                    // // Once we have a result set we can get all the rows.

                    // $data = $results->toArray();

                    // // $this->set(compact('data'));

                    // // pr($data);
                    // // exit();

                    // $result = $data->username;

                    // pr($user1[0]);
                    // exit();
