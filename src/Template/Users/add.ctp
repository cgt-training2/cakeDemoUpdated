
<div class="container">
    
    <div class="addUser">  

        <div class="addUserSub">

            <h1 class="addH1">Add User</h1>

            <div class="users form">

            	<?= $this->Form->create($user) ?>

                	<fieldset>

                            <div class="addUsernameDiv">

                    		      <?= $this->Form->input('username') ?>

                            </div>      <!-- addUsernameDiv -->

                            <div class="addpassDiv">

                    		      <?= $this->Form->input('password') ?>

                            </div><!-- addpassDiv -->      

                            <div class="addroleDiv">

                        		<?= $this->Form->input('role', [

                            		'options' => ['admin' => 'Admin', 'author' => 'Author']

                        		]) ?>

                            </div>    <!-- addroleDiv -->

               		</fieldset>

                    <div class="addsubmitDiv">

                	       <?= $this->Form->button(__('Submit')); ?>

                    </div> <!-- addsubmitDiv -->      

            	<?= $this->Form->end() ?>

            </div>

        </div> <!-- addUserSub div -->

    </div> <!-- addUser div -->

</div> <!-- container div -->  
