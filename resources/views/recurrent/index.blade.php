<x-app-layout>
    <div class="flex justify-between items-center pb-3">
        <h1 class="text-2xl font-bold">Pedidos Recorrentes</h1>
    </div>

    <ul class="rounded-lg border border-red-100 dark:border-red-200 dark:bg-gray-700">
        @if (!empty($orders))
            @foreach($orders as $order)
                <li class="p-3">
                    <h2 class="border-b">
                        {{ $order['title'] }}
                    </h2>

                    @foreach($order['orders'] as $snack)
                        <span class="p-2 px-4 flex items-center justify-between hover:bg-red-50">
                            {{ $snack['title'] }}

                            <form action="{{ route('recurrent.update', $snack['id']) }}" method="post">
                                @csrf
                                @method('PUT')

                                <button class="rounded py-1 px-2">
                                    <i class="bi bi-trash text-red-500"></i>
                                </button>
                            </form>
                        </span>
                    @endforeach
                </li>
            @endforeach
        @else
            <div class="bg-red-50 text-gray-800 border border-red-100 dark:text-gray-200 dark:bg-gray-700 rounded-xl p-3">
                <i>Nenhum item recorrente.</i>
            </div>
        @endif
    </ul>
</x-app-layout>
