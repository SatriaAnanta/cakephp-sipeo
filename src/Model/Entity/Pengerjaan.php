<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pengerjaan Entity
 *
 * @property int $key_pengerjaan
 * @property int $key_topik
 * @property int $key_pertanyaan
 * @property int $key_materi
 * @property string $jawaban
 * @property float $nilai
 * @property int $key_data_pengguna
 *
 * @property \App\Model\Entity\Pengguna $pengguna
 */
class Pengerjaan extends Entity
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
        'key_pertanyaan' => true,
        'key_materi' => true,
        'jawaban' => true,
        'nilai' => true,
        'key_data_pengguna' => true,
        'pengguna' => true
    ];
}
