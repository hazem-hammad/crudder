<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class DashboardModuleBuilder extends Command
{
    private $modulesPath;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:generate {name : Class (singular) for example User}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();

        $this->modulesPath = base_path() . '/src/Modules';
    }

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $name = $this->argument('name');

        $this->createModuleFolders($name);
//        $this->createRoutes($name);
//        $this->createControllers($name);
//        $this->createModels($name);

//        $this->controller($name);
//        $this->model($name);
//        $this->request($name);

//        File::append(base_path('routes/api.php'), 'Route::resource(\'' . str_plural(strtolower($name)) . "', '{$name}Controller');");
    }

    /**
     * @param $type
     * @return bool|string
     */
    protected function getStub($type): bool|string
    {
        return file_get_contents(resource_path("stubs/$type.stub"));
    }

    /**
     * @param $name
     * @return bool|string
     */
    protected function createModuleFolders($name): bool|string
    {
        $module = File::exists($this->modulesPath . '/' . $name);

        // check id the module already exist, DON'T overwrite it
        if (!$module) {
            File::copyDirectory($this->modulesPath . '/BaseModule', $this->modulesPath . '/' . $name);
        }

        /*****************************
         * Rename module Files
         *****************************/

        // Rename & replace content in filters files
        if (File::isFile($this->modulesPath . '/' . singular_pascal($name) . '/Filters/BaseModuleFilters.php')) {
            rename(
                $this->modulesPath . '/' . singular_pascal($name) . '/Filters/BaseModuleFilters.php',
                $this->modulesPath . '/User/Filters/' . singular_pascal($name) . 'Filters.php'
            );
        }

        File::replaceInFile(
            'BaseModule',
            singular_pascal($name),
            $this->modulesPath . '/User/Filters/' . singular_pascal($name) . 'Filters.php'
        );

        // Rename & replace content in controllers files
        if (File::isFile($this->modulesPath . '/' . singular_pascal($name) . '/Http/Controllers/BaseModuleController.php')) {
            rename(
                $this->modulesPath . '/' . singular_pascal($name) . '/Http/Controllers/BaseModuleController.php',
                $this->modulesPath . '/User/Http/Controllers/' . singular_pascal($name) . 'Controller.php'
            );
        }

        File::replaceInFile(
            'BaseModule',
            singular_pascal($name),
            $this->modulesPath . '/User/Http/Controllers/' . singular_pascal($name) . 'Controller.php'
        );

        File::replaceInFile(
            'base-modules',
            plural_kebab($name),
            $this->modulesPath . '/User/Http/Controllers/' . singular_pascal($name) . 'Controller.php'
        );

        // Rename & replace content in requests files
        if (File::isFile($this->modulesPath . '/' . singular_pascal($name) . '/Http/Requests/CreateBaseModuleRequest.php')) {
            rename(
                $this->modulesPath . '/' . singular_pascal($name) . '/Http/Requests/CreateBaseModuleRequest.php',
                $this->modulesPath . '/User/Http/Requests/Create' . singular_pascal($name) . 'Request.php'
            );

            rename(
                $this->modulesPath . '/' . singular_pascal($name) . '/Http/Requests/UpdateBaseModuleRequest.php',
                $this->modulesPath . '/User/Http/Requests/Update' . singular_pascal($name) . 'Request.php'
            );
        }

        File::replaceInFile(
            'BaseModule',
            singular_pascal($name),
            $this->modulesPath . '/User/Http/Requests/Create' . singular_pascal($name) . 'Request.php'
        );

        File::replaceInFile(
            'BaseModule',
            singular_pascal($name),
            $this->modulesPath . '/User/Http/Requests/Update' . singular_pascal($name) . 'Request.php'
        );

        return true;
    }

    /**
     * @param $name
     * @return bool|string
     */
    protected function createControllers($name): bool|string
    {
        // create routes folder
        if (!File::isFile(app_path('Modules/' . $name . '/Http/Controllers/' . $name . 'Controller.php'))) {
            File::put(app_path('Modules/' . $name . '/Http/Controllers/' . $name . 'Controller.php'), "");

            $controllerTemplate = str_replace(
                [
                    '{{modelName}}',
                    '{{modelNamePluralLowerCase}}',
                    '{{modelNameSingularLowerCase}}'
                ],
                [
                    $name,
                    strtolower(Str::plural($name)),
                    strtolower($name)
                ],
                $this->getStub('Controller')
            );

            file_put_contents(app_path('Modules/' . $name . '/Http/Controllers/' . $name . 'Controller.php'), $controllerTemplate);
        }

        return true;
    }

    /**
     * @param $name
     * @return bool|string
     */
    protected function createRoutes($name): bool|string
    {
        // create routes folder
        if (!File::isFile(app_path('Modules/' . $name . '/Routes/web.php'))) {
            File::put(app_path('Modules/' . $name . "/Routes/web.php"), "");

            $routeTemplate = str_replace(
                [
                    '{{modelName}}',
                    '{{modelNamePluralLowerCase}}',
                ],
                [
                    $name,
                    strtolower(Str::plural($name)),
                ],
                $this->getStub('Route')
            );

            file_put_contents(app_path('Modules/' . $name . "/Routes/web.php"), $routeTemplate);
        }

        return true;
    }

    /**
     * @param $name
     * @return void
     */
    protected function createModels($name): void
    {
        $modelTemplate = str_replace(
            ['{{modelName}}'],
            [$name],
            $this->getStub('Model')
        );

        file_put_contents(app_path('Modules/' . $name . "/Models/{$name}.php"), $modelTemplate);
    }

    /**
     * @param $name
     * @return void
     */
    protected function controller($name): void
    {
        $controllerTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}'
            ],
            [
                $name,
                strtolower(Str::plural($name)),
                strtolower($name)
            ],
            $this->getStub('Controller')
        );

        file_put_contents(app_path("/Http/Controllers/{$name}Controller.php"), $controllerTemplate);
    }

    /**
     * @param $name
     * @return void
     */
    protected function request($name): void
    {
        $requestTemplate = str_replace(
            ['{{modelName}}'],
            [$name],
            $this->getStub('Request')
        );

        if (!file_exists($path = app_path('/Http/Requests')))
            mkdir($path, 0777, true);

        file_put_contents(app_path("/Http/Requests/{$name}Request.php"), $requestTemplate);
    }
}
