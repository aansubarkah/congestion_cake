<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DenominationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DenominationsTable Test Case
 */
class DenominationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DenominationsTable
     */
    public $Denominations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.denominations',
        'app.raws',
        'app.classifications',
        'app.breeds',
        'app.kinds',
        'app.users',
        'app.humans',
        'app.machines'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Denominations') ? [] : ['className' => 'App\Model\Table\DenominationsTable'];
        $this->Denominations = TableRegistry::get('Denominations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Denominations);

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
