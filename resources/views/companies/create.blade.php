<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add a New Company') }}
        </h2>
    </x-slot>
    <x-form>
        <x-auth-session-status class="mb-4" :status="session('status')"/>
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>
        <form method="POST" action="{{ route('companies.store') }}" class="space-y-4" enctype="multipart/form-data">
            @csrf
            <div>
                <x-label for="name" :value="__('Name')"/>
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                         autofocus/>
            </div>
            <div>
                <x-label for="email" :value="__('Email')"/>

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"/>
            </div>
            <div>
                <x-label for="website" :value="__('Website')"/>

                <x-input id="website" class="block mt-1 w-full" type="text" name="website" :value="old
                ('website')"/>
            </div>
            <div>
                <x-label for="logo" :value="__('Logo')"/>
                <x-input id="logo" class="block mt-1 w-full" type="file" name="logo"/>
            </div>
            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-3 bg-blue-400 hover:bg-blue-500">
                    {{ __('Add Company') }}
                </x-button>
            </div>
        </form>
    </x-form>
    <x-slot name="scripts">
        <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
        <script>
            // Set default FilePond options
            FilePond.setOptions({
                server: {
                    url: "{{ config('filepond.server.url') }}",
                    headers: {
                        'X-CSRF-TOKEN': "{{ @csrf_token() }}",
                    }
                }
            });

            // Create the FilePond instance
            FilePond.create(document.querySelector('input[name="logo"]'));
        </script>
    </x-slot>
    <x-slot name="styles">
        <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    </x-slot>
</x-app-layout>
