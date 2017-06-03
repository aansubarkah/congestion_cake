<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReviewsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReviewsTable Test Case
 */
class ReviewsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ReviewsTable
     */
    public $Reviews;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.reviews',
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
        'app.ts',
        'app.classifications',
        'app.breeds',
        'app.kinds',
        'app.chunks',
        'app.pieces',
        'app.spots',
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
        'app.errors'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Reviews') ? [] : ['className' => 'App\Model\Table\ReviewsTable'];
        $this->Reviews = TableRegistry::get('Reviews', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Reviews);

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
