<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>

            <!-- Formulaire de création de boutique -->
            <div class="mt-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">
                    {{ __('Create Your Boutique') }}
                </h3>
                <form method="POST" action="{{ route('boutique.store') }}">
                    @csrf
                    <div>
                        <x-input-label for="boutique_name" :value="__('Boutique Name')" />
                        <x-text-input id="boutique_name" class="block mt-1 w-full" type="text" name="boutique_name" :value="old('boutique_name')" required autofocus />
                        <x-input-error :messages="$errors->get('boutique_name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-primary-button>
                            {{ __('Create Boutique') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
