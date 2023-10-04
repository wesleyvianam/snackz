<div class="bg-gray-700 rounded-xl p-3">
    <h1 class=" text-center text-3xl font-bold mb-3">
        Order
    </h1>
{{--        <h1 class="text-xl font-bold mb-2">--}}
{{--            {{ $order["title"] }}--}}
{{--        </h1>--}}

    <table class="text-white w-full mb-4 rounded-b-lg">
        <thead>
            <tr class="bg-gray-900 rounded-t-lg">
                <th class="rounded-s-lg text-start py-2 px-3 w-1/2">Item</th>
                <th class="rounded-e-lg text-start py-2 px-3 w-1/2">Qtd</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ordersResume as $order)
                @foreach($order['snack'] as $snack)
                    <tr>
                        <td class="w-1/2 py-1 px-3">{{ $snack['title'] }}</td>
                        <td class="w-1/2 py-1 px-3">{{ $snack['qtd'] }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
