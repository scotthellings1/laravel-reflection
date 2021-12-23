<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employee')  }}: {{ $employee->fullname }}
        </h2>
    </x-slot>
    <div class="flex justify-center my-10">
        <div class="flex flex-col w-1/2 bg-white rounded-lg p-8 space-y-4 shadow-md">
            <div class="flex justify-center w-full">
                <h2 class="text-center text-xl font-semibold">Employee details</h2>

            </div>
            <div class="flex">
                <span class="mr-4 font-semibold">First Name:</span>
                <span>{{ $employee->first_name }}</span>
            </div>
                <div class="flex">
                    <span class="mr-4 font-semibold">Last Name:</span>
                    <span>{{ $employee->last_name }}</span>
                </div>
            <div class="flex">
                <span class="mr-4 font-semibold">Email:</span>
                <span>{{ $employee->email }}</span>
            </div>
            <div class="flex">
                <span class="mr-4 font-semibold">Company:</span>
                <span>
                    <a href="{{ route('companies.show', $employee->company->id) }}"
                       class="text-indigo-600">{{ $employee->company->name}}</a>
                </span>
            </div>

        </div>
    </div>


</x-app-layout>
