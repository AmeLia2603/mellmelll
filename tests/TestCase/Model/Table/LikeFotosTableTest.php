<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LikeFotosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LikeFotosTable Test Case
 */
class LikeFotosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LikeFotosTable
     */
    protected $LikeFotos;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.LikeFotos',
        'app.Fotos',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('LikeFotos') ? [] : ['className' => LikeFotosTable::class];
        $this->LikeFotos = $this->getTableLocator()->get('LikeFotos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->LikeFotos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\LikeFotosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\LikeFotosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
