<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LikeFoto $likeFoto
 */
?>

<?php
$this->assign('title', __('Edit Like Foto'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Like Fotos'), 'url' => ['action' => 'index']],
    ['title' => __('View'), 'url' => ['action' => 'view', $likeFoto->id]],
    ['title' => __('Edit')],
]);
?>

<div class="card card-primary card-outline">
    <?= $this->Form->create($likeFoto) ?>
    <div class="card-body">
        <?= $this->Form->control('Foto_id', ['options' => $fotos, 'class' => 'form-control']) ?>
        <?= $this->Form->control('User_id', ['options' => $users, 'class' => 'form-control']) ?>
        <?= $this->Form->control('Tanggal_like') ?>
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
            <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'view', $likeFoto->id], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>