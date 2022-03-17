<?php

namespace App\Providers;

use Money\Formatter\DecimalMoneyFormatter;
use Money\MoneyFormatter;
use Money\MoneyParser;
use Money\Parser\DecimalMoneyParser;
use Tests\TestCase;

class MoneyServiceProviderTest extends TestCase
{
    public function testShouldProvideMoneyInstances(): void
    {
        // Set
        $provider = new MoneyServiceProvider($this->app);

        // Actions
        $result = $provider->provides();

        // Assertions
        $this->assertSame(
            [
                MoneyParser::class,
                MoneyFormatter::class,
            ],
            $result
        );
    }

    public function testShouldRegisterMoneyParser(): void
    {
        // Actions
        $moneyParser = $this->app->make(MoneyParser::class);

        // Assertions
        $this->assertInstanceOf(DecimalMoneyParser::class, $moneyParser);
    }

    public function testShouldRegisterMoneyFormatter(): void
    {
        // Actions
        $moneyFormatter = $this->app->make(MoneyFormatter::class);

        // Assertions
        $this->assertInstanceOf(DecimalMoneyFormatter::class, $moneyFormatter);
    }
}
