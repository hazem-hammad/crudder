<?php

use Illuminate\Support\Str;

/**
 * Get singular and lower from given string
 *
 * @param string $string
 * @return string
 */
function singular_lower(string $string): string
{
    return Str::singular(Str::lower($string));
}

/**
 * Get plural and lower from given string
 *
 * @param string $string
 * @return string
 */
function plural_lower(string $string): string
{
    return Str::plural(Str::lower($string));
}

/**
 * Get singular and pascal from given string
 *
 * @param string $string
 * @return string
 */
function singular_pascal(string $string): string
{
    return Str::singular(Str::studly($string));
}

/**
 * Get plural and kebab from given string
 *
 * @param string $string
 * @return string
 */
function plural_kebab(string $string): string
{
    return Str::plural(Str::kebab($string));
}
