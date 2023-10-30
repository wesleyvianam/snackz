@if(!empty($ordersResume))
    <div class="border border-red-50 dark:bg-gray-700 dark:border-gray-900 rounded-xl">
        <table class="dark:text-white w-full mb-2 rounded-b-lg">
            <thead>
                <tr class="bg-red-50 dark:bg-gray-900 rounded-t-lg">
                    <th class="rounded-tl-xl text-start py-2 px-3 w-1/2">Item</th>
                    <th class="rounded-tr-xl text-start py-2 px-3 w-1/2">Quantidade</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ordersResume as $order)
                    @foreach($order['snack'] as $snack)
                        <tr class="border-b border-red-50 dark:border-gray-800">
                            <td class="w-1/2 py-2 px-3">{{ $snack['title'] }}</td>
                            <td class="w-1/2 py-2 px-3">{{ $snack['qtd'] }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="bg-red-50 text-gray-800 border border-red-100 dark:text-gray-200 dark:bg-gray-700 rounded-xl p-3">
        <i>Nenhum pedido realizado.</i>
    </div>
@endif
