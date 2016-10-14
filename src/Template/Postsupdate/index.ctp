<div class="users postform">

    <h1 style="text-align: center;">Posts</h1>



    <div class="table-responsive">

        <table class="indexTable table-responsive">

            <thead>

                <tr>

                    <th class="indexTableTbodyTh"> <?php echo $this->Form->checkbox('all', array('name' => 'CheckAll',  'id' => 'CheckAll')); ?></th>

                    <th class="indexTableTbodyTh"> <?php echo $this->Paginator->sort('title', 'Title');?>  </th>

                    <th class="indexTableTbodyTh"> <?php echo $this->Paginator->sort('description', 'Description');?></th>

                    <th class="indexTableTbodyTh"> <?php echo $this->Paginator->sort('', 'Comments');?></th>

                </tr>

            </thead>

            <tbody class="indexTableTbody">                       

                <?php $count=0; ?>

                <?php foreach($postsupdate as $posts): ?>                

                <?php $count ++;?>

                <?php if($count % 2): echo '<tr>'; else: echo '<tr class="zebra">' ?>

                <?php endif; ?>

                    <td class="indexTableTbodyTd"> <?php echo $this->Form->checkbox('Postsupdate.id.'.$posts['Postsupdate']['id']); ?> </td>

                    <td class="indexTableTbodyTd"> <?php echo $this->Html->link( $posts->title  ,   array('action'=>'edit', $posts->id),array('escape' => false) );

                    ?> </td>

                    <td class="indexTableTbodyTd"> <?php echo $posts->description; ?> </td>

                    <td class="indexTableTbodyTd"> <?php echo $this->Html->link( 'Click To Comment' , array('action'=>'comment', $posts->id),array('escape' => false) ); ?> </td>

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

       

<br/>

        <!-- <?php 
        // echo $this->Html->link('Logout', ['controller' => 'Users','action' => 'logout']); 
         ?>-->