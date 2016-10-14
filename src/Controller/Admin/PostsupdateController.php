<?php

// src/Controller/PostsController.php

namespace App\Controller\Admin;
use App\Controller\AppController; 
use Cake\ORM\TableRegistry;
use Cake\Core\App;
use Cake\Controller\Controller;
use Cake\I18n\Time;

//Import controller
//App::import('Controller', 'Posts');
// App::import('Core', array('Xml', 'Set'));



class PostsupdateController extends AppController
{


    // this line tells about the pagination.

    public $paginate = array(

        'limit' => 25,

        // 'conditions' => array('status' => '1'),

        'order' => array('Postsupdate.id' => 'asc' ) 

    );

    // initializes the controller.

	public function initialize() {
   
        parent::initialize();

    	// Set the layout
    	// $this->layout = 'frontend';

        // load components loads the components of cakePHP-3.

        $this->loadComponent('RequestHandler');

        $this->viewBuilder()->layout('frontend');

        // If you are accessing the session multiple times,
        // you will probably want a local variable.

        $session = $this->request->session();
        $username = $session->read('User.username');

    }

    // posts action Fetch the value from the posts table and display the data.

    public function posts() {

        // paginate with the given condition.

        $this->paginate = [

            'limit' => 6,

            // 'conditions' => array('status' => '1'),

            'order' => ['Postsupdate.id' => 'asc' ]

        ];

        // Finds the data from postsupdate table and paginate the data.

        $postsupdate = $this->paginate('Postsupdate');

        $this->set(compact('postsupdate'));

    }    

    // public function index() {

    //     $postsupdate = $this->Postsupdate->find('all');

    //         $this->paginate = array(
    //         'limit' => 6,
    //         'order' => array('Postsupdate.id' => 'asc' )
    //         );

    //     $this->set(compact('postsupdate'));
        
    //     $this->set('_serialize', array( 'postsupdate' ) );

    // }

    //  public function index() {
    //     $this->paginate = array(
    //         'limit' => 6,
    //         'order' => array('User.username' => 'asc' )
    //     );
    //     $users = $this->paginate('User');
    //     $this->set(compact('users'));
    // }


    public function home() {

    }

    public function attorney() {

    }

    public function contact() {


    }



    // dashboard action.

    public function dashboard() {


        $postsupdate = $this->Postsupdate->find('all');

        $number = $postsupdate->count();

        $lastValuePost = $postsupdate->last();
        

        $this->loadModel('Users');

        $users = $this->Users->find('all');

        $userCount = $users->count();

        $lastValueUser = $users->last();

        // set variabes for retreival.
        // The Controller::set() method is the main 
        // way to send data from your controller to your view.
        // Once you’ve used Controller::set(), the variable can be accessed in your view

        $this->set(compact('number'));

        $this->set(compact('userCount'));

        $this->set(compact('lastValuePost'));

        $this->set(compact('lastValueUser'));

    }


    // add action used to insert the record in the postsupdate table.

    public function add() {

        $post = $this->Postsupdate->newEntity();

        // To print variable.
            // echo '<pre>';
            //     print_r($post);
            // exit;

        if ($this->request->is('post')) {

                $post = $this->Postsupdate->patchEntity($post, $this->request->data);

                // $post->id = 6;

                $post->created = date("Y-m-d H:i:s");

                $post->modified = date("Y-m-d H:i:s");

                $post->status = 1;

                if ($this->Postsupdate->save($post)) {

                    $this->Flash->success(__('Your post has been saved.'));

                    return $this->redirect(['action' => 'posts']);
                }

            $this->Flash->error(__('Unable to add your post.'));

        }

        $this->set('post', $post);

    }


    // edit action used to edit the record with the given id in the postsupdate table.

    public function edit($id = null) {

        // get() is a function to fetch data from the database and it fetches the value using primary key.

        $post = $this->Postsupdate->get($id);

        $this->set('post', $post);

        if ($this->request->is(['post','put'])) {
    
        	$post = $this->Postsupdate->patchEntity($post, $this->request->data);

           	if ($this->Postsupdate->save($post)) {

            	$this->Flash->success(__('Your post has been updated.'));

            	return $this->redirect(['action' => 'posts']);

        	}

       		$this->Flash->error(__('Unable to update your post.'));

   		}

  	    

  	}


    // delete action used to delete the record with the given id in the postsupdate table.

  	public function delete($id=NULL) {

        $this->autoRender = false ;

        // $post = $this->Postsupdate->get($id);
        
        //     echo '<pre>';
        //       print_r($post);
        //    exit;

        $post = $this->Postsupdate->get($id);

         // echo '<pre>';
         //   print_r($timeOfDelete);
         // exit;

        $succ = $this->Postsupdate->delete($post);

           // echo '<pre>';
           //    print_r($succ);
           // exit;

        if($succ) {

            $this->Flash->success(__('The post with id: {0} has been deleted.', h($id)));

            return $this->redirect(['controller'=>'Postsupdate','action' => 'posts']);

        }    	
        
	}


    // this function converts the data into json.

    public function addrest() {

        $request = $this->request;

        if ($request->is('mobile')) {

            # code...
          
            $posts = $this->Postsupdate->find('all');

            //  echo '<pre>';
            //     print_r($posts);
            //  exit;

            $jsonData = array(

                "success"=>"1",
                "success_msg"=>"Data fetched!",
                "error"=>"0",
                "error_msg"=>"",
                "data"=>$posts 

            );

            // $this->set([
            //    'postsupdate' => $jsonData,
            //     '_serialize' => ['postsupdate']
            // ]);

            echo json_encode($jsonData);

            exit();

            // echo '<pre>';
            //     print_r($posts);
            //  exit;

            $this->render(false);

        }

        else{

            $posts = $this->Postsupdate->find('all');

            //  echo '<pre>';
            //     print_r($posts);
            //  exit;

            $jsonData = array(
                    "success"=>"1",
                    "success_msg"=>"data fetched",
                    "error"=>"0",
                    "error_msg"=>"",
                    // "data"=>$posts
            );

            
            echo json_encode($jsonData);

            exit();

            $this->render(false);

        }

    }

}