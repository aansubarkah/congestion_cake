<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SuggestionSpotFixture
 *
 */
class SuggestionSpotFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'suggestion_spot';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'place_id' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'place_name' => ['type' => 'string', 'length' => 255, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'lat' => ['type' => 'decimal', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => 6, 'unsigned' => null],
        'lng' => ['type' => 'decimal', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => 6, 'unsigned' => null],
        'regency_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'regency_name' => ['type' => 'string', 'length' => 255, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'hierarchy_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'hierarchy_name' => ['type' => 'string', 'length' => 255, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'place_id' => 1,
            'place_name' => 'Lorem ipsum dolor sit amet',
            'lat' => 1.5,
            'lng' => 1.5,
            'regency_id' => 1,
            'regency_name' => 'Lorem ipsum dolor sit amet',
            'hierarchy_id' => 1,
            'hierarchy_name' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
