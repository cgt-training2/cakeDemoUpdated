<?php
// src/Model/Table/PostsTable.php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class PostsupdateTable extends Table {

    public function initialize(array $config) {

        $this->addBehavior('Timestamp');

	}	

    public function validationDefault(Validator $validator) {

        $validator
            ->notEmpty('title')
            ->notEmpty('description');
        return $validator;     

    }
}