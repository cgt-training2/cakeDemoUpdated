<div class="container">

	<div class="row">

		<div class="displayCommentsMain">

			<h1 style="text-align:center;">Previous Comments</h1>

			<?php foreach($findComment as $comments): ?>

			<div class="displayCommentsMainContent">

				<div class="displayCommentsMainContentUserId" style="text-align:center;">

					User:-> <?php echo $comments->u_name; ?>

				</div> <!-- displayCommentsMainContentUserId -->

				<div class="displayCommentsMainContentComments" style="text-align:center;">

					Comment:-> <?php echo $comments->comment; ?>

				</div>

			</div> <!-- "displayCommentsMainContent" -->

			<?php endforeach; ?>
			<?php unset($comments); ?>

			<div class="displayCommentsMainAddComment">

				<h1 style="text-align:center;color:#4682B4;"> Add Comment </h1>

				<?php

	    			echo $this->Form->create($comment);

	    		?>	

	    		<div class="inputTitle1" style="color='black';">

	    			<?php

	    				echo $this->Form->input('c_Title', ['required' => true]);
	    		
	    			?>	

	    		</div>	

	    		<div class="inputDescription1" style="color='black';">

	    			<?php

	    				echo $this->Form->input('comment', ['rows' => '3'], ['required' => true]);

	    			?>	

	    		</div>	

	    		<div class="inputSubmit">

	    			<?php

	    				echo $this->Form->button(__('Save Comment'));

	    			?>

	    				

	    		</div>

	    		<?php	

	    			echo $this->Form->end();

	    		?>

			</div>  <!-- displayCommentsMainAddComment -->

		</div>  <!-- displayCommentsMain -->

	</div>

</div>