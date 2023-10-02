<x-app-layout>
    <div class="flex justify-between items-center pb-3">
        <h1 class="text-2xl font-bold">Members</h1>

        <x-primary-button x-data="" class="w-28" x-on:click.prevent="$dispatch('open-modal', 'modal-member')">New</x-primary-button>

        @include('members.partials.modal-create')
    </div>

    <x-list
        route="members"
        :data="$members"
        :params="['name']"
    />
</x-app-layout>
