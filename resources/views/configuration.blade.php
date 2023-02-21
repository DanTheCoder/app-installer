@extends('app-installer::layout')
 
@section('header')
    <h2 class="text-3xl font-semibold tracking-tight text-gray-900">Configuration</h2>
    <p class="mt-2 text-base text-gray-600">Configure your application environment variables</p>
@endsection
 
@section('content')

    <form class="space-y-6" action="{{ route('app-installer::configuration.store') }}" method="POST">
        @csrf

        <div>
            <label for="app_name" class="mb-1 block text-sm font-medium text-gray-700">App Name</label>
            <input id="app_name" name="app_name" type="text" value="{{ config('app.name') }}" required class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2.5 placeholder-gray-400 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
        </div>


        <div class="grid grid-cols-1 sm:grid-cols-6 gap-4">
            
            <div class="sm:col-span-2">
                <label for="db_connection" class="mb-1 block text-sm font-medium text-gray-700">Database Connection</label>
                <input id="db_connection" name="db_connection" type="text" value="{{ config('database.default') }}" required class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2.5 placeholder-gray-400 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
            </div>

            <div class="sm:col-span-4">
                <label for="db_host" class="mb-1 block text-sm font-medium text-gray-700">Database Host</label>
                <input id="db_host" name="db_host" type="text" value="{{ config('database.connections.mysql.host') }}" required class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2.5 placeholder-gray-400 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
            </div>

            <div class="sm:col-span-4">
                <label for="db_name" class="mb-1 block text-sm font-medium text-gray-700">Database Name</label>
                <input id="db_name" name="db_name" type="text" required class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2.5 placeholder-gray-400 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
            </div>

            <div class="sm:col-span-2">
                <label for="db_port" class="mb-1 block text-sm font-medium text-gray-700">Database Port</label>
                <input id="db_port" name="db_port" type="text" value="{{ config('database.connections.mysql.port') }}" required class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2.5 placeholder-gray-400 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
            </div>

            <div class="sm:col-span-3">
                <label for="db_username" class="mb-1 block text-sm font-medium text-gray-700">Database Username</label>
                <input id="db_username" name="db_username" type="text" required class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2.5 placeholder-gray-400 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
            </div>
    
            <div class="sm:col-span-3">
                <label for="db_password" class="mb-1 block text-sm font-medium text-gray-700">Database Password</label>
                <input id="db_password" name="db_password" type="text" class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2.5 placeholder-gray-400 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
            </div>
    
        </div>


        <div>
            <button type="submit" class="flex w-full justify-center rounded-md border border-transparent bg-slate-900 py-3 px-4 text-sm font-medium text-white shadow-sm hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-700 focus:ring-offset-2">Next Step</button>
        </div>
    </form>

@endsection