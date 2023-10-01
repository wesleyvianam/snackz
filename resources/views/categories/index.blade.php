<x-app-layout>
    <div class="flex justify-between items-center pb-3">
        <h1 class="text-2xl font-bold">Categories</h1>

         <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'modal-category')">New</x-primary-button>

        @include('categories.partials.modal-create')
    </div>

    <ul class="rounded dark:border-white bg-gray-700">
        @foreach($categories as $category)
            <li class="border-b p-2 flex justify-between items-center">
                <p>{{ $category->title }}</p>

                <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <button class="rounded py-1 px-2 bg-red-500">Deletar</button>
                </form>
            </li>
        @endforeach
    </ul>
</x-app-layout>
