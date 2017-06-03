<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersTable Test Case
 */
class UsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersTable
     */
    public $Users;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users',
        'app.groups',
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
        'app.spots',
        'app.places',
        'app.regencies',
        'app.states',
        'app.hierarchies',
        'app.districts',
        'app.regencies_regions',
        'app.machines',
        'app.weather',
        'app.spaces',
        'app.denominations',
        'app.claps',
        'app.elements',
        'app.fails',
        'app.errors',
        'app.reviews',
        'app.logs',
        'app.syllables',
        'app.words'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Users') ? [] : ['className' => 'App\Model\Table\UsersTable'];
        $this->Users = TableRegistry::get('Users', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Users);

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
