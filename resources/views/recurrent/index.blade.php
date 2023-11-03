<x-app-layout>
    <div class="flex justify-between items-center pb-3">
        <h1 class="text-2xl font-bold">Pedidos Recorrentes</h1>
    </div>

    @if (!empty($orders))
        <div class="grid {{ auth()->user()->super ? 'grid-cols-2' : 'grid-cols-1' }} gap-4">
            @foreach($orders as $key => $order)
                <div class="border rounded-lg dark:bg-gray-600">
                    <h2 class="text-center py-2 border-b font-bold text-gray-700 dark:text-white">
                        {{ $order['title'] }}
                    </h2>

                    <ul class="w-full px-4">
                        @foreach($order['orders'] as $snack)
                            <li class="flex items-center justify-between py-1">
                                <p class="w-2/5">{{ $snack['title'] }}</p>

                                <p class="w-1/5">{{ $snack['quantity'] }}</p>

                                <div class="w-2/5">
                                    <span class="bg-indigo-100 text-indigo-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-indigo-400 border border-indigo-400">
                                        {{ $snack['category'] }}
                                    </span>
                                </div>

                                <form action="{{ route('recurrent.update', $snack['id']) }}" method="post">
                                    @csrf
                                    @method('PUT')

                                    <button class="rounded py-1 px-2">
                                        <i class="bi bi-trash text-red-500"></i>
                                    </button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    @else
        <div class="bg-red-50 text-gray-800 border border-red-100 dark:bg-gray-700 dark:text-gray-200 rounded-xl p-3">
            <i>Nenhum pedido recorrente.</i>
        </div>
    @endif
</x-app-layout>
