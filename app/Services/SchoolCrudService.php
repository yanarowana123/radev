<?php


namespace App\Services;


use App\Contracts\AbstractCrud;
use App\Contracts\DTO;
use App\Contracts\Imageable;
use App\Models\School;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SchoolCrudService extends AbstractCrud implements Imageable
{

    public function setModel(School $model = null): self
    {
        $this->model = $model;
        return $this;
    }

    public function store(DTO $dto): School
    {
        $attributes = $dto->setLogo($this->uploadImage($dto->logoContent))->toArray();
        return School::create($attributes);
    }

    public function update(DTO $dto): bool
    {
        if (!isset($this->model)) {
            return false;
        }

        if ($dto->logoContent) {
            $dto->setLogo($this->uploadImage($dto->logoContent));
        }

        $attributes = $dto->toArray();
        return $this->model->update($attributes);
    }

    public function delete(): bool
    {
        if (!isset($this->model)) {
            return false;
        }
        File::delete($this->model->logo);
        return $this->model->delete();
    }

    public function uploadImage(UploadedFile $file): string
    {
        if (isset($this->model)) {
            File::delete($this->model->logo);
        }
        $file->storePublicly('public/schools');
        return 'uploads/schools/' . $file->hashName();
    }

}
