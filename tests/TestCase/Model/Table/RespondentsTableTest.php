<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RespondentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RespondentsTable Test Case
 */
class RespondentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RespondentsTable
     */
    public $Respondents;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.respondents',
        'app.regions',
        'app.locations',
        'app.raws',
        'app.ts',
        'app.claps',
        'app.denominations',
        'app.classifications',
        'app.breeds',
        'app.kinds',
        'app.chunks',
        'app.pieces',
        'app.users',
        'app.spots',
        'app.humans',
        'app.places',
        'app.regencies',
        'app.states',
        'app.hierarchies',
        'app.districts',
        'app.regencies_regions',
        'app.machines',
        'app.categories',
        'app.markers',
        'app.weather',
        'app.spaces',
        'app.elements',
        'app.fails',
        'app.errors',
        'app.reviews',
        'app.t_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Respondents') ? [] : ['className' => 'App\Model\Table\RespondentsTable'];
        $this->Respondents = TableRegistry::get('Respondents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Respondents);

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
