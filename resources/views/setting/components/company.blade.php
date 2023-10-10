<div>
    <div class="flex items-center">
        <h1 class="text-2xl w-3/5">Qual o nome da sua empresa?</h1>

        <x-text-input id="name"
                      class="block mt-1 w-full"
                      type="text"
                      name="name"
                      :value="old('name')"
                      required
                      autofocus
                      autocomplete="name"
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
            <x-secondary-button @click="setting = 'init'; percent = 1">
                voltar
            </x-secondary-button>

            <x-primary-button id="next" @click="setting = 'time'; percent += 15">
                próximo
            </x-primary-button>
        </div>
    </div>
</div>

<script>
    const next = document.querySelector("#next");
    const name = document.querySelector("#name").value;

    console.log("I HERE");

    next.addEventListener("click", () => {
        console.log(name);

        fetch('{{ route('company.store') }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                name: name
            })

        })
        .then(data => {
            console.log(data);
        })
        .catch(error => {
            console.error('Erro na requisição:', error);
        });
    });
</script>
