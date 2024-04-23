<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LikeFotosFixture
 */
class LikeFotosFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'Foto_id' => 1,
                'User_id' => 1,
                'Tanggal_like' => '2024-04-22',
            ],
        ];
        parent::init();
    }
}
