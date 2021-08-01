@extends('layouts.app')

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                @include('session-message')
                <a href="{{route('employees.create')}}"
                   class="bg-indigo-500 text-white font-bold py-2 px-4 rounded my-4">Create employee</a>
                <div class="mt-4">
                    @if($employees->isNotEmpty())

                        <table class="table-fixed w-full">
                            <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 w-20">Id</th>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Phone</th>
                                <th class="px-4 py-2">School</th>
                                <th class="px-4 py-2"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <td class="border px-4 py-2">{{ $employee->id }}</td>
                                    <td class="border px-4 py-2">{{ $employee->name }}</td>
                                    <td class="border px-4 py-2">{{ $employee->email}}</td>
                                    <td class="border px-4 py-2">{{ $employee->phone}}</td>
                                    <td class="border px-4 py-2">
                                        <a target="_blank" href="{{ route('schools.edit',$employee->school_id)}}">
                                            {{$employee->school->name}}
                                        </a>
                                    </td>
                                    <td class="border px-4 py-2">
                                        <a
                                            href="{{route('employees.edit',$employee)}}"
                                            class="bg-blue-500  text-white font-bold py-2 px-4 rounded">Edit
                                        </a>
                                        <button
                                            data-id="{{$employee->id}}"
                                            class="delete-employee__btn bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-red-500">Employees are not set </p>
                    @endif
                </div>
                @if($employees->isNotEmpty())
                    <div class="mt-4">
                        {{$employees->links()}}
                    </div>
                @endif
            </div>
        </div>

    </div>
@endsection
