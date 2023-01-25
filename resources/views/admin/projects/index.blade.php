<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.projects.create') }}" class="px-4 py-2 bg-fuchsia-500 hover:bg-sky-600 rounded-lg text-white">New project</a>
            </div>

           
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Company
                </th>
                <th scope="col" class="px-6 py-3">
                    Company
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
            </tr>
        </thead>
        <tbody>
          @foreach($projects as $project)
          <tr class="bg-white dark:bg-gray-800">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
               {{$project->name}}
            </th>
            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
               {{$project->description}}
            </td>
            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$project->company}}
             </td>
            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$project->status}}
            </td>
            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <div class="flex space-x-2">
                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="px-6 py-4 bg-slate-200 hover:bg-slate-60  rounded-lg text-red-600">Update</a>
                    <form class="px-4 py-2  bg-slate-200 hover:bg-slate-60  rounded-lg text-red-600"
                         method="POST"
                         action="{{ route('admin.projects.destroy', $project->id) }}"
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
