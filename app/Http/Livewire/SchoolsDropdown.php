<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use App\Models\School;
use Livewire\Component;

class SchoolsDropdown extends Component
{
    public $schoolName;
    public $schoolId;
    public Employee $employee;


    public function mount()
    {
        if (old('school_id')) {
            $this->schoolId = old('school_id');
        }
        if (old('school_name')) {
            $this->schoolName = old('school_name');
        }
        if (isset($this->employee)) {
            $this->schoolId = $this->employee->school->id;
            $this->schoolName = $this->employee->school->name;
        }

    }

    public function render()
    {
        return view('livewire.schools-dropdown');
    }

    public function getSchoolsPaginatedProperty()
    {
        if ($this->schoolName) {
            return School::where('name', 'like', $this->schoolName . '%')->paginate(10);
        }
        return null;
    }

    public function suggestSchools()
    {
        $this->schoolsPaginated = School::where('name', 'like', $this->schoolName . '%')->paginate(10);
    }

    public function selectSchool(School $school)
    {
        $this->schoolName = $school->name;
        $this->schoolId = $school->id;
    }

}
