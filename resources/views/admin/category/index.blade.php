<x-app-layout>
	@section('title')
        {{ $title }}
    @endsection
    <x-slot name="header">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ $title }}
                </h2>
            </div>
            <div class="col-lg-6">
            	<a href="{{ route('category.create') }}" class="btn btn-primary rounded float-right">Create Category</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
				        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
				            <tr>
				                <th scope="col" class="px-6 py-3">
				                    #
				                </th>
				                <th scope="col" class="px-6 py-3">
				                    Name
				                </th>
				                <th scope="col" class="px-6 py-3">
				                    Action
				                </th>
				            </tr>
				        </thead>
				        <tbody>
				            @foreach($categories as $category)
				            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
				                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
				                    {{ $category->id }}
				                </th>
				                <td class="px-6 py-4">
				                    {{ $category->name }}
				                </td>
				                <td class="px-6 py-4">
				                    <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-primary">Edit</a>
				                    <a href="{{ route('category.destroy', ['id' => $category->id]) }}" class="btn btn-danger">Delete</a>
				                </td>
				            </tr>	
				            @endforeach
				        </tbody>
				    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>