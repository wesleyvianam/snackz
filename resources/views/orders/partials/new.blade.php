<form action="{{ route('home.store') }}" method="post">
    @csrf

    @foreach($categories as $category)
        <div class="mb-4">
            <h2 class="text-3xl font-bold">{{ $category->title }}</h2>

            @foreach($category->snacks as $snack)
                <div>
                    <label for="{{ $snack->name }}">{{ $snack->name }}</label>
                    <input type="radio" id="{{ $snack->name }}" name="{{ $category->title }}" value="{{ $snack->id }}" />
                </div>
            @endforeach
        </div>
    @endforeach

    <div class="mb-4">
        <h2 class="text-3xl font-bold">Seu pedido será recorrent?</h2>
        <p>lorem impson</p>
        <label for="recurrent">Is recurrent</label>
        <input type="checkbox" id="recurrent" name="recurrent" />
    </div>

    <x-primary-button class="float-right">Save</x-primary-button>
</form>
