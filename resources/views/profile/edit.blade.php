<style>
    li {
        cursor: pointer;
        padding: 8px 16px;
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div x-data="{ activeTab: 'tab1' }">
                <ul class="flex dark:text-white">
                    <li @click="activeTab = 'tab1'" :class="{ 'bg-blue-500': activeTab === 'tab1' }">Tab 1</li>
                    <li @click="activeTab = 'tab2'" :class="{ 'bg-blue-500': activeTab === 'tab2' }">Tab 2</li>
                    <li @click="activeTab = 'tab3'" :class="{ 'bg-blue-500': activeTab === 'tab3' }">Tab 3</li>
                </ul>

                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <div x-show="activeTab === 'tab1'">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                        <div x-show="activeTab === 'tab2'">
                            @include('profile.partials.update-password-form')
                        </div>
                        <div x-show="activeTab === 'tab3'">
                            @include('profile.partials.delete-user-form')
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
