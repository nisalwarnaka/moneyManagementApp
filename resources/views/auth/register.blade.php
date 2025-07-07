<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- user Name -->
        <div>
            <x-input-label for="user name" :value="__('User Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <br>
        <!-- full Name -->
        <div>
            <x-input-label for="full name" :value="__('Full Name')" />
            <x-text-input id="fullName" class="block mt-1 w-full" type="text" name="fullName" :value="old('fullName')"  autofocus autocomplete="name" />

        </div>
        <br>
        <!-- birth day -->
        <div>
            <x-input-label for="birth day" :value="__('Birth Day')" />
            <x-text-input id="birthDay" class="block mt-1 w-full" type="date" name="birthDay" :value="old('birthDay')"  autofocus autocomplete="name" />

        </div>
        <br>
        <!-- job title -->
        <div>
            <x-input-label for="job title" :value="__('Job Title')" />
            <x-text-input id="jobTitle" class="block mt-1 w-full" type="text" name="jobTitle" :value="old('jobTitle')"  autofocus autocomplete="name" />

        </div>
        <br>
        <!-- monthly salary -->
        <div>
            <x-input-label for="monthly salary" :value="__('Monthly Salary')" />
            <x-text-input id="monthlySalary" class="block mt-1 w-full" type="text" name="monthlySalary" :value="old('monthlySalary')"  autofocus autocomplete="name" />

        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>

        </div>
    </form>
</x-guest-layout>
