<?php

namespace App\Http\Controllers;

use App\Contracts\AbstractCrud;
use App\DTO\EmployeeDTO;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;


class EmployeeController extends Controller
{
    public AbstractCrud $service;

    public function __construct(AbstractCrud $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $employees = Employee::with('school')->paginate(3);
        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EmployeeRequest $request
     * @return RedirectResponse
     */
    public function store(EmployeeRequest $request)
    {
        $dto = EmployeeDTO::fromRequest($request);
        $this->service->store($dto);
        session()->flash('message', 'Created');
        return redirect()->route('employees.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Employee $employee
     * @return Factory|View
     */
    public function edit(Employee $employee)
    {
        $employee->load('school');
        return view('employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EmployeeRequest $request
     * @param Employee $employee
     * @return RedirectResponse
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $dto = EmployeeDTO::fromRequest($request);
        $this->service->setModel($employee)->update($dto);
        session()->flash('message', 'Updated');
        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Employee $employee
     * @return bool
     */
    public function destroy(Employee $employee)
    {
        return $this->service->setModel($employee)->delete();
    }
}
