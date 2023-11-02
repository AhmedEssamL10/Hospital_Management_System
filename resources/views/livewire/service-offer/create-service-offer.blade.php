<div>
    {{-- <button wire:click="increment">+</button>
    <h1>{{ $count }}</h1>
    @foreach ($sections as $section)
        {{ $section->name }}
    @endforeach
    
    <input type="text" wire:model="en_name">
    <input type="text" wire:model='ar_name'>
    <input type="text" wire:model='en_desc'>
    <input type="text" wire:model='ar_desc'>
    <button wire:click.prevent='save'>save</button> --}}

    <form wire:submit.prevent="save">
        @csrf
        <label for="services" style="padding-left: 2%">services</label>
        @foreach ($services as $service)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="flexCheckChecked" name="services[]"
                    value="{{ $service->id }}">
                <label class="form-check-label" for="flexCheckChecked">
                    {{ $service->name }}
                </label>
            </div>
        @endforeach
    </form>

</div>
