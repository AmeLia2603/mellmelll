<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $Username
 * @property string $Password
 * @property string $Email
 * @property string $Nama_lengkap
 * @property string $Alamat
 */
class User extends Entity
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
        'Username' => true,
        'Password' => true,
        'Email' => true,
        'Nama_lengkap' => true,
        'Alamat' => true,
    ];
}
