<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PertanyaanFixture
 *
 */
class PertanyaanFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'pertanyaan';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'key_pertanyaan' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'key_materi' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'pertanyaan' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'fk_pertanyaan_materi_key_materi' => ['type' => 'index', 'columns' => ['key_materi'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['key_pertanyaan'], 'length' => []],
            'fk_pertanyaan_materi_key_materi' => ['type' => 'foreign', 'columns' => ['key_materi'], 'references' => ['materi', 'key_materi'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'key_pertanyaan' => 1,
                'key_materi' => 1,
                'pertanyaan' => 'Lorem ipsum dolor sit amet'
            ],
        ];
        parent::init();
    }
}
