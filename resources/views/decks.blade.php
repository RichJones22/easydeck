<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
{{--            {{ __('Decks') }}--}}
            <nav class="rounded bg-gray-900 text-white px-4 py-3 flex items-centered justify-between">
                <div class="flex items-center space-x-4">
                    <div>logo</div>
                    <div>search box</div>
                    <div>other options</div>
                </div>
                <div>right</div>
            </nav>
        </h2>
    </x-slot>

    <div class="py-12 m-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <livewire:riches-section />
        </div>
    </div>
</x-app-layout>
