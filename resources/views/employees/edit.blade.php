<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Employee') }}: {{ $employee->fullname }}
        </h2>
        <a href="{{ url()->previous() }}"
           class=" flex items-center justify-center h-10 px-5 m-2 font-semibold text-blue-900 transition-colors
               duration-[50ms] bg-blue-400 rounded-lg focus:shadow-outline hover:bg-blue-500">Back</a></div>
    </x-slot>
    <x-form>
        <x-auth-session-status class="mb-4" :status="session('status')"/>
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>
        <form method="POST" action="{{ route('employees.update', $employee) }}" class="space-y-4">
            @csrf
            @method('put')
            <div>
                <x-label for="company" :value="__('Company')"/>
                <h2><a href="{{ route('companies.show', $employee->company->id) }}" class="text-indigo-600">{{ $employee->company->name
                }}</a></h2>
            </div>
            <div>
                <x-label for="first_name" :value="__('First Name')"/>
                <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old
                ('first_name', $employee->first_name)"
                         required
                         autofocus/>
            </div>
            <div>
                <x-label for="last_name" :value="__('Last Name')"/>
                <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old
                ('last_name',$employee->last_name)"
                         required
                />
            </div>
            <div>
                <x-label for="email" :value="__('Email')"/>
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email',
                $employee->email)"/>
            </div>
            <div>
                <x-label for="phone" :value="__('Phone')"/>
                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone',
                $employee->phone)"/>
            </div>
            <div class="flex items-center justify-between mt-4">

                <a href="{{url()->previous()}}" class="ml-3 underline">
                    {{ __('Cancel') }}
                </a>
                <x-button class="ml-3 bg-blue-400 hover:bg-blue-500">
                    {{ __('Update Employee') }}
                </x-button>
            </div>
        </form>
    </x-form>
</x-app-layout>
