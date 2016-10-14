<?php

// src/Controller/PostsController.php

namespace App\Controller;

use Cake\ORM\TableRegistry;

use Cake\Core\App;

use Cake\Controller\Controller;

use Cake\Utility\Security;

//Import controller
//App::import('Controller', 'Posts');
// App::import('Core', array('Xml', 'Set'));



class PostsupdateController extends AppController {

    // include '../vendor/Classes/PHPExcel.php';

    // include '../vendor/Classes/PHPExcel/IOFactory.php';


    public $paginate = array(

        'limit' => 25,

        'conditions' => array('status' => '1'),

        'order' => array('Postsupdate.id' => 'asc' ) 

    );

    // initializes the controller.

	public function initialize() {

         // parent::initialize();
        // $this->loadComponent('Flash'); // Include the FlashComponent

        parent::initialize();

    	// Set the layout
    	// $this->layout = 'frontend';

        $this->loadComponent('RequestHandler');
        $this->viewBuilder()->layout('frontend');

        //$name = $this->request->session()->read('User.username');

        // If you are accessing the session multiple times,
        // you will probably want a local variable.

        $session = $this->request->session();
        $username = $session->read('User.username');
       

    }


    // Fetch the entries from Postsupdate table.

    public function index() {

        $this->paginate = array(

            'limit' => 6,

            'conditions' => array('status' => '1'),

            'order' => array('Postsupdate.id' => 'asc' )

        );

        $postsupdate = $this->paginate('Postsupdate');

        $this->set(compact('postsupdate'));

        // $this->set('_serialize', array( 'postsupdate' ) );
    }    

    public function home() {
       
        if($this->request->session()->read('resultValue'))
        {


            $variable = $this->request->session()->read('resultValue');

            $key = 'wt1U5MACWJFTXGenFoZoiLwQGrLgdbHA';

            $cipher = $variable;

            //  pr($cipher);
            // exit();

            $result = Security::decrypt($cipher, $key);

            // pr($result);
            // exit();

        }
    }

    public function attorney() {

    }

    public function contact() {
        

    }


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

                    return $this->redirect(['action' => 'index']);
                }

            $this->Flash->error(__('Unable to add your post.'));

        }

        $this->set('post', $post);

    }

    public function edit($id = null) {

        $post = $this->Postsupdate->get($id);

        if ($this->request->is(['post','put'])) {

            // You can merge an array of raw data into an existing entity using the patchEntity() method.

            // the patchEntity() method will validate the data before it is copied to the entity.
    
        	$post = $this->Postsupdate->patchEntity($post, $this->request->data);

        	$post->modified = date("Y-m-d H:i:s");

        	if ($this->Postsupdate->save($post)) {

            	$this->Flash->success(__('Your post has been updated.'));

            	return $this->redirect(['action' => 'index']);

        	}

       		$this->Flash->error(__('Unable to update your post.'));

   		}

  	    $this->set('post', $post);

  	}

  	public function delete($id=NULL) {

        $this->autoRender = false ;

        // $post = $this->Postsupdate->get($id);
        
        //     echo '<pre>';
        //       print_r($post);
        //    exit;

        $post = $this->Postsupdate->get($id);

        //  echo '<pre>';
        //    print_r($post);
        //  exit;

        $succ = $this->Postsupdate->delete($post);

        // echo '<pre>';
        //    print_r($succ);
        // exit;

        if($succ) {

            $this->Flash->success(__('The post with id: {0} has been deleted.', h($id)));

            return $this->redirect(['controller'=>'Postsupdate','action' => 'index']);

        }    	
        
	}


    public function comment($id=NULL){
        
         $session = $this->request->session()->read("Auth");

        // if ($this->Auth->User('id') > 0) {

         if(!empty($session)){

            // $this->redirect($this->Auth->redirectUrl());

            $this->loadModel('Comment');
    
            $findComment = $this->Comment->find('all')
            ->where(['Comment.p_id' => $id]);
            
            $this->set(compact('findComment'));    
            
            // To print variable.

            // echo '<pre>';

            //   print_r($post);

            // exit;

            $comment = $this->Comment->newEntity();


            if ($this->request->is('post')) {

                $comment = $this->Comment->patchEntity($comment, $this->request->data);

                $comment->p_id = $id;

                $comment->u_name = $this->request->session()->read('Auth.User.username');

                if ($this->Comment->save($comment)) {

                    $this->Flash->success(__('Your Comment has been saved.'));

                    return $this->redirect(['action' => 'index']);

                }

                $this->Flash->error(__('Unable to add your post.'));

            }

            $this->set('comment',$comment);

        } else{

            return $this->redirect(['controller'=>'Users','action' => 'login']);

        }  

    }

    public function addrest() {

        $request = $this->request;
          
        //if ($this->request->is(['post','put'])) {|| $this->prefers('wap')

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

            // $this->Flash->error(__("Invalid access"));

            // return $this->redirect(['action' => 'index']);
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

            // $this->set([
            //    'postsupdate' => $jsonData,
            //     '_serialize' => ['postsupdate']
            // ]);

            echo json_encode($jsonData);

            exit();

            $this->render(false);

        }

    }

}