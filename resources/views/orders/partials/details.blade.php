@if (!empty($ordersDetails))
    <div class="grid grid-cols-3 gap-4">
        @foreach($ordersDetails as $order)
            <div class="border rounded-lg dark:bg-gray-600">
                <h2 class="text-center py-2 border-b font-bold text-gray-700 dark:text-white">
                    {{ $order['name'] }}
                </h2>

                <ul class="w-full px-4">
                    <li class="flex items-center dark:text-white justify-between font-bold text-gray-700">
                        <p>Item</p>
                        <p>Quantidade</p>
                    </li>

                    @foreach($order['snack'] as $snack)
                        <li class="flex items-center justify-between">
                            <p class="">{{ $snack }}</p>
                            <p class="pr-10">1</p>
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

