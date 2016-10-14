<?php
// src/Controller/PostsController.php

namespace App\Controller;
use Cake\ORM\TableRegistry;
use Cake\Core\App;
use Cake\Controller\Controller;

class PhonesController extends AppController{

    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');
 
    public function index() {
         $this->set('phones', $this->Phones->find('all'));
    }
     
    public function add() {
    	
        if ($this->request->is('post')) {
            $this->Phones->create();
            if ($this->Phones->save($this->request->data)) {
                $this->Session->setFlash(__('The phone has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your phone.'));
        }

    }
 
    public function view($id = null) {

        if (!$id) {
            throw new NotFoundException(__('Invalid phone'));
        }
 
        $phone = $this->Phones->findById($id);
        if (!$phone) {
            throw new NotFoundException(__('Invalid phone'));
        }
        $this->set('phone', $phone);

    }
     
    public function edit($id = null) {

        if (!$id) {
            throw new NotFoundException(__('Invalid phone'));
        }
 
        $phone = $this->Phones->findById($id);
        if (!$phone) {
            throw new NotFoundException(__('Invalid phone'));
        }
 
        if ($this->request->is(array('phone', 'put'))) {
            $this->Phones->id = $id;
            if ($this->Phone->save($this->request->data)) {
                $this->Session->setFlash(__('Your phone has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update your phone.'));
        }
 
        if (!$this->request->data) {
            $this->request->data = $phone;
        }

    }
     
    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
 
        if ($this->Phones->delete($id)) {
            $this->Session->setFlash(
                __('The phone with id: %s has been deleted.', h($id))
            );
            return $this->redirect(array('action' => 'index'));
        }
    }

}