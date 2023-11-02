@if (!empty($ordersDetails))
    <div class="grid grid-cols-3 gap-4">
        @foreach($ordersDetails as $key => $order)
            <div class="border rounded-lg dark:bg-gray-600">
                <h2 class="text-center py-2 border-b font-bold text-gray-700 dark:text-white">
                    {{ $order['name'] }}
                </h2>

                <ul class="w-full px-4">
                    @foreach($order['order'] as $snack)
                        <li class="flex items-center justify-between py-1">
                            <p class="">{{ $snack['snack'] }}</p>
                            @if ($key === auth()->user()->id || auth()->user()->super)
                                <form action="{{ route("order.destroy", $snack['order_id']) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <button class="rounded py-1 px-2">
                                        <i class="bi bi-trash text-red-500"></i>
                                    </button>
                                </form>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
@else
    <div class="bg-red-50 text-gray-800 border border-red-100 dark:bg-gray-700 dark:text-gray-200 rounded-xl p-3">
        <i>Nenhum pedido realizado.</i>
    </div>
@endif

