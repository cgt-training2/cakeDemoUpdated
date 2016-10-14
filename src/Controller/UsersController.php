<?php

namespace App\Controller;

use App\Controller\AppController;

use Cake\Event\Event;

use Cake\Cache\Cache;

use Cake\Utility\Security;

//use Cake\Core\App;


class UsersController extends AppController {


  // initializes the controller.

  public function initialize() {

    parent::initialize();

    $this->viewBuilder()->layout('frontendflook');

  }

  // called before every action.

  public function beforeFilter(Event $event) {

    parent::beforeFilter($event);

    // Allow users to register and logout.
    // pr($this->Session->read('Auth'));

    $this->Auth->allow(['add', 'logout','login']);
    
  }

  public function index() {

    $this->set('users', $this->Users->find('all'));

  }


  public function view($id) {

    $user = $this->Users->get($id);
    
    $this->set(compact('user'));

  }




  public function login() {


    if (!empty($this->request->data) && $this->request->data['RememberMe']) {

           
            
            // $cookieName= $this->request->data['username'];

        /* Changes made on 7 September 2016  */


        $session = $this->request->session();
        $key = 'wt1U5MACWJFTXGenFoZoiLwQGrLgdbHA';
        $result = Security::encrypt(" Hello World ", $key);
        $session->write('resultValue', $result); 

        //$session->read('Config.language');

            $this->loadModel('Users');
          
            if ($this->request->is('POST')) {

                // The login action calls the 
                // $this,Auth,identify function in the AuthComponent, and it works without any further config because 
                // we are following conventions as mentioned earlier. That is, having a Users table with a username and
                // a password column, and use a form posted to a controller with the user data. This function returns whether 
                // the login was successful or not.

                $user = $this->Auth->identify();


                $cookieId= $user['id'];

                $cookieName= $user['username'];

                $cookiePass= $user['password'];

                $this->Cookie->configKey('UserNew', 'path', '/');
                $this->Cookie->configKey('UserNew', [

                    'expires' => '+1 days',
                    'httpOnly' => true

                ]);

                $this->Cookie->write('UserNew',
                    ['id'=>$cookieId, 'name' => $cookieName, 'pass' => $cookiePass]
                );
                
                // echo '<pre>';
                //    print_r($user['role']);
                // exit;

              if ($user['role'] == 'author') {
                  // pr($this->request->data);
                  // exit();

                  $this->Auth->setUser($user);

                  unset($this->request->data['RememberMe']);

                  return $this->redirect($this->Auth->redirectUrl());

              } else{

                  $this->Flash->error(__('you are not authorized'));

              }

                // $this->Flash->error(__('Incorrect UserName or PassWord'));
              
            }

      }else if(!empty($this->request->data) && $this->request->data['RememberMe'] == 0) {


               if ($this->request->is('POST')) {

                //The login action calls the $this,Auth,identify function in the AuthComponent, and it works without any further config because 
                //we are following conventions as mentioned earlier. That is, having a Users table with a username and a password column, and use a 
                //form posted to a controller with the user data. This function returns whether the login was successful or not.


                $session = $this->request->session();
                $key = 'wt1U5MACWJFTXGenFoZoiLwQGrLgdbHA';
                $result = Security::encrypt("Hello World", $key);
                // pr($result);
                // exit();
                $session->write('resultValue', $result);

                    $user = $this->Auth->identify();
                
                    // echo '<pre>';
                    //    print_r($user['role']);
                    // exit;

                    if ($user['role'] == 'author') {
                        // pr($this->request->data);
                        // exit();

                        $this->Auth->setUser($user);

                        return $this->redirect($this->Auth->redirectUrl());

                    } else{

                        $this->Flash->error(__('you are not authorized'));

                    }
          }
        // $this->Flash->error(__('Incorrect UserName or PassWord'));              
      } 



}
/*                                                       Older Login                                                                    */

  // Login action contains the code related to the login.

  // public function login() {

  //   // if user not logged out then redirect him/her to the last visited page.


         
  //   if ($this->Auth->User('id') > 0) {

  //     $this->redirect($this->Auth->redirectUrl());

  //   }

  //   $this->loadModel('Users');

  //   //$user = $this->Users->newEntity();
          
  //   if ($this->request->is('POST')) {

  //     //$data = $this->Users->newEntity($this->request->data());

  //       //The login action calls the 
  //       //$this,Auth,identify function in the AuthComponent, and it works without any further config because 
  //       //we are following conventions as mentioned earlier. That is, having a Users table with a username and
  //      // a password column, and use a form posted to a controller with the user data. This function returns whether 
  //     //  the login was successful or not.
  //     $user = $this->Auth->identify();
                
  //     // echo '<pre>';
  //     //    print_r($user['role']);
  //     // exit;

  //     if ($user['role'] == 'author') {
  //        // pr($this->request->data);
  //        // exit();

  //       $this->Auth->setUser($user);

  //       return $this->redirect($this->Auth->redirectUrl());

  //     } else{

  //           $this->Flash->error(__('you are not authorized'));

  //     }

  //       // $this->Flash->error(__('Incorrect UserName or PassWord'));
              
  //   }

  //     // $this->set('user', $user);
          
  // }
      

  // LogOut action contains the code related to the logOut.

  public function logout() {

    $this->Flash->success('You are now logged out.');
    $this->Cookie->delete('UserNew');

    return $this->redirect($this->Auth->logout());

  }

  // add action used to add a new user to the users table.

  public function add() {

    $user = $this->Users->newEntity();

    if ($this->request->is('post')) {

      $user = $this->Users->patchEntity($user, $this->request->data);

        if ($this->Users->save($user)) {

          $this->Flash->success(__('The user has been saved.'));

          return $this->redirect(['action' => 'add']);

        }

      $this->Flash->error(__('Unable to add the user.'));

    }

    $this->set('user', $user);

  }

}