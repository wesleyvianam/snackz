<style>
    li {
        cursor: pointer;
        padding: 8px 16px;
    }
</style>

<x-app-layout>
        <div x-data="{ activeTab: 'orders' }" class="">
            <ul class="flex justify-center border-b text-center">
                <li class="w-1/3"
                    @click="activeTab = 'orders'"
                    :class="{ 'rounded-t-lg text-white bg-gray-800 dark:bg-gray-200 dark:text-black': activeTab === 'orders' }">
                    Pedidos
                </li>

                <li class="w-1/3"
                    @click="activeTab = 'resume'"
                    :class="{ 'rounded-t-lg text-white bg-gray-800 dark:bg-gray-200 dark:text-black': activeTab === 'resume' }">
                    Pedidos detalhados
                </li>

                <li class="w-1/3"
                    @click="activeTab = 'new'"
                    :class="{ 'rounded-t-lg text-white bg-gray-800 dark:bg-gray-200 dark:text-black': activeTab === 'new' }">
                    Novo pedido
                </li>
            </ul>

            <div class="py-4">
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
