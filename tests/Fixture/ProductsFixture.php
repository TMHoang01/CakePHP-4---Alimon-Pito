<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductsFixture
 */
class ProductsFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor ',
                'category_id' => 1,
                'created' => '2022-08-18 03:13:29',
                'modified' => '2022-08-18 03:13:29',
            ],
        ];
        parent::init();
    }
}
