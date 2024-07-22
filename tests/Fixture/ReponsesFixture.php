<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ReponsesFixture
 */
class ReponsesFixture extends TestFixture
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
                'reponse_id' => 1,
                'question_id' => 1,
                'user_id' => 1,
                'reponse_choisie' => 'Lorem ipsum dolor sit amet',
                'date_reponse' => '2024-07-22 13:00:24',
                'etat' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
