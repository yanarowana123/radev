<div>
    <x-jet-label for="schoolName" value="{{ __('School (start typing)') }}"/>
    <x-jet-input id="schoolName" class="block mt-1 w-full" type="text" wire:model="schoolName" name="school_name"
    />
    <x-jet-input id="school-id" class="block mt-1 w-full" type="hidden" name="school_id"
                 wire:model="schoolId"/>
    <x-jet-input-error for="school_id" class="mt-2"/>
    @if($this->schoolsPaginated)
        <div>
            @foreach($this->schoolsPaginated as $school)
                <button wire:click.prevent="selectSchool({{$school}})" class="hover:bg-indigo-600 block">
                    {{$school->name}}
                </button>
            @endforeach
        </div>
    @endif

</div>
