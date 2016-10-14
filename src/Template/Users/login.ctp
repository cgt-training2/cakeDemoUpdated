
<div class="container">
    
<div class="loginMain">  

	<div class="loginSub">

		<div class="loginSubUpper">
			<h2 class="loginSubUpperHeading">Login</h2>
			<label class="loginSubUpperLabel">Lorem Ipsum is simply dummy text of the printing and</label><br>
			<label class="loginSubUpperLabel typeSetting">typesetting industry</label>
		</div>  <!-- loginSubUpper div -->

		<div class="loginSubUpperContainer"> 

			 <!-- <form role="form" id="loginForm" method="post"> -->

                <?php

                      $this->Flash->render('auth'); 
                      echo $this->Form->create('User'); 

                ?>        

                  <fieldset>

                    <legend><?= __('Please enter your username and password') ?></legend>

                        <div class="form-group formEmail">

                        	    <!-- <label for="Login[email]" class="formLabel">Email:</label>

                                <input type="text" name="Login[email]" placeholder="Email" class="form-control insideLoginEmail" required> -->

                                <div class="insideLoginEmail">

                                    <?= $this->Form->input('username');?>
                                        
                                </div> 

                        </div>

                        <div class="form-group formPass">

                        	    <!-- <label for="Login[password]" class="formLabelPass">Password:</label>
                        	    
                                <input type="text"  name="Login[password]" class="form-control insideLoginPassword" placeholder="Password" required> -->

                                <div class="insideLoginPassword">

                                    <?= $this->Form->input('password');?>

                                </div>
                        </div>
                        
                       
                            <!-- action="Postsupdate/addInquiry" onclick="echo $form->create('Post', array('action' => 'Postsupdate/addInquiry'));"-->
                            <div class="insideLoginSubmit1">
                                <!-- <button type="submit" class="btn btn-primary insideLoginSubmit"> Submit </button> -->

                                <div class="insideLoginSubmitLogin">

                                        <?php
                                            echo $this->Form->button(__('Login')); 
                                        ?>

                                </div>        

                                <div class="insideLoginSubmitCheck">

                                    <?php echo $this->Form->input('RememberMe', ['type' => 'checkbox']); ?>
                                    
                                </div>    


                            </div> <!--insideLoginSubmit1 -->
                </fieldset> 
                <?php
                                
                    echo $this->Form->end(); 

                ?>    

            <!-- </form> -->

		</div>

	</div> <!-- loginSub Div-->

</div> <!-- loginMain Div-->

</div><!-- Container -->