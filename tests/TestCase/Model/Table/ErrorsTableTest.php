<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ErrorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ErrorsTable Test Case
 */
class ErrorsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ErrorsTable
     */
    public $Errors;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.errors',
        'app.fails',
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
        $config = TableRegistry::exists('Errors') ? [] : ['className' => 'App\Model\Table\ErrorsTable'];
        $this->Errors = TableRegistry::get('Errors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Errors);

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
