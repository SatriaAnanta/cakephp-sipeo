<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * JawabanFixture
 *
 */
class JawabanFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'jawaban';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'key_jawaban' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'key_pertanyaan' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'jawaban' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'bobot' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        '_indexes' => [
            'fk_jawaban_pertanyaan_key_pertanyaan' => ['type' => 'index', 'columns' => ['key_pertanyaan'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['key_jawaban'], 'length' => []],
            'fk_jawaban_pertanyaan_key_pertanyaan' => ['type' => 'foreign', 'columns' => ['key_pertanyaan'], 'references' => ['pertanyaan', 'key_pertanyaan'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'key_jawaban' => 1,
                'key_pertanyaan' => 1,
                'jawaban' => 'Lorem ipsum dolor sit amet',
                'bobot' => 1
            ],
        ];
        parent::init();
    }
}
