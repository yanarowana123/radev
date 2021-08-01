<?php

namespace App\Http\Controllers;

use App\Contracts\AbstractCrud;
use App\DTO\SchoolDTO;
use App\Http\Requests\SchoolRequest;
use App\Models\School;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SchoolController extends Controller
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
        $schools = School::paginate(3);
        return view('school.index', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('school.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SchoolRequest $request
     * @return RedirectResponse
     */
    public function store(SchoolRequest $request)
    {
        $schoolDTO = SchoolDTO::fromRequest($request);
        $this->service->store($schoolDTO);
        session()->flash('message', 'Created');
        return redirect()->route('schools.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param School $school
     * @return Factory|View
     */
    public function edit(School $school)
    {
        return view('school.edit', compact('school'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SchoolRequest $request
     * @param School $school
     * @return RedirectResponse
     */
    public function update(SchoolRequest $request, School $school)
    {
        $dto = SchoolDTO::fromRequest($request);
        $this->service->setModel($school)->update($dto);
        session()->flash('message', 'Updated');
        return redirect()->route('schools.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param School $school
     * @return void
     */
    public function destroy(School $school)
    {
        $this->service->setModel($school)->delete();
    }
}
