<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Materi Entity
 *
 * @property int $key_materi
 * @property int $key_topik
 * @property string $materi
 * @property string $isi_materi
 */
class Materi extends Entity
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
        'key_topik' => true,
        'materi' => true,
        'isi_materi' => true
    ];
}
