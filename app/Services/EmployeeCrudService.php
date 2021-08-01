<?php


namespace App\Services;


use App\Contracts\AbstractCrud;
use App\Contracts\DTO;
use App\Models\Employee;

class EmployeeCrudService extends AbstractCrud
{

    public function setModel(Employee $model = null): self
    {
        $this->model = $model;
        return $this;
    }

    public function store(DTO $dto): Employee
    {
        return Employee::create($dto->toArray());
    }

    public function update(DTO $dto): bool
    {
        if (!isset($this->model)) {
            return false;
        }

        return $this->model->update($dto->toArray());
    }

    public function delete(): bool
    {
        if (!isset($this->model)) {
            return false;
        }

        return $this->model->delete();
    }

}
