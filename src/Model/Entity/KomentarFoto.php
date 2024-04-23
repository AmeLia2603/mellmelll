<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * KomentarFoto Entity
 *
 * @property int $id
 * @property int $Foto_id
 * @property int $User_id
 * @property string $Isi_komentar
 * @property \Cake\I18n\Date $Tanggal_komentar
 *
 * @property \App\Model\Entity\Foto $foto
 * @property \App\Model\Entity\User $user
 */
class KomentarFoto extends Entity
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
        'Foto_id' => true,
        'User_id' => true,
        'Isi_komentar' => true,
        'Tanggal_komentar' => true,
        'foto' => true,
        'user' => true,
    ];
}
