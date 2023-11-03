@props(['data' => [], 'params' => [], 'cannotDelete' => null, 'route', 'emptyMessage'])

<ul class="rounded-lg border border-red-100 dark:border-red-200 dark:bg-gray-700">
    @if (!empty($data))
        @foreach($data as $item)
            <li class="p-2 hover:bg-gray-50 dark:hover:bg-gray-800 hover:rounded-lg flex justify-between items-center">
                @if (!empty($params))
                    @foreach($params as $param)
                        <p class="w-1/2">{{ $item->$param ?: '<? NOT_FOUND ?>' }}</p>
                    @endforeach
                @endif

                @if ($item->id != $cannotDelete)
                    <form action="{{ route("$route.destroy", $item->id) }}" method="post">
                        @csrf
                        @method('DELETE')

                        <button class="rounded py-1 px-2">
                            <i class="bi bi-trash text-red-500"></i>
                        </button>
                    </form>
                @endif
            </li>
        @endforeach
    @else
        <li class="p-2 flex justify-between items-center">
            {{ $emptyMessage }}
        </li>
    @endif
</ul>
