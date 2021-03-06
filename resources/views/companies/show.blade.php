<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
            <a href="{{ url()->previous() }}"
               class=" flex items-center justify-center h-10 px-5 m-2 font-semibold text-blue-900 transition-colors
               duration-[50ms] bg-blue-400 rounded-lg focus:shadow-outline hover:bg-blue-500">Back</a>
        </div>
    </x-slot>
    <div class="flex justify-center my-10">
        <div class="flex flex-col w-full md:w-2/3 lg:w-1/2 bg-white rounded-lg mx-8 p-8 space-y-4 shadow-md">

                <a href="{{ route('companies.edit', $company) }}"
                   class=" flex items-center justify-center self-end h-10 px-5 m-2 inline-block w-48 font-semibold
                   text-blue-900 transition-colors duration-[50ms] bg-blue-400 rounded-lg focus:shadow-outline
                   hover:bg-blue-500">Update Company</a>
            @if ($company->logo)
                <div class="flex">
                    <img class=" rounded-lg w-32 h-32" src="{{asset('storage/logos/' . $company->logo) }}"
                         alt="">
                </div>
            @endif
            <div class="flex flex-col lg:flex-row justify-between mr-4">
                <span class=" font-semibold">Company Name:</span>
                <span>{{ $company->name }}</span>
            </div>
            <div class="flex flex-col lg:flex-row justify-between mr-4">
                <span class=" font-semibold">Company Email:</span>
                <span>{{ $company->email }}</span>
            </div>
            <div class="flex flex-col lg:flex-row justify-between mr-4">
                <span class=" font-semibold">Company Website:</span>
                <span>  <a href="#">{{ $company->website }}</a></span>
            </div>
            <div class="flex flex-col lg:flex-row justify-between mr-4">
                <span class="font-semibold">Number of Employees:</span>
                <span>  <a href="#">{{ $company->employees->count() }}</a></span>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-4">
        <div class="flex justify-between w-full">
            <h1 class="text-2xl my-2">
                Employees
            </h1>
            <a href="{{ route('employees.create', ['company' => $company]) }}"
               class=" flex items-center justify-center self-end h-10 px-5 m-2 inline-block w-48 font-semibold
                   text-blue-900 transition-colors duration-[50ms] bg-blue-400 rounded-lg focus:shadow-outline
                   hover:bg-blue-500">Add Employee</a>
        </div>


        <div class="flex flex-col mt-2 mb-8">
            <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div
                    class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                    <table class="min-w-full">
                        <thead>
                        <tr>

                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                First Name
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Last Name
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Email
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Phone
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                View
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Edit
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Delete
                            </th>
                        </tr>
                        </thead>

                        <tbody class="bg-white">
                        @foreach($employees as $employee)

                            <tr>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="ml-4">
                                        <div class="text-sm font-medium leading-5 text-gray-900">
                                            {{ $employee->first_name }}
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-500">
                                        {{ $employee->last_name }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-500">
                                        <a href="mailto:{{ $employee->email }}">{{ $employee->email}}</a>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-500">
                                        {{$employee->phone}}
                                    </div>
                                </td>
                                <td
                                    class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                    <a href="{{ route('employees.show', $employee) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-400"
                                             fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </a>
                                </td>
                                <td
                                    class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                    <a href="{{ route('employees.edit', $employee) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                    </a>
                                </td>
                                <td
                                    class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                    <form method="POST" action="{{ route('employees.destroy',  $employee) }}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('employees.destroy',  $employee) }}" onclick="event.preventDefault();
                                                  if ( confirm('Are you sure?')) {
                                                    this.closest('form').submit()
                                                }">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400"
                                                 fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>


                </div>
                <div class="my-4">
                    {!! $employees->render() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
