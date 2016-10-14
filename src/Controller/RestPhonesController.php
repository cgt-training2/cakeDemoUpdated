<?php

namespace App\Controller;
use Cake\ORM\TableRegistry;
use Cake\Core\App;
use Cake\Controller\Controller;

  //Import controller
 // App::import('Controller', 'Posts');

class RestPhonesController extends AppController {

	public $uses = array('Phones');

    public $helpers = array('Html', 'Form');

	public $components = array('RequestHandler');

	public function index() {

		$phones = $this->Phones->find('all');
        $this->set(array(
            'phones' => $phones,
            '_serialize' => array('phones')
        ));

    }

	public function add() {

		$this->Phones->create();
		if ($this->Phones->save($this->request->data)) {
			 $message = 'Created';
		} else {
			$message = 'Error';
		}
		$this->set(array(
			'message' => $message,
			'_serialize' => array('message')
		));

    }
	
	public function view($id) {

        $phone = $this->Phones->findById($id);
        $this->set(array(
            'phone' => $phone,
            '_serialize' => array('phone')
        ));

    }
	
	public function edit($id) {

        $this->Phones->id = $id;
        if ($this->Phones->save($this->request->data)) {

            $message = 'Saved';

        } else {

            $message = 'Error';

        }
        
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));

    }
	
	public function delete($id) {

        if ($this->Phones->delete($id)) {
            $message = 'Deleted';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));

    }

}