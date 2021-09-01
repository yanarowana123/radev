<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SchoolCollection;
use App\Http\Resources\SchoolResource;
use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function getSchool(School $school)
    {
        return new SchoolResource($school);
    }

    public function getAllSchools(Request $request)
    {
        if ($request->per_page) {
            return new SchoolCollection(School::paginate($request->per_page));
        }

        return new SchoolCollection(School::all());
    }
}
