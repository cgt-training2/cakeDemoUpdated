<?php

	echo $this->Html->script('http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'); // Include jQuery library

    // echo $this->Html->script('http://code.jquery.com/jquery-1.9.1.js'); 

    echo $this->Html->charset();

    echo $this->Html->css(array('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css', 'style.css', 'responsive.css','sbadmin.css'));

    echo $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js');
    
    echo $this->Html->script('myJQuery.js');

    // echo $this->Html->script('myScript.js');

?>
<title>CakePHP Tutorial </title>