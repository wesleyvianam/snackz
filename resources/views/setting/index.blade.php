<x-config-layout>
    <div>
        <div class="max-w-7xl mx-auto">
            @include('setting.components.header')

            <div x-data="{ setting: 'init', percent: 0 }" class="border border-red-100 rounded-xl mt-4 p-5">
                <div class="w-full h-4 mb-4 bg-red-50 rounded-full dark:bg-gray-700">
                    <div class="h-4 bg-red-500 rounded-full dark:bg-blue-500" :style="'width: ' + percent + '%'"></div>
                </div>

                <div class="">
                    <div x-show="setting == 'init'">
                        @include('setting.components.init')
                    </div>
                    <div x-show="setting == 'company'">
                        @include('setting.components.company')
                    </div>
                    <div x-show="setting == 'time'">
                        @include('setting.components.time_snack')
                    </div>
                    <div x-show="setting == 'recurrent'">
                        @include('setting.components.is_recorrent')
                    </div>
                    <div x-show="setting == 'members'">
                        @include('setting.components.members')
                    </div>
                    <div x-show="setting == 'snacks'">
                        @include('setting.components.snacks')
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--    <div class="py-12">--}}
    {{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
    {{--            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">--}}
    {{--                <div class="p-6 text-gray-900 dark:text-gray-100">--}}
    {{--                    <div class="w-full h-4 mb-4 bg-gray-200 rounded-full dark:bg-gray-700">--}}
    {{--                        <div class="h-4 bg-blue-600 rounded-full dark:bg-blue-500" style="width: 50%"></div>--}}
    {{--                    </div>--}}
    {{--                    <div class="flex">--}}
    {{--                        <div class="w-2/4 me-3">--}}
    {{--                            <h1 class="text-2xl">Cadastre categorias de lanche</h1>--}}

    {{--                            <div class="py-3">--}}
    {{--                                <x-text-input id="email"--}}
    {{--                                              class="block mt-1 w-full"--}}
    {{--                                              type="text"--}}
    {{--                                              name="email"--}}
    {{--                                              :value="old('email')"--}}
    {{--                                              required--}}
    {{--                                              autofocus--}}
    {{--                                              autocomplete="email"--}}
    {{--                                              placeholder="Name" />--}}

    {{--                                <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
    {{--                            </div>--}}



    {{--                            <div class="flex justify-end mt-4">--}}
    {{--                                <x-primary-button>--}}
    {{--                                    {{ __('Save') }}--}}
    {{--                                </x-primary-button>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                        <div class="w-2/4 border-l ms-3 px-3 ">--}}
    {{--                            <h1>Categorias cadastradas:</h1>--}}

    {{--                            <ul class="border p-3 h-32">--}}
    {{--                                <li>Nenhuma funcionario cadastrado</li>--}}
    {{--                            </ul>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}

    {{--                    <div class="w-full text-end mx-1 pt-5">--}}
    {{--                        <button class="p-1 border rounded">Next ></button>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    {{--    <div class="py-12">--}}
    {{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
    {{--            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">--}}
    {{--                <div class="p-6 text-gray-900 dark:text-gray-100">--}}
    {{--                    <div class="w-full h-4 mb-4 bg-gray-200 rounded-full dark:bg-gray-700">--}}
    {{--                        <div class="h-4 bg-blue-600 rounded-full dark:bg-blue-500" style="width: 75%"></div>--}}
    {{--                    </div>--}}
    {{--                    <div class="flex">--}}
    {{--                        <div class="w-2/4 me-3">--}}
    {{--                            <h1 class="text-2xl">Cadastre categorias seus lanches</h1>--}}

    {{--                            <div class="flex">--}}
    {{--                                <x-text-input id="title"--}}
    {{--                                              class="block mt-1 w-full"--}}
    {{--                                              type="text"--}}
    {{--                                              name="title"--}}
    {{--                                              :value="old('title')"--}}
    {{--                                              required--}}
    {{--                                              autofocus--}}
    {{--                                              autocomplete="title"--}}
    {{--                                              placeholder="Título" />--}}

    {{--                                <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}

    {{--                                <x-select-input id="email"--}}
    {{--                                              class="block mt-1 w-full"--}}
    {{--                                              type="text"--}}
    {{--                                              name="email"--}}
    {{--                                              :value="old('email')"--}}
    {{--                                              required--}}
    {{--                                              autofocus--}}
    {{--                                              autocomplete="email"--}}
    {{--                                              placeholder="Name" />--}}

    {{--                                <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
    {{--                            </div>--}}

    {{--                            <div class="flex justify-end mt-4">--}}
    {{--                                <x-primary-button>--}}
    {{--                                    {{ __('Save') }}--}}
    {{--                                </x-primary-button>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                        <div class="w-2/4 border-l ms-3 px-3 ">--}}
    {{--                            <h1>Lanches cadastrados:</h1>--}}

    {{--                            <ul class="border p-3 h-32">--}}
    {{--                                <li>Nenhuma lanche cadastrada</li>--}}
    {{--                            </ul>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}

    {{--                    <div class="w-full text-end mx-1 pt-5">--}}
    {{--                        <button class="p-1 border rounded">Next ></button>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    {{--    <div class="py-12">--}}
    {{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
    {{--            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">--}}
    {{--                <div class="p-6 text-gray-900 dark:text-gray-100 flex items-center flex-col">--}}
    {{--                    <div class="w-full h-4 mb-4 bg-gray-200 rounded-full dark:bg-gray-700">--}}
    {{--                        <div class="h-4 bg-blue-600 rounded-full dark:bg-blue-500" style="width: 100%"></div>--}}
    {{--                    </div>--}}

    {{--                    <div>--}}
    {{--                        <h1 class="text-3xl pb-5">Configuração concluída com sucesso!</h1>--}}

    {{--                        <x-primary-button>--}}
    {{--                            {{ __('Finalizar') }}--}}
    {{--                        </x-primary-button>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
</x-config-layout>
