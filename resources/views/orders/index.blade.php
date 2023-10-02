<x-app-layout>
    @foreach($menu as $item)
        <h1 class="text-3xl font-bold">
            {{ $item->title }}
        </h1>

        @foreach($item->snacks as $snack)
            <p>{{ $snack->name }}</p>
        @endforeach
    @endforeach
</x-app-layout>
