@extends('layouts.app')

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                @include('session-message')
                <a href="{{route('schools.create')}}"
                   class="bg-indigo-500 text-white font-bold py-2 px-4 rounded my-4">Create school</a>
                <div class="mt-4">
                    @if($schools->isNotEmpty())

                        <table class="table-fixed w-full">
                            <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 w-20">Id</th>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Site</th>
                                <th class="px-4 py-2">Image</th>
                                <th class="px-4 py-2"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($schools as $school)
                                <tr>
                                    <td class="border px-4 py-2">{{ $school->id }}</td>
                                    <td class="border px-4 py-2">{{ $school->name }}</td>
                                    <td class="border px-4 py-2">{{ $school->email}}</td>
                                    <td class="border px-4 py-2">{{ $school->website}}</td>
                                    <td class="border px-4 py-2">
                                        <a target="_blank" href="{{ $school->logo}}">
                                            <img src="{{ $school->logo}}" alt="" style="width: 100px">
                                        </a>
                                    </td>
                                    <td class="border px-4 py-2">
                                        <a
                                            href="{{route('schools.edit',$school)}}"
                                            class="bg-blue-500  text-white font-bold py-2 px-4 rounded">Edit
                                        </a>
                                        <button
                                            data-id="{{$school->id}}"
                                            class="delete-product__btn bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-red-500">Schools are not set </p>
                    @endif
                </div>

                @if($schools->isNotEmpty())
                    <div class="mt-4">
                        {{$schools->links()}}
                    </div>
                @endif
            </div>
        </div>

    </div>
@endsection
