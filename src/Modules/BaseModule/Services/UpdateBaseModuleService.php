<?php

namespace App\Modules\BaseModule\Services;

use App\Foundation\Enums\ResponseMessage;
use App\Foundation\Models\BaseModel;
use App\Foundation\Services\BaseService;
use App\Modules\BaseModule\Models\BaseModule;
use Exception;
use Illuminate\Support\Facades\DB;

class UpdateBaseModuleService extends BaseService
{

    public function __construct(protected BaseModel $resource = new BaseModule())
    {
    }

    /**
     * @throws Exception
     */
    public function execute(): void
    {
        try {
            DB::beginTransaction();

            $this->resource->update($this->data());

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            throw new Exception(ResponseMessage::SOMETHING_WENT_WRONG->getMessage());
        }

    }

    /**
     * @return array
     */
    private function data(): array
    {
        $data = [];

        $data['name_ar'] = $this->getData('name_ar');
        $data['name_en'] = $this->getData('name_en');
        $data['status'] = $this->getData('status');

        return $data;
    }


}
