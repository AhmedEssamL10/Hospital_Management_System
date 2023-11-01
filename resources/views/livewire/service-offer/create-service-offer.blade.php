<div>
    <button wire:click="increment">+</button>
    <h1>{{ $count }}</h1>
    @foreach ($sections as $section)
        {{ $section->name }}
    @endforeach
    {{-- <form wire:submit.prevent="save"> --}}
    {{-- @csrf --}}
    <input type="text" wire:model="en_name">
    <input type="text" wire:model='ar_name'>
    <input type="text" wire:model='en_desc'>
    <input type="text" wire:model='ar_desc'>
    <button wire:click.prevent='save'>save</button>
    {{-- </form> --}}
</div>
