<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SpotsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SpotsTable Test Case
 */
class SpotsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SpotsTable
     */
    public $Spots;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.spots',
        'app.chunks',
        'app.ts',
        'app.kinds',
        'app.raws',
        'app.respondents',
        'app.regions',
        'app.locations',
        'app.users',
        'app.regencies',
        'app.states',
        'app.hierarchies',
        'app.districts',
        'app.places',
        'app.humans',
        'app.classifications',
        'app.breeds',
        'app.denominations',
        'app.machines',
        'app.categories',
        'app.markers',
        'app.weather',
        'app.spaces',
        'app.regencies_regions',
        'app.t_users',
        'app.claps',
        'app.elements',
        'app.fails',
        'app.errors',
        'app.reviews',
        'app.pieces'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Spots') ? [] : ['className' => 'App\Model\Table\SpotsTable'];
        $this->Spots = TableRegistry::get('Spots', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Spots);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
