<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Employee')  }}: {{ $employee->fullname }}
            </h2>
            <a href="{{ url()->previous() }}"
               class=" flex items-center justify-center h-10 px-5 m-2 font-semibold text-blue-900 transition-colors
               duration-[50ms] bg-blue-400 rounded-lg focus:shadow-outline hover:bg-blue-500">Back</a></div>
    </x-slot>
    <div class="flex justify-center my-10">
        <div class="flex flex-col w-full md:w-2/3 lg:w-1/2 bg-white rounded-lg mx-8 p-8 space-y-4 shadow-md">

            <div class="flex justify-between items-center w-full mt-0">
                <h2 class="text-center text-xl font-semibold">Employee details</h2>
                <a href="{{ route('employees.edit', $employee) }}"
                   class=" flex items-center justify-center h-10 px-5 m-2 font-semibold text-blue-900 transition-colors
               duration-[50ms] bg-blue-400 rounded-lg focus:shadow-outline hover:bg-blue-500">Update Employee</a>
            </div>
            <div class="flex-col lg:flex-row justify-between mr-4">
                <span class="font-semibold">First Name:</span>
                <span>{{ $employee->first_name }}</span>
            </div>
                <div class="flex-col lg:flex-row justify-between mr-4">
                    <span class="font-semibold">Last Name:</span>
                    <span>{{ $employee->last_name }}</span>
                </div>
            <div class="flex-col lg:flex-row justify-between mr-4">
                <span class="font-semibold">Email:</span>
                <span>{{ $employee->email }}</span>
            </div>
            <div class="flex-col lg:flex-row justify-between mr-4">
                <span class="font-semibold">Phone:</span>
                <span>{{ $employee->phone }}</span>
            </div>
            <div class="flex-col lg:flex-row justify-between mr-4">
                <span class="font-semibold">Company:</span>
                <span>
                    <a href="{{ route('companies.show', $employee->company->id) }}"
                       class="text-indigo-600 hover:underline">{{ $employee->company->name}}</a>
                </span>
            </div>

        </div>
    </div>


</x-app-layout>
