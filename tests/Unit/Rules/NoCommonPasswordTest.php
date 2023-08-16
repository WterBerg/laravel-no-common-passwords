<?php

declare(strict_types=1);

/**
 * This file is part of the wterberg/laravel-no-common-passwords package.
 *
 * This source file is subject to the license that is
 * bundled with this source code in the LICENSE.md file.
 */

namespace Tests\Unit\Rules;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use PHPUnit\Framework\Assert;
use Tests\TestCase;
use WterBerg\Laravel\NoCommonPasswords\Rules\NoCommonPassword;

/**
 * @internal
 */
final class NoCommonPasswordTest extends TestCase
{
    public static function commonPasswordsDatasets(): array
    {
        return [['123456'], ['qwerty'], ['password']];
    }

    /**
     * @dataProvider commonPasswordsDatasets
     */
    public function testValidationFailsOnCommonPassword(string $password): void
    {
        $validator = Validator::make(
            ['field' => $password],
            ['field' => [new NoCommonPassword()]]
        );

        Assert::assertFalse($validator->passes());
        Assert::assertTrue($validator->messages()->isNotEmpty());
    }

    public function testNotCommonPasswordsAreAllowed(): void
    {
        $validator = Validator::make(
            ['field' => Str::random(32)],
            ['field' => [new NoCommonPassword()]]
        );

        Assert::assertTrue($validator->passes());
        Assert::assertFalse($validator->messages()->isNotEmpty());
    }
}
