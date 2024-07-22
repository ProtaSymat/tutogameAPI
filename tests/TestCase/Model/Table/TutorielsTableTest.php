<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TutorielsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TutorielsTable Test Case
 */
class TutorielsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TutorielsTable
     */
    protected $Tutoriels;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Tutoriels',
        'app.Chapitres',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Tutoriels') ? [] : ['className' => TutorielsTable::class];
        $this->Tutoriels = $this->getTableLocator()->get('Tutoriels', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Tutoriels);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TutorielsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\TutorielsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
