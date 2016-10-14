<?php

// src/Model/Table/PostsTable.php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class InquiryTable extends Table {
    
    public function initialize(array $config) {

        $this->addBehavior('Timestamp');

    }

    public function validationDefault(Validator $validator) {

        $validator
            ->notEmpty('name')
            ->notEmpty('phoneNo')
            ->notEmpty('email')
            ->notEmpty('query');
        return $validator;     

    }

}