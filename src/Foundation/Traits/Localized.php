<?php

namespace App\Foundation\Traits;

trait Localized
{
    /**
     * @param $data
     * @param $column
     * @return string
     */
    public function getLocalizedColumn($data, $column): string|null
    {
        $name = $column . '_' . request()->header('Accept-Language');
        if (!$data || !$data->$name) {
            return null;
        }
        return (string)$data->$name;
    }

    public static function getStaticLocalizedColumn($data, $column): string|null
    {
        $name = $column . '_' . app()->getLocale();
        if (!$data || !$data->$name) {
            return null;
        }
        return (string)$data->$name;
    }
}
