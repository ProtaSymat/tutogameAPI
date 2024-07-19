<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CategoriesFixture
 */
class CategoriesFixture extends TestFixture
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
                'categorie_id' => 1,
                'categorie_name' => 'Lorem ipsum dolor sit amet',
                'categorie_description' => 'Lorem ipsum dolor sit amet',
                'categorie_img' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
