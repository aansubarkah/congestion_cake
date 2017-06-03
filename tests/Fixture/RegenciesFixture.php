<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RegenciesFixture
 *
 */
class RegenciesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'state_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'hierarchy_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'name' => ['type' => 'string', 'length' => 255, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'lat' => ['type' => 'decimal', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => 6, 'unsigned' => null],
        'lng' => ['type' => 'decimal', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => 6, 'unsigned' => null],
        'active' => ['type' => 'boolean', 'length' => null, 'default' => 1, 'null' => true, 'comment' => null, 'precision' => null],
        'alias' => ['type' => 'string', 'length' => 255, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'state_id' => 1,
            'hierarchy_id' => 1,
            'name' => 'Lorem ipsum dolor sit amet',
            'lat' => 1.5,
            'lng' => 1.5,
            'active' => 1,
            'alias' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
