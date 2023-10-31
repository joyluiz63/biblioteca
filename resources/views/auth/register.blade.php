<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="cpf" :value="__('CPF')" />
            <x-text-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" :value="old('cpf')" autofocus autocomplete="cpf" />
            <x-input-error :messages="$errors->get('cpf')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="rua" :value="__('Rua')" />
            <x-text-input id="rua" class="block mt-1 w-full" type="text" name="rua" :value="old('rua')" autofocus autocomplete="rua" />
            <x-input-error :messages="$errors->get('rua')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="numero" :value="__('Numero')" />
            <x-text-input id="numero" class="block mt-1 w-full" type="text" name="numero" :value="old('numero')" autofocus autocomplete="numero" />
            <x-input-error :messages="$errors->get('numero')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="complemento" :value="__('Complemento')" />
            <x-text-input id="complemento" class="block mt-1 w-full" type="text" name="complemento" :value="old('complemento')" autofocus autocomplete="complemento" />
            <x-input-error :messages="$errors->get('complemento')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="bairro" :value="__('Bairro')" />
            <x-text-input id="bairro" class="block mt-1 w-full" type="text" name="bairro" :value="old('bairro')" autofocus autocomplete="bairro" />
            <x-input-error :messages="$errors->get('bairro')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="cidade" :value="__('Cidade')" />
            <x-text-input id="cidade" class="block mt-1 w-full" type="text" name="cidade" :value="old('cidade')" autofocus autocomplete="cidade" />
            <x-input-error :messages="$errors->get('cidade')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="fone" :value="__('Fone(s)')" />
            <x-text-input id="fone" class="block mt-1 w-full" type="text" name="fone" :value="old('fone')" autofocus autocomplete="fone" />
            <x-input-error :messages="$errors->get('fone')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"  autocomplete="username" />
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
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
