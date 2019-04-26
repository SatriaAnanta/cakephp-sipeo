<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Jawaban Entity
 *
 * @property int $key_jawaban
 * @property int $key_pertanyaan
 * @property string $jawaban
 * @property float $bobot
 */
class Jawaban extends Entity
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
        'key_pertanyaan' => true,
        'jawaban' => true,
        'bobot' => true
    ];
}
