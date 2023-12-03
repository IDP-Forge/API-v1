<?php

namespace Tests\Unit\Helpers;

use App\Models\Application;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use function App\Helpers\tableOf;

class tableOfTest extends TestCase
{
    #[DataProvider('provideClassesForTableOfTest')]
    public function test_table_of_returns_expected_result_for_table_name(string $class, string | null $expected)
    {
        $result = tableOf($class);

        $this->assertEquals($result, $expected);
    }

    public static function provideClassesForTableOfTest(): array
    {
        return [
            'nonexistent class, expect null' => [
                'ThisClassDoesNotExist',
                null
            ],

            'existing model: Application' => [
                Application::class,
                (new Application)->getTable()
            ]
        ];
    }
}
