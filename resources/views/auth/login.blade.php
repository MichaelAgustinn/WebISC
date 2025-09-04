<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <!-- Wrapper custom -->
            <div class="flex items-center border border-gray-300 rounded-md shadow-sm mt-1">
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    class="flex-1 px-3 py-2 rounded-l-md focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-300 " />

                <button type="button" onclick="togglePassword()" class="px-3 text-gray-200 focus:outline-none">
                    <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0
                         8.268 2.943 9.542 7-1.274 4.057-5.065
                         7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>


        <!-- Remember Me -->

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('register') }}">
                    {{ __('Buat Akun?') }}
                </a>
            @endif

            <x-primary-button class="ms-3" style="background-color: #263C8F">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');

            if (input.type === 'password') {
                input.type = 'text';

                // Ganti jadi ikon mata dicoret (eye-slash)
                eyeIcon.outerHTML = `
                <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" 
                     class="h-5 w-5" fill="none" viewBox="0 0 24 24" 
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.956 
                             9.956 0 012.24-3.823m2.122-2.122A9.956 
                             9.956 0 0112 5c4.477 0 8.268 2.943 
                             9.542 7a9.956 9.956 0 01-4.338 
                             5.042M15 12a3 3 0 11-6 0 3 
                             3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M3 3l18 18" />
                </svg>`;
            } else {
                input.type = 'password';

                // Ganti lagi ke ikon mata biasa
                eyeIcon.outerHTML = `
                <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" 
                     class="h-5 w-5" fill="none" viewBox="0 0 24 24" 
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M15 12a3 3 0 11-6 0 3 3 
                             0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M2.458 12C3.732 7.943 7.523 
                             5 12 5c4.477 0 8.268 2.943 
                             9.542 7-1.274 4.057-5.065 
                             7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>`;
            }
        }
    </script>
</x-guest-layout>
