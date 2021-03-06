<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SyllablesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SyllablesTable Test Case
 */
class SyllablesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SyllablesTable
     */
    public $Syllables;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.syllables',
        'app.users',
        'app.groups',
        'app.regions',
        'app.locations',
        'app.raws',
        'app.respondents',
        'app.markers',
        'app.categories',
        'app.humans',
        'app.ts',
        'app.classifications',
        'app.breeds',
        'app.kinds',
        'app.chunks',
        'app.pieces',
        'app.spots',
        'app.places',
        'app.regencies',
        'app.states',
        'app.hierarchies',
        'app.districts',
        'app.regencies_regions',
        'app.machines',
        'app.weather',
        'app.elements',
        'app.spaces',
        'app.denominations',
        'app.claps',
        'app.fails',
        'app.errors',
        'app.reviews',
        'app.t_users',
        'app.logs',
        'app.words',
        'app.tags'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Syllables') ? [] : ['className' => 'App\Model\Table\SyllablesTable'];
        $this->Syllables = TableRegistry::get('Syllables', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Syllables);

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
