 
<!-- <h1 class="addH1BlogPost">Add Blog Post</h1>



<?php

//    echo $this->Form->create($post);


  //  		echo $this->Form->input('title');
    //		echo $this->Form->input('description', ['rows' => '3']);
    //		echo $this->Form->button(__('Save Post'));
    //echo $this->Form->end();
?> --> 

<div class="mainAddPost">

<h1 class="addH1BlogPost">Add Blog Post</h1>



<div class="container">

	<div class="row">

		<?php

	    	echo $this->Form->create($post);

	    ?>	

	    <div class="inputTitle">

	    	<?php

	    		echo $this->Form->input('title');
	    		
	    	?>	

	    </div>	

	    <div class="inputDescription">

	    	<?php

	    		echo $this->Form->input('description', ['rows' => '3']);

	    	?>	

	    </div>	

	    <div class="inputSubmit">

	    	<?php

	    		echo $this->Form->button(__('Save Post'));

	    	?>	

	    </div>

	    	<?php	

	    		echo $this->Form->end();

	    	?>	

    </div><!-- row -->
</div><!--container-->

</div>

<!-- <div class="container">

	<div class="addBlogDiv">

		<h1 class="addH1BlogPost">Add Blog Post</h1>

		<?php

	     	//$this->Form->create($post);

	    ?> 	

	    <div class="form-group formTitle">

	    	<div class="titleDiv">

	    		<?php

	    			//$this->Form->input('title'); 

	    		?>	

	    	</div>	

	    </div>	formTitle -->

<!--	    <div class="form-group formDescription">

	    	<div class="descriptionDiv"> 

	    		<?php

	    			// $this->Form->input('description', ['rows' => '3']); 

	    		?>	 

	    	</div>

	    </div>	 formDescription -->

<!--	    <div class="form-group formSubmit">

	    	<div class="buttonDiv"> 

	    			<?php

	    			//	$this->Form->button(__('Save Post')); 

	    			?>

	    	</div>		

	    </div>	 formSubmit -->

<!--	<?php

	    			//echo $this->Form->end();

	    	?>		

    </div>

</div> -->