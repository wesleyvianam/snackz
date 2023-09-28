<div class="rounded-3xl bg-grey-100 dark:bg-gray-800 p-4 dark:text-white">
    <ul class="w-full">
        <li class="p-3 rounded-full px-8">
            <i class="bi bi-house-fill pe-4"></i>
            <a href="/home">Home</a>
        </li>
        @if (auth()->user()->super == 1)
            <li class="bg-gray-700 p-3 rounded-full px-8 hover:bg-gray-700">
                <i class="bi bi-people-fill pe-4"></i>
                <a href="/members">Members</a>
            </li>
            <li class="p-3 rounded-full px-8 hover:bg-gray-700">
                <i class="bi bi-list-ul pe-4"></i>
                <a href="/categories">Categories</a>
            </li>
            <li class="p-3 rounded-full px-8 hover:bg-gray-700">
                <i class="bi bi-cup-hot-fill pe-4"></i>
                <a href="/snacks">Snacks</a>
            </li>
        @endif
    </ul>
</div>
