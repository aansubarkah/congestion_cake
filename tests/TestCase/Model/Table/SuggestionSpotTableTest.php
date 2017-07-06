<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SuggestionSpotTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SuggestionSpotTable Test Case
 */
class SuggestionSpotTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SuggestionSpotTable
     */
    public $SuggestionSpot;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.suggestion_spot',
        'app.places',
        'app.regencies',
        'app.states',
        'app.hierarchies',
        'app.districts',
        'app.regions',
        'app.locations',
        'app.raws',
        'app.respondents',
        'app.markers',
        'app.categories',
        'app.humans',
        'app.ts',
        'app.classifications',
        'app.breeds',
        'app.kinds',
        'app.chunks',
        'app.pieces',
        'app.users',
        'app.groups',
        'app.t_users',
        'app.denominations',
        'app.elements',
        'app.weather',
        'app.machines',
        'app.spots',
        'app.spaces',
        'app.logs',
        'app.reviews',
        'app.errors',
        'app.fails',
        'app.syllables',
        'app.tags',
        'app.words',
        'app.data_twitter',
        'app.at_classifications',
        'app.mt_classifications',
        'app.data_chunk',
        'app.data_piece',
        'app.data_spot',
        'app.label_kind',
        'app.label_word',
        'app.label_chunk',
        'app.label_spot',
        'app.claps',
        'app.data_syllable',
        'app.data_word',
        'app.regencies_regions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SuggestionSpot') ? [] : ['className' => SuggestionSpotTable::class];
        $this->SuggestionSpot = TableRegistry::get('SuggestionSpot', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SuggestionSpot);

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
