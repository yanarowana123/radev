<?php


namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractCrud
{
    public Model $model;

    abstract public function setModel(): self;

    abstract public function store(DTO $dto): Model;

    abstract public function update(DTO $dto): bool;

    abstract public function delete(): bool;
}
