<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * HistoriquesFixture
 */
class HistoriquesFixture extends TestFixture
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
                'historique_id' => 1,
                'user_id' => 1,
                'tutoriel_id' => 1,
                'quiz_id' => 1,
                'date_acces' => '2024-07-22 15:48:06',
            ],
        ];
        parent::init();
    }
}
