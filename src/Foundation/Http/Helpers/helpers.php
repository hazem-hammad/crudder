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
 * Get plural and pascal from given string
 *
 * @param string $string
 * @return string
 */
function plural_pascal(string $string): string
{
    return Str::plural(Str::studly($string));
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

/**
 * Get plural and snake from given string
 *
 * @param string $string
 * @return string
 */
function plural_snake(string $string): string
{
    return Str::plural(Str::snake($string));
}

/**
 * Get singular and camel from given string
 *
 * @param string $string
 * @return string
 */
function singular_camel(string $string): string
{
    return Str::singular(Str::camel($string));
}

/**
 * Get plural and camel from given string
 *
 * @param string $string
 * @return string
 */
function plural_camel(string $string): string
{
    return Str::plural(Str::camel($string));
}


/**
 * @param string $string
 * @return string
 */
function readableName(string $string): string
{
    return Str::replace('_', ' ', strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $string)));

}
