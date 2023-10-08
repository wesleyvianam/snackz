<x-modal name="modal-member" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <form method="post" action="{{ route('members.store') }}" class="p-6">
        @csrf

        <h2 class="text-xl font-bold text-gray-900 dark:text-gray-100">
            {{ __('Adicionar um novo Membro') }}
        </h2>

        <p class="text-md font-light text-gray-900 dark:text-gray-100">
            {{ __('Após o cadastro do membro, ele receberá um email para reset da senha.') }}
        </p>

        <div class="mt-6">
            <x-input-label for="name" value="{{ __('Name') }}" class="" />

            <x-text-input
                id="name"
                name="name"
                type="text"
                class="mt-1 block w-full"
                required
                placeholder="{{ __('Name') }}"
            />

            <x-input-error :messages="$errors->userDeletion->get('name')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-input-label for="email" value="{{ __('Email') }}" class="" />

            <x-text-input
                id="email"
                name="email"
                type="email"
                class="mt-1 block w-full"
                required
                placeholder="{{ __('Email') }}"
            />

            <x-input-error :messages="$errors->userDeletion->get('email')" class="mt-2" />
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
