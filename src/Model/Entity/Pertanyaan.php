<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pertanyaan Entity
 *
 * @property int $key_pertanyaan
 * @property int $key_materi
 * @property string $pertanyaan
 */
class Pertanyaan extends Entity
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
        'key_materi' => true,
        'pertanyaan' => true
    ];
}
