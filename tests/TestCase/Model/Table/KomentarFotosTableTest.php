<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\KomentarFotosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\KomentarFotosTable Test Case
 */
class KomentarFotosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\KomentarFotosTable
     */
    protected $KomentarFotos;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.KomentarFotos',
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
        $config = $this->getTableLocator()->exists('KomentarFotos') ? [] : ['className' => KomentarFotosTable::class];
        $this->KomentarFotos = $this->getTableLocator()->get('KomentarFotos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->KomentarFotos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\KomentarFotosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\KomentarFotosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
