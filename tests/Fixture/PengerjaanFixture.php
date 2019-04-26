<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PengerjaanFixture
 *
 */
class PengerjaanFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'pengerjaan';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'key_pengerjaan' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'key_topik' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'key_pertanyaan' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'key_materi' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'jawaban' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'nilai' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'key_data_pengguna' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_pengerjaan_pengguna_key_data_pengguna' => ['type' => 'index', 'columns' => ['key_data_pengguna'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['key_pengerjaan'], 'length' => []],
            'fk_pengerjaan_pengguna_key_data_pengguna' => ['type' => 'foreign', 'columns' => ['key_data_pengguna'], 'references' => ['pengguna', 'key_data_pengguna'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'key_pengerjaan' => 1,
                'key_topik' => 1,
                'key_pertanyaan' => 1,
                'key_materi' => 1,
                'jawaban' => 'Lorem ipsum dolor sit amet',
                'nilai' => 1,
                'key_data_pengguna' => 1
            ],
        ];
        parent::init();
    }
}
