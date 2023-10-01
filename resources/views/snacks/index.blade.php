<x-app-layout>
    <div class="flex justify-between items-center pb-3">
        <h1 class="text-2xl font-bold">Snacks</h1>

         <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'modal-snacks')">New</x-primary-button>

        @include('snacks.partials.modal-create', $formatCategories)
    </div>

    <ul class="rounded dark:border-white bg-gray-700">
        @if (!empty($snacks))
            @foreach($snacks as $snack)
                <li class="border-b p-2 flex justify-between items-center">
                    <p>{{ $snack->name }}</p>

                    <form action="{{ route('snacks.destroy', $snack->id) }}" method="post">
                        @csrf
                        @method('DELETE')

                        <button class="rounded py-1 px-2 bg-red-500">Deletar</button>
                    </form>
                </li>
            @endforeach
        @else
            <li class="p-2 flex justify-between items-center">
                Nenhum lanche cadastrado
            </li>
        @endif
    </ul>
</x-app-layout>
