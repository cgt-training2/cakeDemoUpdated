<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Login'), ['action' => 'edit', $login->email]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Login'), ['action' => 'delete', $login->email], ['confirm' => __('Are you sure you want to delete # {0}?', $login->email)]) ?> </li>
        <li><?= $this->Html->link(__('List Login'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Login'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="login view large-9 medium-8 columns content">
    <h3><?= h($login->email) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($login->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($login->password) ?></td>
        </tr>
    </table>
</div>
