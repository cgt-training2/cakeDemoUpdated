<?php
// src/Controller/PostsController.php

namespace App\Controller;

   //Import controller
 // App::import('Controller', 'Posts');

class InquiryController extends AppController {

    public function index() {

        $postsupdate = $this->Postsupdate->find('all');

        $this->set(compact('postsupdate'));
        
        // $this->set('_serialize', array( 'postsupdate' ) );
    }

    public function add() {

        $post = $this->Inquiry->newEntity();

        if ($this->request->is('post')) {

            $post = $this->Inquiry->patchEntity($post, $this->request->data);

             // echo '<pre>';
             //     print_r($post);
             //     exit; 

            if ($this->Inquiry->save($post)) {
                echo 'Your inquiry has been saved.';
                exit;
                // $this->Flash->success(__('Your inquiry has been saved.'));

                //return $this->redirect(['controller' => 'Postsupdate', 'action' => 'index']);

                // return $this->redirect(['action' => 'index']);

            }
            echo 'Unable to add your post.';
                exit;
            // $this->Flash->error(__('Unable to add your post.'));
            // return $this->redirect(['controller' => 'Postsupdate', 'action' => 'index']);
            
        }
        
        // $this->set('post', $post);

    }

}