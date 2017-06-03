<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HumansTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HumansTable Test Case
 */
class HumansTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HumansTable
     */
    public $Humans;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.humans',
        'app.ts',
        'app.classifications',
        'app.breeds',
        'app.kinds',
        'app.users',
        'app.denominations',
        'app.raws',
        'app.machines',
        'app.places',
        'app.categories',
        'app.markers',
        'app.spots',
        'app.weather'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Humans') ? [] : ['className' => 'App\Model\Table\HumansTable'];
        $this->Humans = TableRegistry::get('Humans', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Humans);

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
