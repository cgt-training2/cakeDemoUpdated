
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

                        <li class="divider">

                        </li>

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
                              
                    <div class="users form">

                        <h1 style="text-align: center;">Posts</h1>

                        <div class="table-responsive">

                            <table class="indexTable">

                                <thead>

                                    <tr>

                                        <th class="indexTableTbodyTh"> <?php echo $this->Form->checkbox('all', array('name' => 'CheckAll',  'id' => 'CheckAll')); 

                                        ?></th>

                                        <th class="indexTableTbodyTh"> <?php echo $this->Paginator->sort('title', 'Title');?>  </th>

                                        <th class="indexTableTbodyTh"> <?php echo $this->Paginator->sort('description', 'Description');?></th>

                                        <th class="indexTableTbodyTh"> <?php echo $this->Paginator->sort('created', 'Created');?></th>

                                        <th class="indexTableTbodyTh"> <?php echo $this->Paginator->sort('modified','Last Update');?></th>

                                        <th class="indexTableTbodyTh"> <?php echo $this->Paginator->sort('status','Status');?></th>

                                        <th class="indexTableTbodyTh"> Actions</th>

                                    </tr>

                                </thead>

                                <tbody class="indexTableTbody">                       

                                    <?php $count=0; ?>

                                    <?php foreach($postsupdate as $posts): ?>                

                                    <?php $count ++;?>

                                    <?php if($count % 2): echo '<tr>'; else: echo '<tr class="zebra">' ?>

                                    <?php endif; ?>

                                    <td class="indexTableTbodyTd"> <?php echo $this->Form->checkbox('Postsupdate.id.'.$posts['Postsupdate']['id']); ?> </td>

                                    <td class="indexTableTbodyTd"> <?php echo $this->Html->link( $posts->title  ,   array('action'=>'edit', $posts->id),array('escape' => false) );?> </td>

                                    <td class="indexTableTbodyTd"> <?php echo $posts->description; ?> </td>

                                    <td class="indexTableTbodyTd"> <?php echo $posts->created; ?> </td>

                                    <td class="indexTableTbodyTd"> <?php echo $posts->modified; ?> </td>

                                    <td class="indexTableTbodyTd"> <?php echo $posts->status; ?><?php $status = $posts->status; if($status == 1): ?> 

                                        <?= $this->Form->input('Change Status', [

                                                    'options' => [ 1 => 'Active', 0 => 'Inactive']

                                                ]) ?> 

                                        <?php else:?>        

                                        <?= $this->Form->input('Change Status', [

                                            'options' => [ 0 => 'Inactive', 1 => 'Active']

                                        ]) ?> 

                                        <?php $this->Form->end(); ?>

                                         <?php endif; ?>

                                    </td>

                                    <td class="indexTableTbodyTd">

                                        <?php echo $this->Html->link("Edit", array('controller' => 'Postsupdate','action'=>'edit', $posts->id)); ?> <br/> 

                                        <?php

                                            if( $posts->status != 0){ 

                                                echo $this->Html->link( "Delete", array('controller' => 'Postsupdate','action'=>'delete', $posts->id), ['confirm' => 'Are you sure?']);

                                            } else{

                                                echo $this->Html->link( "Re-Activate", array('action'=>'activate', $posts->id));

                                            }

                                        ?>

                                    </td>

                                </tr>

                                    <?php endforeach; ?>

                                    <?php unset($posts); ?>

                                </tbody>

                         </table>

                    </div> <!-- table responsive -->

                    <div class="paginatorMainDivD">

                        <ul class="paginatorMainDiv">

                            <!--    <ul class="paginatorDiv">-->

                            <?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>

                            <?php echo $this->Paginator->numbers(array(   'class' => 'numbers'));?>

                            <?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>

                            <!-- </ul> --> <!-- paginatorDiv --> 

                        </ul><!-- paginatorMainDiv -->

                    </div>

                </div> <!-- users form -->               

            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>

