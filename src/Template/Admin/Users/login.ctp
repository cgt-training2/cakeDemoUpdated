
<div class="container">
    
    <div class="loginMain">  

    	<div class="loginSub">

    		<div class="loginSubUpper">

    			<h2 class="loginSubUpperHeading">Login</h2>

    			<label class="loginSubUpperLabel">Lorem Ipsum is simply dummy text of the printing and</label><br>

    			<label class="loginSubUpperLabel typeSetting">typesetting industry</label>
                
    		</div>  <!-- loginSubUpper div -->

    		<div class="loginSubUpperContainer"> 

    			<form role="form" id="loginForm" method="post">

                    <?php

                        $this->Flash->render('auth'); 

                       echo $this->Form->create(); 

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
                            
                    </fieldset>        

                        <!-- action="Postsupdate/addInquiry" onclick="echo $form->create('Post', array('action' => 'Postsupdate/addInquiry'));"-->

                        <button type="submit" class="btn btn-primary insideLoginSubmit"> Submit </button>

                            <div class="insideLoginSubmit">

                                <?php

                                    $this->Form->button(__('Login')); 

                                ?>    

                            </div>  <!-- insideLoginSubmit -->

                            <?php
                                    
                                $this->Form->end(); 

                            ?>    

                </form>

    		</div>

    	</div> <!-- loginSub Div-->

    </div> <!-- loginMain Div-->

</div><!-- Container -->