<?php

namespace App\Modules\BaseModule\Services;

use App\Foundation\Enums\ResponseMessage;
use App\Foundation\Models\BaseModel;
use App\Foundation\Services\BaseService;
use App\Modules\BaseModule\Models\BaseModule;
use Exception;
use Illuminate\Support\Facades\DB;

class StoreBaseModuleService extends BaseService
{

    public function __construct(private readonly BaseModel $model = new BaseModule())
    {
    }

    /**
     * @return void
     * @throws Exception
     */
    public function execute(): void
    {
        try {

            DB::beginTransaction();

            $this->model->create($this->data());

            DB::commit();

        } catch (Exception $exception) {
            DB::rollBack();
            throw new Exception(ResponseMessage::SOMETHING_WENT_WRONG->getMessage());
        }

    }

    /**
     * @return array
     */
    public function data(): array
    {
        $data = [];

        $data['name_ar'] = $this->getData('name_ar');
        $data['name_en'] = $this->getData('name_en');

        return $data;
    }

}
