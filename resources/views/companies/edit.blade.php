<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add a New Company') }}
        </h2>
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
                <x-input id="logo" class="block mt-1 w-full" type="file" name="logo"/>
            </div>
            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-3 bg-blue-400 hover:bg-blue-500">
                    {{ __('Add Company') }}
                </x-button>
            </div>
        </form>
    </x-form>
</x-app-layout>
