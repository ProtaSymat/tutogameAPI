<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HistoriquesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HistoriquesTable Test Case
 */
class HistoriquesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HistoriquesTable
     */
    protected $Historiques;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Historiques',
        'app.Users',
        'app.Tutoriels',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Historiques') ? [] : ['className' => HistoriquesTable::class];
        $this->Historiques = $this->getTableLocator()->get('Historiques', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Historiques);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\HistoriquesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\HistoriquesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
