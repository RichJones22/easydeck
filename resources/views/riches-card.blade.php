<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('burousuDecks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b-2">
                    <div class="mt-8 text-2xl text-center">
                        Card Manager
                    </div>
                </div>
                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6 border-r-2">
                        <livewire:riches-card-display />
                    </div>
                    <div class="p-6 place-self-center">
                        <form action="/FileUpload"
                              method="post"
                              enctype="multipart/form-data"
                              id="image-upload"
                              class="dropzone">
                            @csrf
                            <div>
                                <h3>Upload Multiple Image By Click On Box</h3>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>



