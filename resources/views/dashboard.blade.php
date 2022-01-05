<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl px-4 mx-auto grid mt-8">
        <!-- Cards -->
        <div class="grid gap-6 mb-8 md:grid-cols-2">

            <x-counter-card text="Companies" count="{{ $companies->count() }}" icon="C">
                <h2 class="my-4"> Latest Companies</h2>
                <ul class="mb-2  font-medium text-gray-600 ">
                    @foreach($companies->take(5) as $company)
                        <li>
                            <a class="text-indigo-400 hover:underline"  href="{{route('companies.show', $company)
                            }}">{{$company->name}}</a> - <span
                                class="text-sm">{{$company->created_at->diffForHumans()}}</span>
                        </li>
                    @endforeach
                </ul>

            </x-counter-card>


            <x-counter-card text="Employees" count="{{ $employees->count() }}" icon="E">
                <h2 class="my-4"> Latest Employees</h2>
                <ul class="mb-2  font-medium text-gray-600">
                    @foreach($employees->take(5) as $employee)
                        <li class="text-indigo-600 "><a
                                class="hover:underline"
                                href="{{route('employees.show', $employee)}}">{{$employee->fullname}}</a> -
                            <a class="text-indigo-400 hover:underline" href="{{route('companies.show', $employee->company->id)
                                }}">{{$employee->company->name}}</a> <span
                                class="text-sm text-gray-600">{{$employee->created_at->diffForHumans()}}</span></li>
                    @endforeach
                </ul>

            </x-counter-card>
        </div>
    </div>


</x-app-layout>
