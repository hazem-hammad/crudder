<?php

namespace App\Services\Admin;

use App\Foundation\Enums\ResponseMessage;
use App\Foundation\Exceptions\MediaUploadException;
use App\Foundation\Models\BaseModel;
use App\Models\Admin\Admin;
use Exception;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class StoreAdminMediaService
{
    /**
     * @var UploadedFile
     */
    private UploadedFile $file;

    /**
     * @var BaseModel
     */
    private BaseModel $model;

    /**
     * @var string
     */
    private string $collection_name;

    /**
     * @return void
     * @throws Exception
     */
    public function store(): void
    {
        try {
            $readable_name = $this->file->getClientOriginalName();
            // delete old media
            $this->model->media()->where('collection_name', $this->collection_name)->delete();

            // store file to disk
            Storage::disk('s3')->put(config('app.upload_folder') . "/admins/{$this->collection_name}", $this->file);

            //get hashed name to store it in DB
            $name = $this->file->hashName();

            $this->model->media()->create([
                'readable_file' => $readable_name,
                'file' => $name,
                'size' => $this->file->getSize(),
                'collection_name' => $this->collection_name,
            ]);

        } catch (Exception $exception) {
            throw new MediaUploadException(ResponseMessage::UNABLE_TO_UPLOAD_FILE->getMessage());
        }
    }


    /**
     * @param UploadedFile $file
     * @return self
     */
    public function setFile(UploadedFile $file): self
    {
        $this->file = $file;
        return $this;
    }

    /**
     * @param Admin $admin
     * @return self
     */
    public function setModel(BaseModel $admin): self
    {
        $this->model = $admin;
        return $this;
    }

    /**
     * @param string $collection_name
     * @return self
     */
    public function setCollection(string $collection_name): self
    {
        $this->collection_name = $collection_name;
        return $this;
    }

}
