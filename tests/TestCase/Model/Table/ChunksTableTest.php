<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChunksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChunksTable Test Case
 */
class ChunksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ChunksTable
     */
    public $Chunks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.chunks',
        'app.ts',
        'app.kinds',
        'app.pieces',
        'app.spots'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Chunks') ? [] : ['className' => 'App\Model\Table\ChunksTable'];
        $this->Chunks = TableRegistry::get('Chunks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Chunks);

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
