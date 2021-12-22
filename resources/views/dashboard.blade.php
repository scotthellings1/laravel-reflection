<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl px-4 mx-auto grid mt-8">
        <!-- Cards -->
        <div class="grid gap-6 mb-8 md:grid-cols-2">
            <a href="{{route('companies.index')}}">
                <x-counter-card text="Companies" count="{{ $companies }}" icon="C"/>
            </a>
            <a href="{{route('employees.index')}}">
                <x-counter-card text="Employees" count="{{ $employees }}" icon="E"/>
            </a>
        </div>
    </div>


</x-app-layout>
