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
            	<a href="{{ route('post.create') }}" class="btn btn-primary rounded float-right">Create Post</a>
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
				                    Image
				                </th>
				                <th scope="col" class="px-6 py-3">
				                    Title
				                </th>
				                <th scope="col" class="px-6 py-3">
				                    Category
				                </th>
				                <th scope="col" class="px-6 py-3">
				                    Action
				                </th>
				            </tr>
				        </thead>
				        <tbody>
				        	@if($posts->count() > 0)
					        	@foreach($posts as $post)
					            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
					                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
					                    {{ $post->id }}
					                </th>
					                <td class="px-6 py-4">
					                    <img src="{{ $post->feature_image }}" alt="{{ $post->title }}" width="50" height="50">
					                </td>
					                <td class="px-6 py-4">
					                    {{ $post->title }}
					                </td>
					                <td class="px-6 py-4">
					                    {{ $post->category->name }}
					                </td>
					                <td class="px-6 py-4">
					                    <a href="{{ route('post.edit', ['id' => $post->id]) }}" class="btn btn-primary">Edit</a>
					                    <a href="{{ route('post.destroy', ['id' => $post->id]) }}" class="btn btn-danger">Trash</a>
					                </td>
					            </tr>
					            @endforeach
					        @else
					        	<tr>
						        	<th colspan="5" class="text-center">No Posts Available</th>
						        </tr>
					        @endif
				        </tbody>
				    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>