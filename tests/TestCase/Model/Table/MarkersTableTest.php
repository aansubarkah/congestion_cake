<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MarkersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MarkersTable Test Case
 */
class MarkersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MarkersTable
     */
    public $Markers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.markers',
        'app.categories',
        'app.humans',
        'app.ts',
        'app.classifications',
        'app.breeds',
        'app.kinds',
        'app.raws',
        'app.chunks',
        'app.pieces',
        'app.spots',
        'app.users',
        'app.denominations',
        'app.machines',
        'app.places',
        'app.weather',
        'app.respondents'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Markers') ? [] : ['className' => 'App\Model\Table\MarkersTable'];
        $this->Markers = TableRegistry::get('Markers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Markers);

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
