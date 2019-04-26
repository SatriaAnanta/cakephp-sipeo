<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MateriFixture
 *
 */
class MateriFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'materi';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'key_materi' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'key_topik' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'materi' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'isi_materi' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'fk_materi_topik_key_topik' => ['type' => 'index', 'columns' => ['key_topik'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['key_materi'], 'length' => []],
            'fk_materi_topik_key_topik' => ['type' => 'foreign', 'columns' => ['key_topik'], 'references' => ['topik', 'key_topik'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'key_materi' => 1,
                'key_topik' => 1,
                'materi' => 'Lorem ipsum dolor sit amet',
                'isi_materi' => 'Lorem ipsum dolor sit amet'
            ],
        ];
        parent::init();
    }
}
