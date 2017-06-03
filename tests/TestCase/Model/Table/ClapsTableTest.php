<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClapsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClapsTable Test Case
 */
class ClapsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ClapsTable
     */
    public $Claps;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.claps',
        'app.raws'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Claps') ? [] : ['className' => 'App\Model\Table\ClapsTable'];
        $this->Claps = TableRegistry::get('Claps', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Claps);

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
