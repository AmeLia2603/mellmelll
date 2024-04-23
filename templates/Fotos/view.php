<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Foto $foto
 */
?>

<?php
$this->assign('title', __('Foto'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Fotos'), 'url' => ['action' => 'index']],
    ['title' => __('View')],
]);
?>

<div class="view card card-primary card-outline">
    <div class="card-header d-sm-flex">
        <h2 class="card-title"><?= h($foto->Judul_foto) ?></h2>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Judul Foto') ?></th>
                <td><?= h($foto->Judul_foto) ?></td>
            </tr>
            <tr>
                <th><?= __('Lokasi File') ?></th>
                <td><?= h($foto->Lokasi_file) ?></td>
            </tr>
            <tr>
                <th><?= __('Album') ?></th>
                <td><?= $foto->has('album') ? $this->Html->link($foto->album->Nama_album, ['controller' => 'Albums', 'action' => 'view', $foto->album->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('User') ?></th>
                <td><?= $foto->has('user') ? $this->Html->link($foto->user->Username, ['controller' => 'Users', 'action' => 'view', $foto->user->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($foto->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Tanggal Unggah') ?></th>
                <td><?= h($foto->Tanggal_unggah) ?></td>
            </tr>
        </table>
    </div>
    <div class="card-footer d-flex">
        <div class="mr-auto">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $foto->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $foto->id), 'class' => 'btn btn-danger']
            ) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $foto->id], ['class' => 'btn btn-secondary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
</div>

<div class="view text card">
    <div class="card-header">
        <h3 class="card-title"><?= __('Deskripsi Foto') ?></h3>
    </div>
    <div class="card-body">
        <?= $this->Text->autoParagraph(h($foto->Deskripsi_foto)); ?>
    </div>
</div>
