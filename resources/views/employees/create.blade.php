<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add a New Employee') }}
        </h2>
    </x-slot>
    <x-form>
        <x-auth-session-status class="mb-4" :status="session('status')"/>
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>
        <form method="POST" action="{{ route('employees.store') }}" class="space-y-4">
            @csrf
            <div>

                <x-label for="company_id" :value="__('Company')"/>
                <select id="company_id" class="block mt-1 w-full"  name="company_id" required>
                    <option value="" disabled selected >Please Select Company</option>
                    @foreach(\App\Models\Company::all(['id', 'name']) as $company)
                        <option {{Route::getCurrentRequest()->query('company') == $company->id ? 'selected': '' }}
                                value="{{
                        $company->id
                        }}">{{$company->name}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <x-label for="first_name" :value="__('First Name')"/>
                <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old
                ('first_name')"
                         required
                         autofocus/>
            </div>
            <div>
                <x-label for="last_name" :value="__('Last Name')"/>
                <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old
                ('last_name')"
                         required
                         />
            </div>
            <div>
                <x-label for="email" :value="__('Email')"/>
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"/>
            </div>
            <div>
                <x-label for="phone" :value="__('Phone')"/>
                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')"/>
            </div>
            <div class="flex items-center justify-between mt-4">

                <a href="{{url()->previous()}}" class="ml-3 underline">
                    {{ __('Cancel') }}
                </a>
                <x-button class="ml-3 bg-blue-400 hover:bg-blue-500">
                    {{ __('Add Employee') }}
                </x-button>
            </div>
        </form>
    </x-form>
</x-app-layout>
