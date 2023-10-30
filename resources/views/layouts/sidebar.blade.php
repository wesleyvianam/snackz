<div class="rounded-3xl bg-white dark:bg-gray-800 px-4 py-3 text-gray-900 dark:text-white">
    <ul class="w-full hidden md:block">
        <li class="p-2 my-1 rounded-2xl px-4 hover:bg-red-50 text-lg dark:hover:bg-gray-700 @if(Request::is('home')) bg-red-100 dark:bg-gray-700 @endif">
            <i class="bi bi-house-fill pe-2 text-red-400"></i>
            <a href="/home">Home</a>
        </li>
        <li class="p-2 my-1 rounded-2xl px-4 hover:bg-red-50 text-lg dark:hover:bg-gray-700 @if(Request::is('recurrent')) bg-red-100 dark:bg-gray-700 @endif">
            <i class="ri-refresh-fill pe-2 text-red-400"></i>
            <a href="/recurrent">Recorrente</a>
        </li>
        @if (auth()->user()->super)
            <li class="p-2 my-1 rounded-2xl px-4 hover:bg-red-50 text-lg dark:hover:bg-gray-700 @if(Request::is('members')) bg-red-100 dark:bg-gray-700 @endif">
                <i class="ri-user-fill pe-2 text-red-400"></i>
                <a href="/members">Members</a>
            </li>
            <li class="p-2 my-1 rounded-2xl px-4 hover:bg-red-50 text-lg dark:hover:bg-gray-700 @if(Request::is('categories')) bg-red-100 dark:bg-gray-700 @endif">
                <i class="ri-list-indefinite pe-2 text-red-400"></i>
                <a href="/categories">Categories</a>
            </li>
            <li class="p-2 my-1 rounded-2xl px-4 hover:bg-red-50 text-lg dark:hover:bg-gray-700 @if(Request::is('snacks')) bg-red-100 dark:bg-gray-700 @endif">
                <i class="bi bi-cup-hot-fill pe-2 text-red-400"></i>
                <a href="/snacks">Snacks</a>
            </li>
        @endif
    </ul>

    {{-- Responsible --}}
    <ul class="w-full md:hidden">
        <li class="p-2 my-1 rounded-2xl hover:bg-red-50 text-lg dark:hover:bg-gray-700 @if(Request::is('home')) bg-red-100 dark:bg-gray-700 @endif">
            <a href="/home">
                <i class="bi bi-house-fill px-2 text-red-400"></i>
            </a>
        </li>
        <li class="p-2 my-1 rounded-2xl hover:bg-red-50 text-lg dark:hover:bg-gray-700 @if(Request::is('recurrent')) bg-red-100 dark:bg-gray-700 @endif">
            <a href="/recurrent">
                <i class="ri-refresh-fill px-2 text-red-400"></i>
            </a>
        </li>
        @if (auth()->user()->super)
            <li class="p-2 my-1 rounded-2xl hover:bg-red-50 text-lg dark:hover:bg-gray-700 @if(Request::is('members')) bg-red-100 dark:bg-gray-700 @endif">
                <a href="/members">
                    <i class="ri-user-fill px-2 text-red-400"></i>
                </a>
            </li>
            <li class="p-2 my-1 rounded-2xl hover:bg-red-50 text-lg dark:hover:bg-gray-700 @if(Request::is('categories')) bg-red-100 dark:bg-gray-700 @endif">
                <a href="/categories">
                    <i class="ri-list-indefinite px-2 text-red-400"></i>
                </a>
            </li>
            <li class="p-2 my-1 rounded-2xl hover:bg-red-50 text-lg dark:hover:bg-gray-700 @if(Request::is('snacks')) bg-red-100 dark:bg-gray-700 @endif">
                <a href="/snacks">
                    <i class="bi bi-cup-hot-fill px-2 text-red-400"></i>
                </a>
            </li>
        @endif
    </ul>
</div>
