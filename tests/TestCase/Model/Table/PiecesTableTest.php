<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PiecesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PiecesTable Test Case
 */
class PiecesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PiecesTable
     */
    public $Pieces;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pieces',
        'app.chunks',
        'app.ts',
        'app.kinds',
        'app.raws',
        'app.classifications',
        'app.breeds',
        'app.users',
        'app.denominations',
        'app.humans',
        'app.places',
        'app.categories',
        'app.machines',
        'app.weather',
        'app.spots',
        'app.markers',
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
        $config = TableRegistry::exists('Pieces') ? [] : ['className' => 'App\Model\Table\PiecesTable'];
        $this->Pieces = TableRegistry::get('Pieces', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Pieces);

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
