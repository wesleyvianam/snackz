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
            <div x-data="{ activeTab: 'members' }" class="flex justify-between">
                <div class="w-1/4 border rounded me-5">
                    <ul class="dark:text-white h-full">
                        <li @click="activeTab = 'members'" :class="{ 'bg-gray-800 dark:bg-gray-200 dark:text-black': activeTab === 'members' }">Members</li>
                        <li @click="activeTab = 'categories'" :class="{ 'bg-gray-800 dark:bg-gray-200 dark:text-black': activeTab === 'categories' }">Categories</li>
                        <li @click="activeTab = 'snacks'" :class="{ 'bg-gray-800 dark:bg-gray-200 dark:text-black': activeTab === 'snacks' }">Snacks</li>
                        <li @click="activeTab = 'profile'" :class="{ 'bg-gray-800 dark:bg-gray-200 dark:text-black': activeTab === 'profile' }">Profile</li>
                        <li @click="activeTab = 'password'" :class="{ 'bg-gray-800 dark:bg-gray-200 dark:text-black': activeTab === 'password' }">Password</li>
                        <li @click="activeTab = 'account'" :class="{ 'bg-gray-800 dark:bg-gray-200 dark:text-black': activeTab === 'account' }">Account</li>
                    </ul>
                </div>

                <div class="w-3/4 p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg flex justify-center">
                    <div class="max-w-">
                        <div x-show="activeTab === 'members'">
                            @include('profile.partials.members-management')
                        </div>
                        <div x-show="activeTab === 'profile'">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                        <div x-show="activeTab === 'password'">
                            @include('profile.partials.update-password-form')
                        </div>
                        <div x-show="activeTab === 'account'">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
