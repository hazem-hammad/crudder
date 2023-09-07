<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use function Laravel\Prompts\text;

class DashboardModuleBuilder extends Command
{
    private string $modulesPath;

    private string $coresPath;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:generate';

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
        $this->coresPath = base_path() . '/src/Foundation';
    }

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $name = text(
            label: 'Enter your module name.',
            placeholder: 'Should be in pascal case (User, TestModule)',
        );

        $this->createModuleFolders($name);
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
        $this->adjustFilters($name);

        // Rename & replace content in controllers files
        $this->adjustControllers($name);

        // Rename & replace content in requests files
        $this->adjustRequests($name);

        // Rename & replace content in models files
        $this->adjustModels($name);

        // Rename & replace content in providers files
        $this->adjustProviders($name);

        // Rename & replace content in routes files
        $this->adjustRoutes($name);

        // Rename & replace content in services files
        $this->adjustServices($name);

        // Rename & replace content in migrations files
        $this->adjustMigrations($name);

        // append new module service provider
        $this->registerServiceProvider($name);

        // append new module route in sidebar
        $this->registerInSidebar($name);

        return true;
    }

    /**
     * @param string $name
     * @return void
     */
    private function adjustFilters(string $name): void
    {
        $this->rename(
            $this->modulesPath . '/' . singular_pascal($name) . '/Filters/BaseModuleFilters.php',
            $this->modulesPath . '/' . singular_pascal($name) . '/Filters/' . singular_pascal($name) . 'Filters.php'
        );

        File::replaceInFile(
            'BaseModule',
            singular_pascal($name),
            $this->modulesPath . '/' . singular_pascal($name) . '/Filters/' . singular_pascal($name) . 'Filters.php'
        );
    }

    /**
     * @param string $name
     * @return void
     */
    private function adjustControllers(string $name): void
    {
        $this->rename(
            $this->modulesPath . '/' . singular_pascal($name) . '/Http/Controllers/BaseModuleController.php',
            $this->modulesPath . '/' . singular_pascal($name) . '/Http/Controllers/' . singular_pascal($name) . 'Controller.php'
        );

        File::replaceInFile(
            'BaseModule',
            singular_pascal($name),
            $this->modulesPath . '/' . singular_pascal($name) . '/Http/Controllers/' . singular_pascal($name) . 'Controller.php'
        );

        File::replaceInFile(
            'base-modules',
            plural_kebab($name),
            $this->modulesPath . '/' . singular_pascal($name) . '/Http/Controllers/' . singular_pascal($name) . 'Controller.php'
        );

        File::replaceInFile(
            'baseModule',
            singular_camel($name),
            $this->modulesPath . '/' . singular_pascal($name) . '/Http/Controllers/' . singular_pascal($name) . 'Controller.php'
        );
    }

    /**
     * @param string $name
     * @return void
     */
    private function adjustRequests(string $name): void
    {
        $this->rename(
            $this->modulesPath . '/' . singular_pascal($name) . '/Http/Requests/CreateBaseModuleRequest.php',
            $this->modulesPath . '/' . singular_pascal($name) . '/Http/Requests/Create' . singular_pascal($name) . 'Request.php'
        );

        $this->rename(
            $this->modulesPath . '/' . singular_pascal($name) . '/Http/Requests/UpdateBaseModuleRequest.php',
            $this->modulesPath . '/' . singular_pascal($name) . '/Http/Requests/Update' . singular_pascal($name) . 'Request.php'
        );

        File::replaceInFile(
            'BaseModule',
            singular_pascal($name),
            $this->modulesPath . '/' . singular_pascal($name) . '/Http/Requests/Create' . singular_pascal($name) . 'Request.php'
        );

        File::replaceInFile(
            'BaseModule',
            singular_pascal($name),
            $this->modulesPath . '/' . singular_pascal($name) . '/Http/Requests/Update' . singular_pascal($name) . 'Request.php'
        );
    }

    /**
     * @param string $name
     * @return void
     */
    private function adjustModels(string $name): void
    {
        $this->rename(
            $this->modulesPath . '/' . singular_pascal($name) . '/Models/BaseModule.php',
            $this->modulesPath . '/' . singular_pascal($name) . '/Models/' . singular_pascal($name) . '.php'
        );

        File::replaceInFile(
            'BaseModule',
            singular_pascal($name),
            $this->modulesPath . '/' . singular_pascal($name) . '/Models/' . singular_pascal($name) . '.php'
        );

        File::replaceInFile(
            'base_modules',
            plural_snake($name),
            $this->modulesPath . '/' . singular_pascal($name) . '/Models/' . singular_pascal($name) . '.php'
        );
    }

    /**
     * @param string $name
     * @return void
     */
    private function adjustProviders(string $name): void
    {
        $this->rename(
            $this->modulesPath . '/' . singular_pascal($name) . '/Providers/BaseModuleServiceProvider.php',
            $this->modulesPath . '/' . singular_pascal($name) . '/Providers/' . singular_pascal($name) . 'ServiceProvider.php'
        );

        File::replaceInFile(
            'BaseModule',
            singular_pascal($name),
            $this->modulesPath . '/' . singular_pascal($name) . '/Providers/' . singular_pascal($name) . 'ServiceProvider.php'
        );

        File::replaceInFile(
            'BaseModule',
            singular_pascal($name),
            $this->modulesPath . '/' . singular_pascal($name) . '/Providers/RouteServiceProvider.php'
        );
    }

    /**
     * @param string $name
     * @return void
     */
    private function adjustRoutes(string $name): void
    {
        File::replaceInFile(
            'BaseModule',
            singular_pascal($name),
            $this->modulesPath . '/' . singular_pascal($name) . '/Routes/web.php'
        );

        File::replaceInFile(
            'base-modules',
            plural_kebab($name),
            $this->modulesPath . '/' . singular_pascal($name) . '/Routes/web.php'
        );

        File::replaceInFile(
            'baseModule',
            singular_camel($name),
            $this->modulesPath . '/' . singular_pascal($name) . '/Routes/web.php'
        );
    }

    /**
     * @param string $name
     * @return void
     */
    private function adjustServices(string $name): void
    {
        $this->rename(
            $this->modulesPath . '/' . singular_pascal($name) . '/Services/BaseModulesDatatableService.php',
            $this->modulesPath . '/' . singular_pascal($name) . '/Services/' . singular_pascal($name) . 'sDatatableService.php'
        );

        File::replaceInFile(
            'BaseModule',
            singular_pascal($name),
            $this->modulesPath . '/' . singular_pascal($name) . '/Services/' . singular_pascal($name) . 'sDatatableService.php'
        );

        $this->rename(
            $this->modulesPath . '/' . singular_pascal($name) . '/Services/ChangeBaseModuleStatusService.php',
            $this->modulesPath . '/' . singular_pascal($name) . '/Services/Change' . singular_pascal($name) . 'StatusService.php'
        );

        File::replaceInFile(
            'BaseModule',
            singular_pascal($name),
            $this->modulesPath . '/' . singular_pascal($name) . '/Services/Change' . singular_pascal($name) . 'StatusService.php'
        );

        $this->rename(
            $this->modulesPath . '/' . singular_pascal($name) . '/Services/DeleteBaseModuleService.php',
            $this->modulesPath . '/' . singular_pascal($name) . '/Services/Delete' . singular_pascal($name) . 'Service.php'
        );

        File::replaceInFile(
            'BaseModule',
            singular_pascal($name),
            $this->modulesPath . '/' . singular_pascal($name) . '/Services/Delete' . singular_pascal($name) . 'Service.php'
        );

        $this->rename(
            $this->modulesPath . '/' . singular_pascal($name) . '/Services/GetBaseModulesService.php',
            $this->modulesPath . '/' . singular_pascal($name) . '/Services/Get' . singular_pascal($name) . 'sService.php'
        );

        File::replaceInFile(
            'BaseModule',
            singular_pascal($name),
            $this->modulesPath . '/' . singular_pascal($name) . '/Services/Get' . singular_pascal($name) . 'sService.php'
        );

        $this->rename(
            $this->modulesPath . '/' . singular_pascal($name) . '/Services/StoreBaseModuleService.php',
            $this->modulesPath . '/' . singular_pascal($name) . '/Services/Store' . singular_pascal($name) . 'Service.php'
        );

        File::replaceInFile(
            'BaseModule',
            singular_pascal($name),
            $this->modulesPath . '/' . singular_pascal($name) . '/Services/Store' . singular_pascal($name) . 'Service.php'
        );

        $this->rename(
            $this->modulesPath . '/' . singular_pascal($name) . '/Services/UpdateBaseModuleService.php',
            $this->modulesPath . '/' . singular_pascal($name) . '/Services/Update' . singular_pascal($name) . 'Service.php'
        );

        File::replaceInFile(
            'BaseModule',
            singular_pascal($name),
            $this->modulesPath . '/' . singular_pascal($name) . '/Services/Update' . singular_pascal($name) . 'Service.php'
        );
    }

    /**
     * @param string $name
     * @return void
     */
    private function adjustMigrations(string $name): void
    {
        $fileName = date('Y_m_d') . '_' . Carbon::now()->timestamp . '_create_' . plural_snake($name) . '_table.php';

        $this->rename(
            $this->modulesPath . '/' . singular_pascal($name) . '/Database/migrations/2023_08_30_213205_create_base_modules_table.php',
            $this->modulesPath . '/' . singular_pascal($name) . '/Database/migrations/' . $fileName
        );

        File::replaceInFile(
            'base_modules',
            plural_snake($name),
            $this->modulesPath . '/' . singular_pascal($name) . '/Database/migrations/' . $fileName
        );
    }

    /**
     * @param string $name
     * @return void
     */
    private function registerServiceProvider(string $name): void
    {
        $content = "App\Modules\\" . singular_pascal($name) . "\\Providers\\" . singular_pascal($name) . "ServiceProvider";

        File::replaceInFile(
            '// Append service providers here //',
            '$this->app->register(\'' . $content . '\');' . "\r\n \r\n" . '        // Append service providers here //',
            $this->coresPath . '/ServiceProvider.php'
        );
    }

    /**
     * @param string $name
     * @return void
     */
    private function registerInSidebar(string $name): void
    {
        $content = '
                <div class="menu-item">
                    <a class="menu-link {{ activeTab(\'admin.'.plural_lower($name).'.index\') }} {{ activeTab(\'admin.'.plural_lower($name).'.create\') }} {{ activeTab(\'admin.'.plural_lower($name).'.show\') }} {{ activeTab(\'admin.'.$name.'.edit\') }}"
                       href="{{ route(\'admin.'.plural_lower($name).'.index\') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none">
                                    <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd"
                                          d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z"
                                          fill="white"/>
                                    <path
                                        d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z"
                                        fill="white"/>
                                    <path
                                        d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z"
                                        fill="white"/>
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title"> '.Str::plural($name).' </span>
                    </a>
                </div>
        ' . "\r\n" . '                {{-- Append service providers here --}}';

        File::replaceInFile(
            '{{-- Append service providers here --}}',
            $content,
            $this->coresPath . '/Resources/views/components/layouts/sidebar.blade.php'
        );
    }


    /**
     * @param string $old
     * @param string $new
     * @return void
     */
    private function rename(string $old, string $new): void
    {
        if (File::isFile($old)) {
            rename($old, $new);
        }
    }
}
