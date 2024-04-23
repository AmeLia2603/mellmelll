<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LikeFoto Entity
 *
 * @property int $id
 * @property int $Foto_id
 * @property int $User_id
 * @property \Cake\I18n\Date $Tanggal_like
 *
 * @property \App\Model\Entity\Foto $foto
 * @property \App\Model\Entity\User $user
 */
class LikeFoto extends Entity
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
        'Tanggal_like' => true,
        'foto' => true,
        'user' => true,
    ];
}
