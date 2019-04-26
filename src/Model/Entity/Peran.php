<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Peran Entity
 *
 * @property int $key_peran
 * @property string $nama_peran
 */
class Peran extends Entity
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
        'nama_peran' => true
    ];
}
