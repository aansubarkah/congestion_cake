<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SpacesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SpacesTable Test Case
 */
class SpacesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SpacesTable
     */
    public $Spaces;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.spaces',
        'app.spots',
        'app.users',
        'app.places',
        'app.regencies',
        'app.states',
        'app.hierarchies',
        'app.districts',
        'app.regions',
        'app.locations',
        'app.raws',
        'app.respondents',
        'app.t_users',
        'app.markers',
        'app.categories',
        'app.humans',
        'app.ts',
        'app.classifications',
        'app.breeds',
        'app.kinds',
        'app.chunks',
        'app.pieces',
        'app.denominations',
        'app.machines',
        'app.weather',
        'app.claps',
        'app.elements',
        'app.fails',
        'app.errors',
        'app.reviews',
        'app.regencies_regions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Spaces') ? [] : ['className' => 'App\Model\Table\SpacesTable'];
        $this->Spaces = TableRegistry::get('Spaces', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Spaces);

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
