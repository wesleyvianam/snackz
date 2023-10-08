<x-modal name="modal-snacks" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <form method="post" action="{{ route('snacks.store') }}" class="p-6">
        @csrf

        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('A') }}
        </h2>

        <p class="text-md font-light text-gray-900 dark:text-gray-100">
            {{ __('lorem impson') }}
        </p>

        <div class="mt-6 flex w-full">
            <div class="w-1/4 pe-3">
                <x-input-label for="category" value="{{ __('category') }}" class="sr-only" />
                <x-select-input
                    id="category"
                    name="category"
                    class="w-full"
                    :options="$formatCategories"
                />
            </div>
            <div class="w-3/4">
                <x-input-label for="name" value="{{ __('name') }}" class="sr-only" />
                <x-text-input
                    id="name"
                    name="name"
                    type="text"
                    class="w-full"
                    required
                    placeholder="{{ __('Name') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('name')" class="mt-2" />
            </div>
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
