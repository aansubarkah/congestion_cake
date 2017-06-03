<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\KindsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\KindsTable Test Case
 */
class KindsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\KindsTable
     */
    public $Kinds;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.kinds',
        'app.raws',
        'app.classifications',
        'app.breeds',
        'app.users',
        'app.denominations',
        'app.humans',
        'app.ts',
        'app.places',
        'app.categories',
        'app.machines',
        'app.markers',
        'app.spots',
        'app.weather',
        'app.chunks',
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
        $config = TableRegistry::exists('Kinds') ? [] : ['className' => 'App\Model\Table\KindsTable'];
        $this->Kinds = TableRegistry::get('Kinds', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Kinds);

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
