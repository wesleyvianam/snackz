<div>
    <div class="flex">
        <h1 class="text-2xl me-6">Qual o horário do lanche em sua empresa?</h1>

        <x-text-input id="email"
                      class="block mt-1"
                      type="time" name="email"
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
            <x-secondary-button @click="setting = 'company'">
                voltar
            </x-secondary-button>

            <x-primary-button @click="setting = 'recurrent'">
                próximo
            </x-primary-button>
        </div>
    </div>
</div>
