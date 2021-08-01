@extends('layouts.app')

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                @include('session-message')


                <form action="{{route('schools.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="my-3">
                        <x-jet-label for="name" value="{{ __('Name') }}"/>
                        <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name"
                                     :value="old('name')" required autofocus autocomplete="name"/>
                        <x-jet-input-error for="name" class="mt-2" />
                    </div>

                    <div class="my-3">
                        <x-jet-label for="email" value="{{ __('Email') }}"/>
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                                     :value="old('email')" required autofocus autocomplete="email"/>
                        <x-jet-input-error for="email" class="mt-2" />
                    </div>

                    <div class="my-3">
                        <x-jet-label for="website" value="{{ __('Website') }}"/>
                        <x-jet-input id="website" class="block mt-1 w-full" type="text" name="website"
                                     :value="old('website')" required autofocus autocomplete="website"/>
                        <x-jet-input-error for="website" class="mt-2" />

                    </div>

                    <div class="my-3">
                        <x-jet-label for="logo" value="{{ __('Logo') }}"/>
                        <x-jet-input id="logo" class="block mt-1 w-full" type="file" name="logo"
                                    required autofocus autocomplete="logo"/>
                        <x-jet-input-error for="logo" class="mt-2" />
                    </div>

                    <x-jet-button type="submit">
                        Submit
                    </x-jet-button>
                </form>
            </div>
        </div>
    </div>
@endsection
