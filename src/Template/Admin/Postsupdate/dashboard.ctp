
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

                            <a href="#"> <i class="fa fa-fw fa-user"></i> Profile</a>

                        </li>

                        <li>

                            <a href="#"> <i class="fa fa-fw fa-envelope"></i> Inbox</a>

                        </li>

                        <li>

                            <a href="#"> <i class="fa fa-fw fa-gear"></i> Settings</a>

                        </li>

                        <li class="divider"> </li>

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

                    <div class="col-lg-12">

                        <h1 class="page-header">

                            Dashboard <small> Overview </small>

                        </h1>

                        <ol class="breadcrumb">

                            <li class="active">

                                <i class="fa fa-dashboard"></i> Dashboard

                            </li>

                        </ol>

                    </div>

                </div>

                <!-- /.row -->
                <!-- /.row -->

                <div class="row">

                    <div class="col-lg-6 col-md-6">

                        <div class="panel panel-primary">

                            <div class="panel-heading">

                                <div class="row">

                                    <div class="col-xs-3">

                                        <i class="fa fa-comments fa-5x"></i>

                                    </div>

                                    <div class="col-xs-9 text-right">

                                        <div class="huge"> <?= $userCount ?> </div>
                                        <div>Total Users</div>

                                    </div>

                                </div>

                            </div>

                            <a href="#">

                                <div class="panel-footer">

                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>

                                </div>

                            </a>

                        </div>

                    </div>

                    <div class="col-lg-6 col-md-6">

                        <div class="panel panel-green">

                            <div class="panel-heading">

                                <div class="row">

                                    <div class="col-xs-3">

                                        <i class="fa fa-tasks fa-5x"></i>

                                    </div>

                                    <div class="col-xs-9 text-right">

                                        <div class="huge"><?= $number ?></div>
                                        <div>Total Posts</div>

                                    </div>

                                </div>

                            </div>

                            <a href="#">

                                <div class="panel-footer">

                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>

                                </div>

                            </a>

                        </div>

                    </div>
                    
                <!-- /.row -->

                <div class="row">

                    <div class="col-lg-12">

                        <div class="panel panel-default">

                            <div class="panel-heading">

                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Tasks Panel</h3>

                            </div>

                            <div class="panel-body">

                                <div class="list-group">

                                    <a href="#" class="list-group-item">

                                        <span class="badge"><?= $lastValueUser->created; ?></span> <!-- $posts['Postsupdate']['id'] -->
                                        <i class="fa fa-fw fa-calendar"></i> Last User added

                                    </a>

                                    <a href="#" class="list-group-item">

                                        <span class="badge"><?= $lastValuePost->created; ?></span>
                                        <i class="fa fa-fw fa-comment"></i>Last Post added

                                    </a>

                                    <!--<a href="#" class="list-group-item">
                                        
                                            <span class="badge">just now</span>
                                            <i class="fa fa-fw fa-truck"></i> Last Post Deleted

                                        </a>

                                        <a href="#" class="list-group-item">

                                            <span class="badge">46 minutes ago</span>
                                            <i class="fa fa-fw fa-money"></i> Last Post Edited

                                        </a> -->

                                </div>
                                
                            </div>

                        </div>

                    </div>

                </div>

                <!-- /.row -->

            </div>

            <!-- /.container-fluid -->

        </div>

        <!-- /#page-wrapper -->

</div>

<!-- wrapper -->