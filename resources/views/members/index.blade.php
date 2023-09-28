<x-app-layout>
    <div class="flex justify-between items-center pb-3">
        <h1 class="text-2xl font-bold">Members</h1>

        <x-primary-button x-data="" class="w-28" x-on:click.prevent="$dispatch('open-modal', 'modal-member')">New</x-primary-button>

        @include('members.partials.modal-create')
    </div>
    <ul class="rounded dark:border-white bg-gray-700">
        @foreach($members as $member)
            <li class="border-b p-2 flex justify-between items-center">
                <p>{{ $member->name }}</p>

                @if($member->id != auth()->user()->id)
                    <form action="{{ route('members.destroy', $member->id) }}" method="post">
                        @csrf
                        @method('DELETE')

                        <button class="rounded py-1 px-2 bg-red-500">Deletar</button>
                    </form>
                @endif
            </li>
        @endforeach
    </ul>
</x-app-layout>
