<?php


namespace App\DTO;


use App\Contracts\DTO;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class EmployeeDTO implements DTO
{
    public string $first_name;
    public string $last_name;
    public string $email;
    public string $phone;
    public int $school_id;


    public static function fromRequest(Request $request): self
    {
        $dto = new self;
        $dto->first_name = $request->first_name;
        $dto->last_name = $request->last_name;
        $dto->email = $request->email;
        $dto->phone = $request->phone;
        $dto->school_id = $request->school_id;
        return $dto;
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }


    public static function fromArray(array $array): self
    {
        // TODO: Implement fromArray() method.
    }

    public static function fromModel(Model $school): self
    {
        // TODO: Implement fromModel() method.
    }
}
