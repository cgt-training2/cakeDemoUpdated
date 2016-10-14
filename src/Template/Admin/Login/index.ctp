<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Login'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="login index large-9 medium-8 columns content">
    <h3><?= __('Login') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('password') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($login as $login): ?>
            <tr>
                <td><?= h($login->email) ?></td>
                <td><?= h($login->password) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $login->email]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $login->email]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $login->email], ['confirm' => __('Are you sure you want to delete # {0}?', $login->email)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
