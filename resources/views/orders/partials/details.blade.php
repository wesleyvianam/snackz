<h1 class="text-xl font-bold mb-4">
    Orders
</h1>
<div class="grid grid-cols-3 gap-4">
    @foreach($ordersDetails as $order)
{{--        @dd($order)--}}
        <div class="border rounded-lg bg-gray-600">
            <h2 class="text-center py-2">{{ $order['name'] }}</h2>
            <hr>
            <ul class="w-full dark:text-white mx-4">
                <li class="flex items-center justify-between">
                    <p class="text-start text-bold">Item</p>
                    <p class="pr-10 text-bold">Qtd</p>
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
