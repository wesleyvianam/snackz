<x-modal name="modal-category" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <form method="post" action="{{ route('categories.store') }}" class="p-6">
        @csrf

        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Criar uma nova Categoria') }}
        </h2>

        <div class="mt-6">
            <x-input-label for="password" value="{{ __('title') }}" class="sr-only" />

            <x-text-input
                id="title"
                name="title"
                type="text"
                class="mt-1 block w-full"
                required
                placeholder="{{ __('Title') }}"
            />

            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
        </div>

        <div class="mt-6 flex items-center">
            <x-input-label for="quantity" value="{{ __('Aceita quantidade?') }}" />

            <x-text-input
                id="quantity"
                name="quantity"
                type="checkbox"
                class="mt-1 ml-2 block"
                value="1"
                placeholder="{{ __('Title') }}"
            />

            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-primary-button class="ms-3 w-24">
                {{ __('Save') }}
            </x-primary-button>
        </div>
    </form>
</x-modal>
