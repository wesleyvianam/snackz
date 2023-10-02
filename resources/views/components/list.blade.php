@props(['data' => [], 'params' => [], 'cannotDelete' => null, 'route', 'emptyMessage'])

<ul class="rounded-lg dark:border-white bg-gray-700">
    @if (!empty($data))
        @foreach($data as $item)
            <li class="border-b border-gray-800 p-2 flex justify-between items-center">
                @if (!empty($params))
                    @foreach($params as $param)
                        <p>{{ $item->$param ?: '<? NOT_FOUND ?>' }}</p>
                    @endforeach
                @endif

                @if ($item->id != $cannotDelete)
                    <form action="{{ route("$route.destroy", $item->id) }}" method="post">
                        @csrf
                        @method('DELETE')

                        <button class="rounded py-1 px-2 bg-red-500">
                            <i class="bi bi-trash"></i>
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
