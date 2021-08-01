@extends('layouts.app')

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                @include('session-message')
                <form action="{{route('employees.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="my-3">
                        <livewire:schools-dropdown/>
                    </div>
                    <div class="my-3">
                        <x-jet-label for="first_name" value="{{ __('First name') }}"/>
                        <x-jet-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                                     :value="old('first_name')" required autofocus autocomplete="first_name"/>
                        <x-jet-input-error for="first_name" class="mt-2"/>
                    </div>

                    <div class="my-3">
                        <x-jet-label for="last_name" value="{{ __('Last name') }}"/>
                        <x-jet-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                                     :value="old('last_name')" required autofocus autocomplete="last_name"/>
                        <x-jet-input-error for="last_name" class="mt-2"/>
                    </div>

                    <div class="my-3">
                        <x-jet-label for="email" value="{{ __('Email') }}"/>
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                                     :value="old('email')" required autofocus autocomplete="email"/>
                        <x-jet-input-error for="email" class="mt-2"/>
                    </div>

                    <div class="my-3">
                        <x-jet-label for="phone" value="{{ __('Phone') }}"/>
                        <x-jet-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                                     :value="old('phone')" required autofocus autocomplete="phone"/>
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
