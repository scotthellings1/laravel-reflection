<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update') }} {{ $company->name }}
        </h2>
            <a href="{{ url()->previous() }}"
               class=" flex items-center justify-center h-10 px-5 m-2 font-semibold text-blue-900 transition-colors
               duration-[50ms] bg-blue-400 rounded-lg focus:shadow-outline hover:bg-blue-500">Back</a></div>
    </x-slot>
    <x-form>
        <x-auth-session-status class="mb-4" :status="session('status')"/>
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>
        <form method="POST" action="{{ route('companies.update', $company) }}" class="space-y-4"
              enctype="multipart/form-data">
            @csrf
            @method('put')
            <div>
                <x-label for="name" :value="__('Name')"/>
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name',
                $company->name)"
                         required
                         autofocus/>
            </div>
            <div>
                <x-label for="email" :value="__('Email')"/>

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email',
                $company->email)"/>
            </div>
            <div>
                <x-label for="website" :value="__('Website')"/>

                <x-input id="website" class="block mt-1 w-full" type="text" name="website" :value="old
                ('website', $company->website)"/>
            </div>
            <div>
                <x-label for="logo" :value="__('Logo')"/>
                @if($company->logo)
                    <img class="mx-auto py-2" src="{{asset('storage/logos/' . $company->logo) }}" alt="">
                @else
                    no logo
                @endif
                <x-input id="logo" class="block mt-1 w-full" type="file" name="logo"/>
            </div>
            <div class="flex items-center justify-between mt-4">

                <a href="{{url()->previous()}}" class="ml-3 underline">
                    {{ __('Cancel') }}
                </a>
                <x-button class="ml-3 bg-blue-400 hover:bg-blue-500">
                    {{ __('Update Company') }}
                </x-button>
            </div>
        </form>
    </x-form>
    <x-slot name="scripts">
        <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
        <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
        <script>
            // Set default FilePond options
            FilePond.registerPlugin(FilePondPluginImagePreview)
            FilePond.setOptions({
                server: {
                    url: "{{ config('filepond.server.url') }}",
                    headers: {
                        'X-CSRF-TOKEN': "{{ @csrf_token() }}",
                    },
                    imagePreviewHeight: 170
                }
            });

            // Create the FilePond instance
            FilePond.create(document.querySelector('input[name="logo"]'),
            );
        </script>
    </x-slot>
    <x-slot name="styles">
        <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
        <link
            href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
            rel="stylesheet"
        />
    </x-slot>
</x-app-layout>
