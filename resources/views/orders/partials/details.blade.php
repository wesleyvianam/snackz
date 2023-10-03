<h1 class="text-xl font-bold">
    Orders
</h1>
<div class="grid grid-cols-3 gap-4">
    @foreach($orders as $order)
        <div class="border rounded-lg">
            <h2 class="text-center">{{ $order->member }}</h2>
            <table class="border-t w-full dark:text-white">
                <thead>
                    <tr>
                       <th>Item</th>
                       <th>Qtd</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="m-3">{{ $order->snack }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endforeach
</div>
