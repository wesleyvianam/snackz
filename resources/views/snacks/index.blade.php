<x-app-layout>
    <div class="flex justify-between items-center pb-3">
        <h1 class="text-2xl font-bold">Snacks</h1>

         <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'modal-snacks')">New</x-primary-button>

        @include('snacks.partials.modal-create', $formatCategories)
    </div>

    <x-list route="snacks"
        :data="$snacks"
        :params="[
            'name',
            'category'
        ]"
        emptyMessage="Nenhum lanche cadastrado"
    />
</x-app-layout>
