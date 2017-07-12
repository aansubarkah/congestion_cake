<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TrainKindTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TrainKindTable Test Case
 */
class TrainKindTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TrainKindTable
     */
    public $TrainKind;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.train_kind',
        'app.raws',
        'app.respondents',
        'app.regions',
        'app.locations',
        'app.users',
        'app.groups',
        'app.t_users',
        'app.breeds',
        'app.kinds',
        'app.classifications',
        'app.denominations',
        'app.humans',
        'app.ts',
        'app.places',
        'app.regencies',
        'app.states',
        'app.hierarchies',
        'app.districts',
        'app.regencies_regions',
        'app.machines',
        'app.categories',
        'app.markers',
        'app.weather',
        'app.elements',
        'app.spots',
        'app.chunks',
        'app.pieces',
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
        'app.data_word'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TrainKind') ? [] : ['className' => TrainKindTable::class];
        $this->TrainKind = TableRegistry::get('TrainKind', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TrainKind);

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
