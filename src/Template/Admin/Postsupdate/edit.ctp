
<div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">

                    <span class="sr-only">Toggle navigation</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>
                    
                    <span class="icon-bar"></span>

                </button>

                <a class="navbar-brand" href="#">Admin Panel</a>

            </div>

            <!-- Top Menu Items -->

            <ul class="nav navbar-right top-nav">

                <li class="dropdown">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?= $this->request->session()->read('Auth.User.username');?> <b class="caret"></b></a>
                    
                    <ul class="dropdown-menu">

                        <li>

                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>

                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                             <?php 
                                echo $this->Html->link('Logout', ['controller' => 'Users','action' => 'logout']); 
                            ?>
                        </li>

                    </ul>
                </li>

            </ul>  <!-- navbar-right -->

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

            <div class="collapse navbar-collapse navbar-ex1-collapse">

                <ul class="nav navbar-nav side-nav">

                   <li class="<?php echo (!empty($this->request->params['action']) && ($this->request->params['action']=='dashboard') )?'active' :'inactive' ?>">

                        <?php echo $this->Html->link("Dashboard", array('controller'=>'Postsupdate','action'=>'dashboard') ); ?>

                    </li>

                    <li class="<?php echo (!empty($this->request->params['action']) && ($this->request->params['action']=='add_user') )?'active' :'inactive' ?>">

                        <?php echo $this->Html->link("User", array('controller'=>'Users','action'=>'add_user') ); ?>
                        
                    </li>

                   <li class="<?php echo (!empty($this->request->params['action']) && ($this->request->params['action']=='add') )?'active' :'inactive' ?>">
                    
                        <?php echo $this->Html->link("Add Post", array('controller'=>'Postsupdate','action'=>'add') ); ?>
                        
                    </li>

                    <li class="<?php echo (!empty($this->request->params['action']) && ($this->request->params['action']=='fetchuser') )?'active' :'inactive' ?>">

                        <?php echo $this->Html->link("Check Available User", array('controller'=>'Users','action'=>'fetchuser') ); ?>
                        
                    </li>

                    <li class="<?php echo (!empty($this->request->params['action']) && ($this->request->params['action']=='posts') )?'active' :'inactive' ?>">

                        <?php echo $this->Html->link("Check Posts", array('controller'=>'Postsupdate','action'=>'posts') ); ?>

                    </li>
        
                </ul>

            </div>

            <!-- /.navbar-collapse -->

        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                 
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

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
</div>




