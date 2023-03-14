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
            <div class="col-lg-6"></div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="card">
                        @include('admin.commons.errors');
                        <div class="card-header">
                            {{ $title }}
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('settings.update') }}" name="update_settings" id="update_settings" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-6">
                                    <label for="site_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Site Name</label>
                                    <input type="text" id="site_name" name="site_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Site Name" value="{{ $setting->site_name }}">
                                </div>
                                <div class="mb-6">
                                    <label for="contact_email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact Email</label>
                                    <input type="text" id="contact_email" name="contact_email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Site Name" value="{{ $setting->contact_email }}">
                                </div>
                                <div class="mb-6">
                                    <label for="contact_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact number</label>
                                    <input type="text" id="contact_number" name="contact_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Site Name" value="{{ $setting->contact_number }}">
                                </div>
                                <div class="mb-6">
                                    <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                                    <input type="text" id="address" name="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Site Name" value="{{ $setting->address }}">
                                </div>
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update Site Settings</button>
                                <a href="{{ route('dashboard') }}" class="btn btn-danger">Cancle</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>