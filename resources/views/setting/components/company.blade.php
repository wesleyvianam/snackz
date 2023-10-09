<div>
    <div class="flex">
        <h1 class="text-2xl w-3/5">Qual o nome da sua empresa?</h1>

        <x-text-input id="email"
                      class="block mt-1 w-full"
                      type="text" name="email"
                      :value="old('email')"
                      required
                      autofocus
                      autocomplete="email"
                      placeholder="Nome da empresa" />

        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div class="flex justify-between pt-5">
        <form>
            <button class="py-1 px-2 border rounded-lg bg-white">
                Pular
            </button>
        </form>

        <div>
            <x-secondary-button @click="setting = 'init'">
                voltar
            </x-secondary-button>

            <x-primary-button @click="setting = 'time'">
                próximo
            </x-primary-button>
        </div>
    </div>
</div>
