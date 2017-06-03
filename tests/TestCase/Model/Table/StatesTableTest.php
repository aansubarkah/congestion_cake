<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StatesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StatesTable Test Case
 */
class StatesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StatesTable
     */
    public $States;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.states',
        'app.regencies',
        'app.hierarchies',
        'app.districts',
        'app.places',
        'app.humans',
        'app.ts',
        'app.classifications',
        'app.breeds',
        'app.kinds',
        'app.raws',
        'app.respondents',
        'app.regions',
        'app.locations',
        'app.users',
        'app.regencies_regions',
        'app.t_users',
        'app.markers',
        'app.categories',
        'app.machines',
        'app.weather',
        'app.spots',
        'app.chunks',
        'app.pieces',
        'app.spaces',
        'app.claps',
        'app.denominations',
        'app.elements',
        'app.fails',
        'app.errors',
        'app.reviews'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('States') ? [] : ['className' => 'App\Model\Table\StatesTable'];
        $this->States = TableRegistry::get('States', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->States);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
