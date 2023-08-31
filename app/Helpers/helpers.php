<?php

use App\Foundation\Services\General\Auth\GetAuthAdminService;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

/**
 * get supported languages
 * @return array
 */
function supportedLanguages(): array
{
    return ['en', 'ar'];
}

/**
 * @param Model|null $model
 * @param string $column
 * @param string $locale
 * @return string|null
 */
function getLocalizedKey(?Model $model, string $column, string $locale = 'en'): string|null
{
    $column = json_decode($model?->$column);

    return optional($column)->$locale;
}

/**
 * @param string $name
 * @param string|null $class
 * @return string
 */
function tableDataCell(string $name, string|null $class = null): string
{
    return "<td class='$class'> $name </td>\n";
}

/**
 * check active tab
 * @param $route
 * @return string | null
 */
function activeTab($route): string|null
{
    return Route::currentRouteName() == $route ? 'active' : null;
}

/**
 * web response
 * @param array $data
 * @param array $headers
 * @return JsonResponse
 */
function webResponse(array $data, array $headers = []): JsonResponse
{
    return response()->json($data, $data['status'], $headers);
}

/**
 * @return string
 */
function mediaBaseURL(): string
{
    if (config('filesystems.default') == 's3') {
        $baseUrl = config('filesystems.disks.s3.url');
    } else {
        $baseUrl = config('filesystems.disks.media.url');
    }

    return $baseUrl;
}

/**
 * @param string $path
 * @return string
 */
function mediaFullURL(string $path): string
{
    if (config('filesystems.default') == 's3') {
        $baseUrl = config('filesystems.disks.s3.url');
    } else {
        $baseUrl = config('filesystems.disks.media.url');
    }

    return $baseUrl . '/' . $path;
}

/**
 * @return Authenticatable
 */
function getAuthAdmin(): Authenticatable
{
    return (new GetAuthAdminService())->get();
}
