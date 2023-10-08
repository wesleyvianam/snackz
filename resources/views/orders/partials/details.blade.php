@if (!empty($ordersDetails))
    <div class="grid grid-cols-3 gap-4">
        @foreach($ordersDetails as $order)
            <div class="border rounded-lg bg-red-50 dark:bg-gray-600">
                <h2 class="text-center py-2">{{ $order['name'] }}</h2>
                <hr>
                <ul class="w-full dark:text-white mx-4">
                    <li class="flex items-center justify-between">
                        <p class="text-start text-bold">Item</p>
                        <p class="prn-10 text-bold">Qtd</p>
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

