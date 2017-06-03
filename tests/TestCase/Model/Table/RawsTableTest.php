<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RawsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RawsTable Test Case
 */
class RawsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RawsTable
     */
    public $Raws;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.raws',
        'app.respondents',
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
        'app.machines',
        'app.categories',
        'app.markers',
        'app.weather',
        'app.spaces',
        'app.elements',
        'app.fails',
        'app.errors',
        'app.reviews',
        'app.locations',
        'app.regions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Raws') ? [] : ['className' => 'App\Model\Table\RawsTable'];
        $this->Raws = TableRegistry::get('Raws', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Raws);

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
