@props(['data', 'route', 'emptyMessage'])

<ul class="rounded-lg dark:border-white bg-gray-700">
    @if (!empty($data))
        @foreach($data as $item)
            <li class="border-b border-gray-800 p-2 flex justify-between items-center">
                <p>{{ $item->name ?: $item->title }}</p>

                <form action="{{ route("$route.destroy", $item->id) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <button class="rounded py-1 px-2 bg-red-500">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </li>
        @endforeach
    @else
        <li class="p-2 flex justify-between items-center">
            {{ $emptyMessage }}
        </li>
    @endif
</ul>
