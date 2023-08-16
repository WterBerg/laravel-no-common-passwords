<?php

declare(strict_types=1);

/**
 * This file is part of the wterberg/laravel-no-common-passwords package.
 *
 * This source file is subject to the license that is
 * bundled with this source code in the LICENSE.md file.
 */

namespace WterBerg\Laravel\NoCommonPasswords\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Wikimedia\CommonPasswords\CommonPasswords;

/**
 * Class NoCommonPassword.
 *
 * A Laravel validation rule to check if a given value matches one of the most common passwords in
 * use today.
 *
 * @see https://github.com/wikimedia/mediawiki-libs-CommonPasswords
 */
final class NoCommonPassword implements ValidationRule
{
    /**
     * {@inheritdoc}
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (CommonPasswords::isCommon($value)) {
            $fail('Common passwords are not allowed.')->translate();
        }
    }
}
