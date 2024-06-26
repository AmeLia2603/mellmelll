<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\KomentarFoto $komentarFoto
 */
?>

<?php
$this->assign('title', __('Komentar Foto'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Komentar Fotos'), 'url' => ['action' => 'index']],
    ['title' => __('View')],
]);
?>

<div class="view card card-primary card-outline">
    <div class="card-header d-sm-flex">
        <h2 class="card-title"><?= h($komentarFoto->id) ?></h2>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Foto') ?></th>
                <td><?= $komentarFoto->has('foto') ? $this->Html->link($komentarFoto->foto->Judul_foto, ['controller' => 'Fotos', 'action' => 'view', $komentarFoto->foto->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('User') ?></th>
                <td><?= $komentarFoto->has('user') ? $this->Html->link($komentarFoto->user->Username, ['controller' => 'Users', 'action' => 'view', $komentarFoto->user->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($komentarFoto->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Tanggal Komentar') ?></th>
                <td><?= h($komentarFoto->Tanggal_komentar) ?></td>
            </tr>
        </table>
    </div>
    <div class="card-footer d-flex">
        <div class="mr-auto">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $komentarFoto->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $komentarFoto->id), 'class' => 'btn btn-danger']
            ) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $komentarFoto->id], ['class' => 'btn btn-secondary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
</div>

<div class="view text card">
    <div class="card-header">
        <h3 class="card-title"><?= __('Isi Komentar') ?></h3>
    </div>
    <div class="card-body">
        <?= $this->Text->autoParagraph(h($komentarFoto->Isi_komentar)); ?>
    </div>
</div>
