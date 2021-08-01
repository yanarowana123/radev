@extends('layouts.app')

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                @include('session-message')


                <form action="{{route('employees.update',$employee)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="my-3">
                        <livewire:schools-dropdown :employee="$employee"/>
                    </div>

                    <div class="my-3">
                        <x-jet-label for="first_name" value="{{ __('First name') }}"/>
                        <x-jet-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                                     value="{{$employee->first_name}}" required autofocus autocomplete="first_name"/>
                        <x-jet-input-error for="first_name" class="mt-2"/>
                    </div>

                    <div class="my-3">
                        <x-jet-label for="last_name" value="{{ __('Last name') }}"/>
                        <x-jet-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                                     value="{{$employee->last_name}}" required autofocus autocomplete="last_name"/>
                        <x-jet-input-error for="last_name" class="mt-2"/>
                    </div>

                    <div class="my-3">
                        <x-jet-label for="email" value="{{ __('Email') }}"/>
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                                     value="{{$employee->email}}" required autofocus autocomplete="email"/>
                        <x-jet-input-error for="email" class="mt-2"/>
                    </div>

                    <div class="my-3">
                        <x-jet-label for="phone" value="{{ __('Phone') }}"/>
                        <x-jet-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                                     value="{{$employee->phone}}" required autofocus autocomplete="phone"/>
                        <x-jet-input-error for="phone" class="mt-2"/>
                    </div>

                    <x-jet-button type="submit">
                        Submit
                    </x-jet-button>
                </form>
            </div>
        </div>
    </div>
@endsection
