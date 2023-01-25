<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.employees.create') }}" class="px-4 py-2 bg-fuchsia-500 hover:bg-sky-600 rounded-lg text-white">New Employee</a>
            </div>


           
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 bg-slate-600">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Account Number
                </th>
                <th scope="col" class="px-6 py-3">
                    Employee ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Phone Number
                </th>
                <th scope="col" class="px-6 py-3">
                    Job Title
                </th>
            </th>
            <th scope="col" class="px-6 py-3">
                Actions
            </th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
            <tr class="bg-white dark:bg-gray-800">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$employee->name}}
                </th>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$employee->description}}
                </td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$employee->account_number}}
                </td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$employee->employee_id}}
                </td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$employee->phone_number}}
                </td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$employee->job_title}}
                </td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <div class="flex space-x-2">
                        <a href="{{ route('admin.employees.edit', $employee->id) }}" class="px-6 py-4 bg-slate-200 hover:bg-slate-60  rounded-lg text-red-600">Update</a>
                        <form class="px-4 py-2  bg-slate-200 hover:bg-slate-60  rounded-lg text-red-600"
                           method="POST"
                           action="{{ route('admin.employees.destroy', $employee->id) }}"
                           onsubmit="return confirm('Are you sure ?');">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="inline-flex items-center px-4 py-2">Delete</button>
                        </form>
            
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

        </div>
    </div>
</x-admin-layout>
