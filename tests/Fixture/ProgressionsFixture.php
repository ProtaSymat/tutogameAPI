<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProgressionsFixture
 */
class ProgressionsFixture extends TestFixture
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
                'progression_id' => 1,
                'user_id' => 1,
                'chapitre_id' => 1,
                'last_tutoriel_id' => 1,
                'chapitre_termine' => 1,
                'date_derniere_progression' => '2024-07-22 15:37:32',
            ],
        ];
        parent::init();
    }
}
