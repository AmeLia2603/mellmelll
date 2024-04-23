<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\KomentarFoto $komentarFoto
 */
?>

<?php
$this->assign('title', __('Add Komentar Foto'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Komentar Fotos'), 'url' => ['action' => 'index']],
    ['title' => __('Add')],
]);
?>

<div class="card card-primary card-outline">
    <?= $this->Form->create($komentarFoto, ['valueSources' => ['query', 'context']]) ?>
    <div class="card-body">
        <?= $this->Form->control('Foto_id', ['options' => $fotos, 'class' => 'form-control']) ?>
        <?= $this->Form->control('User_id', ['options' => $users, 'class' => 'form-control']) ?>
        <?= $this->Form->control('Isi_komentar') ?>
        <?= $this->Form->control('Tanggal_komentar') ?>
    </div>
    <div class="card-footer d-flex">
        <div class="ml-auto">
            <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>