<div>
    <div class="flex">
        <div class="w-2/4 me-3">
            <h1 class="text-2xl">Cadastre sua equipe</h1>

            <div class="py-3">
                <x-text-input id="email"
                              class="block mt-1 w-full"
                              type="text"
                              name="email"
                              :value="old('email')"
                              required
                              autofocus
                              autocomplete="email"
                              placeholder="Name" />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="py-3">
                <x-text-input id="email"
                              class="block mt-1 w-full"
                              type="text"
                              name="username"
                              :value="old('username')"
                              required
                              autofocus
                              autocomplete="username"
                              placeholder="username" />

                <x-input-error :messages="$errors->get('username')" class="mt-2" />
            </div>

            <div class="py-3">
                <x-text-input id="email"
                              class="block mt-1 w-full"
                              type="text"
                              name="email"
                              :value="old('email')"
                              required
                              autofocus
                              autocomplete="email"
                              placeholder="email" />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex justify-end mt-4">
                <x-primary-button>
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </div>

        <div class="w-2/4 border-l ms-3 px-3 ">
            <h1>Pessoas cadastradas:</h1>

            <ul class="border p-3 h-64">
                <li>Nenhuma pessoa cadastrada</li>
            </ul>
        </div>
    </div>

    <div class="flex justify-between pt-5">
        <form>
            <button class="py-1 px-2 border rounded-lg bg-white">
                Pular
            </button>
        </form>

        <div>
            <x-secondary-button @click="setting = 'recurrent'">
                voltar
            </x-secondary-button>

            <x-primary-button @click="setting = 'snacks'">
                próximo
            </x-primary-button>
        </div>
    </div>
</div>
