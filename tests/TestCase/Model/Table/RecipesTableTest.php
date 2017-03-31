<?php
namespace Recipe\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Recipe\Model\Table\RecipesTable;

/**
 * Recipe\Model\Table\RecipesTable Test Case
 */
class RecipesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Recipe\Model\Table\RecipesTable
     */
    public $Recipes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.recipes',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Recipes') ? [] : ['className' => 'Recipe\Model\Table\RecipesTable'];
        $this->Recipes = TableRegistry::get('Recipes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Recipes);

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
