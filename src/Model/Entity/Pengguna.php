<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pengguna Entity
 *
 * @property int $key_data_pengguna
 * @property string $nama
 * @property string $email
 * @property int $key_pengguna
 */
class Pengguna extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'nama' => true,
        'email' => true,
        'key_pengguna' => true
    ];
}
