<style>
    input[type=number]::-webkit-inner-spin-button {
        -webkit-appearance: none;

    }
    input[type=number] {
        -moz-appearance: textfield;
        appearance: textfield;

    }
</style>

<form action="{{ route('home.store') }}" method="post" class="mb-0">
    @csrf

    <div class="dark:bg-gray-700 border border-red-100 dark:border-gray-500 pt-3 px-3 rounded-xl">
        @foreach($categories as $category)
            <div class="mb-4">
                @if (!empty($category->snacks[0]))
                    <h2 class="text-xl font-bold text-red-500">{{ $category->title.':' }}</h2>

                    <div class="flex items-center pt-2">
                        @foreach($category->snacks as $snack)
                            <div class="flex items-center mr-4">
                                <input type="radio" value="{{ $snack->id }}" id="{{ $snack->name }}" name="{{$category->title}}[{{ $category->title }}]" class="w-5 h-5 text-red-600 bg-white border-gray-300 focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="{{ $snack->name }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $snack->name }}</label>
                            </div>
                        @endforeach

                        @if ($category->accept_quantity)
                            <div class="flex items-center">
                                <input type="number" value="1" id="quant" name="{{$category->title}}[quantity]" class="w-12 h-6 text-gray-900 rounded-lg"/>
                                <label for="quant" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Quantidade</label>
                            </div>
                        @endif
                    </div>
                @endif
            </div>
        @endforeach

        <div x-data="{ active: false }">
            <h2 class="text-xl font-bold text-red-500">
                Pedido recorrente:
            </h2>

            <label class="mt-2 mb-4 relative inline-flex items-center cursor-pointer">
                <input @click="active = !active" id="recurrent" name="recurrent" type="checkbox" value="1" class="sr-only peer">
                <div class="w-11 h-6 bg-red-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-orange-200 dark:peer-focus:ring-red-300 rounded-full peer dark:bg-gray-500 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-red-500"></div>
                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Recorrente</span>
            </label>

            <p x-show="active" class=" mb-3 text-sm p-2 border border-red-300 bg-white dark:bg-gray-800 rounded-lg text-gray-800">
                <i class="bi bi-exclamation-triangle-fill text-red-500 pe-1"></i>
                Ao escolher que o pedido seja recorrente, todos os dias esse pedido será realizado, caso em algum dia
                você não queira pedir, terá que desativar ou excluir o pedido caso já tenha sido pedido.
            </p>
        </div>
    </div>

    <div class="flex justify-end mt-4">
        <x-secondary-button class="me-1">Limpar</x-secondary-button>

        <x-primary-button>Salvar</x-primary-button>
    </div>
</form>


