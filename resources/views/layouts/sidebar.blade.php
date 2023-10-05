<div class="rounded-3xl bg-white dark:bg-gray-800 p-4 text-gray-900 dark:text-white">
    <ul class="w-full">
        <li class="p-2 my-1 rounded-full px-8 hover:bg-gray-100 dark:hover:bg-gray-700 @if(Request::is('home')) bg-gray-100 dark:bg-gray-700 @endif">
            <i class="bi bi-house-fill pe-4"></i>
            <a href="/home">Home</a>
        </li>
        @if (auth()->user()->super)
            <li class="p-2 my-1 rounded-full px-8 hover:bg-gray-100 dark:hover:bg-gray-700 @if(Request::is('members')) bg-gray-100 dark:bg-gray-700 @endif">
                <i class="bi bi-people-fill pe-4"></i>
                <a href="/members">Members</a>
            </li>
            <li class="p-2 my-1 rounded-full px-8 hover:bg-gray-100 dark:hover:bg-gray-700 @if(Request::is('categories')) bg-gray-100 dark:bg-gray-700 @endif">
                <i class="bi bi-list-ul pe-4"></i>
                <a href="/categories">Categories</a>
            </li>
            <li class="p-2 my-1 rounded-full px-8 hover:bg-gray-100 dark:hover:bg-gray-700 @if(Request::is('snacks')) bg-gray-100 dark:bg-gray-700 @endif">
                <i class="bi bi-cup-hot-fill pe-4"></i>
                <a href="/snacks">Snacks</a>
            </li>
        @endif
    </ul>
</div>
