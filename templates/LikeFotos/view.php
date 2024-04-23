<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LikeFoto $likeFoto
 */
?>

<?php
$this->assign('title', __('Like Foto'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Like Fotos'), 'url' => ['action' => 'index']],
    ['title' => __('View')],
]);
?>

<div class="view card card-primary card-outline">
    <div class="card-header d-sm-flex">
        <h2 class="card-title"><?= h($likeFoto->id) ?></h2>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Foto') ?></th>
                <td><?= $likeFoto->has('foto') ? $this->Html->link($likeFoto->foto->Judul_foto, ['controller' => 'Fotos', 'action' => 'view', $likeFoto->foto->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('User') ?></th>
                <td><?= $likeFoto->has('user') ? $this->Html->link($likeFoto->user->Username, ['controller' => 'Users', 'action' => 'view', $likeFoto->user->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($likeFoto->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Tanggal Like') ?></th>
                <td><?= h($likeFoto->Tanggal_like) ?></td>
            </tr>
        </table>
    </div>
    <div class="card-footer d-flex">
        <div class="mr-auto">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $likeFoto->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $likeFoto->id), 'class' => 'btn btn-danger']
            ) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $likeFoto->id], ['class' => 'btn btn-secondary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
</div>
