<h1>Blog Posts</h1>
<div class="row">
    <?php if(!empty($postsupdate)): foreach($postsupdate as $post): ?>
    <div class="post-box">
        <div class="post-content">
            <div class="caption">
                <h4><a href="javascript:void(0);"><?php echo $post->title; ?></a></h4>
                <p><?php echo $post->description; ?></p>
            </div>
        </div>
    </div>
    <?php endforeach; else: ?>
        <p class="no-record">No post(s) found......</p>
    <?php endif; ?>

    <?= $this->Html->link('Add New Post', ['action' => 'add']) ?><br>
   
    <?= $this->Html->link('Edit', ['action' => 'edit', $post->id]) ?><br>
   
    <?= $this->Form->postLink('Delete', ['action' => 'delete', $post->id], ['confirm' => 'Are you sure?']) ?><br>    

    <?= $this->Html->link('RestApi', ['action' => 'addrest']) ?><br>

    <?= $this->Html->link('Logout', ['controller' => 'Users','action' => 'logout']) ?>

</div>

