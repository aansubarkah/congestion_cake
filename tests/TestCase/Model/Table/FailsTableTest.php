<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FailsTable Test Case
 */
class FailsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FailsTable
     */
    public $Fails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.fails',
        'app.raws',
        'app.errors',
        'app.reviews'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Fails') ? [] : ['className' => 'App\Model\Table\FailsTable'];
        $this->Fails = TableRegistry::get('Fails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Fails);

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
