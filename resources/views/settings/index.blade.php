<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex items-center flex-col">
                    <div class="w-full h-4 mb-4 bg-gray-200 rounded-full dark:bg-gray-700">
                        <div class="h-4 bg-blue-600 rounded-full dark:bg-blue-500" style="width: 0"></div>
                    </div>

                    <div>
                        <h1 class="text-3xl pb-5">Iniciar configuração de workspace</h1>

                        <x-primary-button>
                            {{ __('Iniciar') }}
                        </x-primary-button>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--    <div class="py-12">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">--}}
{{--                <div class="p-6 text-gray-900 dark:text-gray-100 flex items-center flex-col">--}}
{{--                    <div class="w-full h-4 mb-4 bg-gray-200 rounded-full dark:bg-gray-700">--}}
{{--                        <div class="h-4 bg-blue-600 rounded-full dark:bg-blue-500" style="width: 2%"></div>--}}
{{--                    </div>--}}

{{--                    <h1 class="text-2xl">Qual o nome da sua empresa?</h1>--}}

{{--                    <div class="w-1/3 py-3">--}}
{{--                        <x-text-input id="email"--}}
{{--                            class="block mt-1 w-full"--}}
{{--                            type="text" name="email"--}}
{{--                            :value="old('email')"--}}
{{--                            required--}}
{{--                            autofocus--}}
{{--                            autocomplete="email"--}}
{{--                            placeholder="Nome da empresa" />--}}

{{--                        <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
{{--                    </div>--}}

{{--                    <div class="w-1/3 text-end">--}}
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
{{--                        <div class="h-4 bg-blue-600 rounded-full dark:bg-blue-500" style="width: 25%"></div>--}}
{{--                    </div>--}}

{{--                    <div class="flex">--}}
{{--                        <div class="w-2/4 me-3">--}}
{{--                            <h1 class="text-2xl">Cadastre sua equipe</h1>--}}

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

{{--                            <div class="py-3">--}}
{{--                                <x-text-input id="email"--}}
{{--                                              class="block mt-1 w-full"--}}
{{--                                              type="text"--}}
{{--                                              name="username"--}}
{{--                                              :value="old('username')"--}}
{{--                                              required--}}
{{--                                              autofocus--}}
{{--                                              autocomplete="username"--}}
{{--                                              placeholder="username" />--}}

{{--                                <x-input-error :messages="$errors->get('username')" class="mt-2" />--}}
{{--                            </div>--}}

{{--                            <div class="py-3">--}}
{{--                                <x-text-input id="email"--}}
{{--                                              class="block mt-1 w-full"--}}
{{--                                              type="text"--}}
{{--                                              name="email"--}}
{{--                                              :value="old('email')"--}}
{{--                                              required--}}
{{--                                              autofocus--}}
{{--                                              autocomplete="email"--}}
{{--                                              placeholder="email" />--}}

{{--                                <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
{{--                            </div>--}}

{{--                            <div class="flex justify-end mt-4">--}}
{{--                                <x-primary-button>--}}
{{--                                    {{ __('Save') }}--}}
{{--                                </x-primary-button>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="w-2/4 border-l ms-3 px-3 ">--}}
{{--                            <h1>Pessoas cadastradas:</h1>--}}

{{--                            <ul class="border p-3 h-64">--}}
{{--                                <li>Nenhuma pessoa cadastrada</li>--}}
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
</x-app-layout>
