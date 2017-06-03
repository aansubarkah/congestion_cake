<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RegenciesRegionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RegenciesRegionsTable Test Case
 */
class RegenciesRegionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RegenciesRegionsTable
     */
    public $RegenciesRegions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.regencies_regions',
        'app.regencies',
        'app.states',
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
        'app.claps',
        'app.denominations',
        'app.users',
        'app.elements',
        'app.weather',
        'app.fails',
        'app.errors',
        'app.reviews',
        'app.locations',
        'app.regions',
        'app.markers',
        'app.categories',
        'app.machines',
        'app.spots',
        'app.chunks',
        'app.pieces',
        'app.spaces'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RegenciesRegions') ? [] : ['className' => 'App\Model\Table\RegenciesRegionsTable'];
        $this->RegenciesRegions = TableRegistry::get('RegenciesRegions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RegenciesRegions);

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
