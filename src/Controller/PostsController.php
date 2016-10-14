<?php
// src/Controller/PostsController.php

namespace App\Controller;

class PostsController extends AppController
{

	public function initialize() {

        // parent::initialize();
        // $this->loadComponent('Flash'); // Include the FlashComponent

        parent::initialize();

    	// Set the layout
    	
    	$this->layout = 'frontendflook';

    }
    // public function index()
    // {
    //     $posts = $this->Posts->find('all');
    //     $this->set(compact('posts'));
    // }
}