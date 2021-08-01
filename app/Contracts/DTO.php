<?php


namespace App\Contracts;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface DTO
{
    public static function fromRequest(Request $request): self;

    public static function fromArray(array $array): self;

    public static function fromModel(Model $school): self;

    public function toArray(): array;

}
