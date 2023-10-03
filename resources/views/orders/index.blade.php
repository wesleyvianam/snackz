<style>
    li {
        cursor: pointer;
        padding: 8px 16px;
    }
</style>

<x-app-layout>
        <div x-data="{ activeTab: 'resume' }" class="">
            <ul class="dark:text-white flex justify-center border-b">
                <li @click="activeTab = 'orders'" :class="{ 'rounded-t-lg bg-gray-800 dark:bg-gray-200 dark:text-black': activeTab === 'orders' }">Orders</li>
                <li @click="activeTab = 'resume'" :class="{ 'rounded-t-lg bg-gray-800 dark:bg-gray-200 dark:text-black': activeTab === 'resume' }">Details</li>
                <li @click="activeTab = 'new'" :class="{ 'rounded-t-lg bg-gray-800 dark:bg-gray-200 dark:text-black': activeTab === 'new' }">New</li>
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
