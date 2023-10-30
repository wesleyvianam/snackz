<x-app-layout>
    <div x-data="{ activeTab: 'profile' }" class="">
        <ul class="flex justify-center text-red-500 border-b border-red-400 dark:text-white text-center cursor-pointer">
            <li class="w-1/2 py-2"
                @click="activeTab = 'profile'"
                :class="{ 'rounded-t-lg text-white bg-red-500': activeTab === 'profile' }">
                Perfil
            </li>

            <li class="w-1/3 py-2"
                @click="activeTab = 'password'"
                :class="{ 'rounded-t-lg text-white bg-red-500': activeTab === 'password' }">
                Password
            </li>

            <li class="w-1/2 py-2"
                @click="activeTab = 'account'"
                :class="{ 'rounded-t-lg text-white bg-red-500': activeTab === 'account' }">
                Conta
            </li>
        </ul>

        <div class="pt-4">
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
</x-app-layout>
