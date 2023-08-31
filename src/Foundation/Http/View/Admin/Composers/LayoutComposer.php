<?php

namespace App\Foundation\Http\View\Admin\Composers;
use Auth;
use Illuminate\View\View;
use Constants;

class LayoutComposer
{

    /**
     * Create a new profile composer.
     *
     */
    public function __construct()
    {
        // Dependencies automatically resolved by service container...
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $language = config('app.locale');
        $layout = $this->getLayout($language);
        $base_url = Constants::ADMIN_BASE_URL;

        $view->with('layout', $layout);
        $view->with('app_language', $language);
        $view->with('admin_base_url', $base_url);
    }

    private function getLayout($language)
    {
        $layout = Constants::ADMIN_DEFAULT_VIEW_PATH;
        if ($language == 'ar')
            $layout = Constants::ADMIN_RTL_LAYOUT;
        return $layout;
    }

}
