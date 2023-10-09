<div>
    <div x-data="{ active: false }">
        <div class="flex">
            <h1 class="text-2xl me-6">Sua empresa fará pedido recorrente?</h1>

            <label class="mt-2 mb-4 relative inline-flex items-center cursor-pointer">
                <input @click="active = !active" id="recurrent" name="recurrent" type="checkbox" value="1" class="sr-only peer">
                <div class="w-11 h-6 bg-red-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-orange-200 dark:peer-focus:ring-red-300 rounded-full peer dark:bg-gray-500 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-red-500"></div>
                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Recorrente</span>
            </label>
        </div>

        <p x-show="active" class=" mb-3 text-sm p-2 border border-red-300 bg-white dark:bg-gray-800 rounded-lg text-gray-800">
            <i class="bi bi-exclamation-triangle-fill text-red-500 pe-1"></i>
            Ao escolher que o pedido seja recorrente, todos os dias esse pedido será realizado, caso em algum dia
            você não queira pedir, terá que desativar ou excluir o pedido caso já tenha sido pedido.
        </p>
    </div>

    <div class="flex justify-between pt-5">
        <form>
            <button class="py-1 px-2 border rounded-lg bg-white">
                Pular
            </button>
        </form>

        <div>
            <x-secondary-button @click="setting = 'time'">
                voltar
            </x-secondary-button>

            <x-primary-button @click="setting = 'members'">
                próximo
            </x-primary-button>
        </div>
    </div>
</div>
