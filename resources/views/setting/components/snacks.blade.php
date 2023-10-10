<div class="flex justify-between pt-5">
    <form>
        <button class="py-1 px-2 border rounded-lg bg-white">
            Pular
        </button>
    </form>

    <div>
        <x-secondary-button @click="setting = 'member'; percent -= 15">
            voltar
        </x-secondary-button>

        <x-primary-button @click="setting = ''; percent += 15">
            próximo
        </x-primary-button>
    </div>
</div>
