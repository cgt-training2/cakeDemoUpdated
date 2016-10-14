<h1>Add Blog Post</h1>
<?php
    echo $this->Form->create($post);
    	echo $this->Form->input('name');
    	echo $this->Form->input('phoneNo');
    	echo $this->Form->input('email');
    	echo $this->Form->input('query');
    	echo $this->Form->button(__('Save Post'));
    echo $this->Form->end();
?>