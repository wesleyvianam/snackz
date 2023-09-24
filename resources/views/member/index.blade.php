<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 dark:text-white">
            <ul class="border rounded dark:border-white">
                <li class="border-b p-2 flex justify-between items-center">
                    <h1 class="text-2xl font-bold">Members</h1>

                    <x-primary-button x-data=""
                        class="w-28"
                        x-on:click.prevent="$dispatch('open-modal', 'modal-member')">
                        New
                    </x-primary-button>

                    @include('member.partials.modal-create')
                </li>
                @foreach($members as $member)
                    <li class="border-b p-2 flex justify-between items-center">
                        <p>{{ $member->name }}</p>

                        @if($member->id != auth()->user()->id)
                            <form action="{{ route('member.destroy', $member->id) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <button class="rounded py-1 px-2 bg-red-500">Deletar</button>
                            </form>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
