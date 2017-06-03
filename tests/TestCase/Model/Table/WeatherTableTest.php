<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WeatherTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WeatherTable Test Case
 */
class WeatherTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WeatherTable
     */
    public $Weather;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.weather',
        'app.elements',
        'app.raws',
        'app.respondents',
        'app.regions',
        'app.locations',
        'app.users',
        'app.groups',
        'app.t_users',
        'app.breeds',
        'app.kinds',
        'app.classifications',
        'app.denominations',
        'app.humans',
        'app.ts',
        'app.places',
        'app.regencies',
        'app.states',
        'app.hierarchies',
        'app.districts',
        'app.regencies_regions',
        'app.machines',
        'app.categories',
        'app.markers',
        'app.spots',
        'app.chunks',
        'app.pieces',
        'app.spaces',
        'app.logs',
        'app.reviews',
        'app.errors',
        'app.fails',
        'app.syllables',
        'app.words',
        'app.claps'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Weather') ? [] : ['className' => 'App\Model\Table\WeatherTable'];
        $this->Weather = TableRegistry::get('Weather', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Weather);

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
