<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Foto Entity
 *
 * @property int $id
 * @property string $Judul_foto
 * @property string $Deskripsi_foto
 * @property \Cake\I18n\Date $Tanggal_unggah
 * @property string $Lokasi_file
 * @property int $Album_id
 * @property int $User_id
 *
 * @property \App\Model\Entity\Album $album
 * @property \App\Model\Entity\User $user
 */
class Foto extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'Judul_foto' => true,
        'Deskripsi_foto' => true,
        'Tanggal_unggah' => true,
        'Lokasi_file' => true,
        'Album_id' => true,
        'User_id' => true,
        'album' => true,
        'user' => true,
    ];
}
