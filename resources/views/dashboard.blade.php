
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    @vite('resources/css/app.css')

    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
</head>
<body>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div id="alert-border-1" class="flex items-center p-4 mb-4 text-blue-50 dark:text-blue-400 dark:bg-blue-800" role="alert">
                <div class="ms-3 text-lg font-medium text-blue-50">
                   Login Successful .
                </div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-blue-50 dark:text-blue-800 dark:hover:bg-gray-700" data-dismiss-target="#alert-border-1" aria-label="Close">
                    <span class="sr-only">Dismiss</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">Profile Information</h1>
        <br><br>
        <!-- Profile information -->
        <div>
            <label for="">Name</label>
            <input id="name" name="name" type="text" class="mt-1 block w-full" value="{{Auth::user()->name}}" required autofocus autocomplete="" disabled />
            <br>
            <label for="">Email</label>
            <input id="email" name="email" type="email" class="mt-1 block w-full" value="{{Auth::user()->email}}" required autofocus autocomplete="" disabled />
        </div>
        <br><br>
        <a href="{{route('profile.edit')}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit details</a>

    </div>
    <br><br><br><br><br>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <a href="" class="font-semibold text-xl text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg px-5 py-2.5 me-2 mb-2 dark:bg-blue-900 dark:hover:bg-blue-700 focus:outline-none ">Income details</a>
        <a href="" class="font-semibold text-xl text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg px-5 py-2.5 me-2 mb-2 dark:bg-blue-900 dark:hover:bg-blue-700 focus:outline-none ">Expense details</a>
        <a href="" class="font-semibold text-xl text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg px-5 py-2.5 me-2 mb-2 dark:bg-blue-900 dark:hover:bg-blue-700 focus:outline-none ">Reports</a>

    </div>


</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>
