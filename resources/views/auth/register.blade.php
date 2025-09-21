<x-guest-layout>

    <h1 class="mb-6" style="color: #0f1829; font-weight:bolder;">
        Sign Up
    </h1>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Validation Errors -->
        @if ($errors->any())
        <div class="mb-4">
            <ul class="list-disc list-inside text-sm text-red-600">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full"
                type="text"
                name="name"
                :value="old('name')"
                required autofocus />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                required autocomplete="new-password" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                type="password"
                name="password_confirmation"
                required />
        </div>

        <!-- Role Selection -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Register as')" />
            <select id="role" name="role"
                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                required>
                <option value="">Select Role</option>
                <option value="employer" {{ old('role') == 'employer' ? 'selected' : '' }}>Employer</option>
                <option value="candidate" {{ old('role') == 'candidate' ? 'selected' : '' }}>Candidate</option>
            </select>
        </div>

        <!-- Employer Fields -->
        <div id="employer-fields" class="mt-4 hidden">
            <x-input-label for="company_name" :value="__('Company Name')" />
            <x-text-input id="company_name" class="block mt-1 w-full"
                type="text"
                name="company_name"
                :value="old('company_name')" />

            <x-input-label for="company_logo" class="mt-2" :value="__('Company Logo')" />
            <input id="company_logo" type="file" name="company_logo"
                class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer 
               bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 py-2 px-3 file:py-2 file:px-4" />
        </div>

        <!-- Candidate Fields -->
        <div id="candidate-fields" class="mt-4 hidden">
            <x-input-label for="resume" :value="__('Upload Resume (PDF/DOC)')" />
            <input id="resume" type="file" name="resume"
                class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer 
               bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 py-2 px-3 file:py-2 file:px-4" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4" style="background-color: #0f1829;">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

<script>
    const roleSelect = document.getElementById('role');
    const employerFields = document.getElementById('employer-fields');
    const candidateFields = document.getElementById('candidate-fields');

    function toggleFields() {
        employerFields.classList.add('hidden');
        candidateFields.classList.add('hidden');

        if (roleSelect.value === 'employer') {
            employerFields.classList.remove('hidden');
        } else if (roleSelect.value === 'candidate') {
            candidateFields.classList.remove('hidden');
        }
    }

    roleSelect.addEventListener('change', toggleFields);
    window.addEventListener('load', toggleFields);
</script>