<x-app-layout>
        <div x-data="{ activeTab: 'orders' }">
            <ul class="flex justify-center text-red-500 border-b border-red-400 dark:text-white text-center cursor-pointer">
                <li class="w-1/3 py-2"
                    @click="activeTab = 'orders'"
                    :class="{ 'rounded-t-lg text-white bg-red-500': activeTab === 'orders' }">
                    Pedidos
                </li>

                <li class="w-1/3 py-2"
                    @click="activeTab = 'resume'"
                    :class="{ 'rounded-t-lg text-white bg-red-500': activeTab === 'resume' }">
                    Pedidos detalhados
                </li>

                <li class="w-1/3 py-2"
                    @click="activeTab = 'new'"
                    :class="{ 'rounded-t-lg text-white bg-red-500': activeTab === 'new' }">
                    Novo pedido
                </li>
            </ul>
            <div class="pt-4">
                <div x-show="activeTab === 'orders'">
                    @include('orders.partials.orders')
                </div>
                <div x-show="activeTab === 'resume'">
                    @include('orders.partials.details')
                </div>
                <div x-show="activeTab === 'new'">
                    @include('orders.partials.new')
                </div>
            </div>
        </div>
</x-app-layout>
