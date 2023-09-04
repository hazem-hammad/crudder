<?php

namespace App\Services\Setting;

use App\Foundation\Models\BaseModel;
use App\Foundation\Services\BaseService;
use App\Models\Setting\Setting;

class UpdateSettingService extends BaseService
{
    /**
     * UpdateSettingService construct
     * @param BaseModel $resource
     */
    public function __construct(protected BaseModel $resource = new Setting())
    {
    }

    /**
     * @return void
     */
    public function execute(): void
    {
        $setting = $this->resource->first();

        if ($setting) {
            $setting->update($this->data());
        } else {
            $this->resource->create($this->data());
        }
    }

    /**
     * @return array
     */
    private function data(): array
    {
        $data = [];
        $data['reply_ticket'] = $this->getData('reply_ticket') !== null ? $this->getData('reply_ticket') : false;
        $data['close_ticket_after_first_reply'] = $this->getData('close_ticket_after_first_reply') !== null ? $this->getData('close_ticket_after_first_reply') : false;
        return $data;
    }
}
