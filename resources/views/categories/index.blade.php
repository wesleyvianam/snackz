<x-app-layout>
    <div class="flex justify-between items-center pb-3">
        <h1 class="text-2xl font-bold">Categories</h1>

         <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'modal-category')">New</x-primary-button>

        @include('categories.partials.modal-create')
    </div>

    <x-list
        route="categories"
        :data="$categories"
        :params="['title']"
        emptyMessage="Nenhuma categoria cadastrada"
    />
</x-app-layout>
