<?php

namespace App\Foundation\Http\Controllers;

use App\Foundation\Enums\Permissions;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;

abstract class BaseController extends Controller
{

    /**
     * @var string
     */
    protected string $viewPath;

    /**
     * @var Model
     */
    protected Model $model;

    protected string|null $domain = null;

    /**
     * name of module which appear on view
     * @var string
     */
    protected string $moduleName;

    /**
     * columns which will be displayed in the table
     * @var array
     */
    protected array $tableColumns = [];

    /**
     * determine the create form will be page or popup
     * @var string
     */
    protected string $createFormType = 'page'; // page - popup

    /**
     * determine the update form will be page or popup
     * @var string
     */
    protected string $updateFormType = 'page'; // page - popup

    /**
     * determine if the delete option is allowed or not
     *
     * @var bool
     */
    protected bool $deletionAllowed = false;

    /**
     * determine if the statistics will be displayed beside the table or not
     *
     * @var bool
     */
    protected bool $displayPageStatistics;

    /**
     * @var string
     */
    protected string $routePath;

    function __construct()
    {
        // build table data
        $this->table();

        view()->share([
            'moduleName' => $this->moduleName,
            'routePath' => $this->routePath,
            'viewPath' => $this->viewPath,
            'tableColumns' => $this->tableColumns,
            'createFormType' => $this->createFormType,
            'deletionAllowed' => $this->deletionAllowed,
            'displayPageStatistics' => $this->displayPageStatistics,
        ]);
    }

    /**
     * Build table data (header & body)
     * @return void
     */
    abstract protected function table(): void;

    /**
     * @param string $view
     * @param array $variable
     * @return Factory|View|Application
     */
    protected function view(string $view, array $variable = []): Factory|View|Application
    {
        return view($view, $variable);
    }

}
