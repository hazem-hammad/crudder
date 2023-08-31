<?php

namespace App\Modules\BaseModule\Services;

use App\Enums\ResponseMessage;
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
    public function update(): void
    {
        try {
            DB::beginTransaction();
            $this->resource->update($this->data());
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            throw new Exception(ResponseMessage::SOME_THING_WENT_WRONG->getMessage());
        }

    }

    /**
     * @return array
     */
    private function data(): array
    {
        $data = [];

        foreach (supportedLanguages() as $language) {
            $data['name'][$language] = $this->getData('name_' . $language);
        }

        $data['name'] = json_encode($data['name']);
        $data['enable_email'] = $this->getData('enable_email') ?? 0;


        return $data;
    }


}
