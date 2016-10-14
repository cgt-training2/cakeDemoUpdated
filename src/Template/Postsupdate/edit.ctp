<div class="mainAddPost">

<h1 class="addH1BlogPost">Edit Blog Post</h1>



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