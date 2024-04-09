<style>
    .pro, .basic {
        width: 300px;
        border-radius: 10px;
        padding: 20px;
    }

    .basic {
        margin-right: 15px;
    }
</style>

<x-app-layout>
    <div class="flex justify-between items-center pb-3">
        <h1 class="text-2xl font-bold">Seja Premium</h1>
    </div>

    <p class="pb-3">Escolha o plano que mais faz sentido para sua empresa</p>

    <div class="flex justify-center pb-3">
        <a class="basic border me-4 hover:bg-gray-50" href="#">
            <div class="text-center pb-3">
                <h2 class="font-bold text-xl">BASIC</h2>
            </div>

            <ul class="pb-3">
                <li>- 3 Equipes</li>
                <li>- 3 Categorias</li>
                <li>- 5 Opções de Cardápio</li>
            </ul>

            <p class="text-center text-3xl font-bold text-red-500">
                9,97
            </p>
        </a>

        <a class="pro border hover:bg-gray-50" href="#">
            <div class="flex justify-center items-center pb-3">
                <h2 class="pe-1 font-bold text-xl">PRO</h2>
                <small>Recomendado</small>
            </div>

            <ul class="pb-3">
                <li>- Equipes Ilimitadas</li>
                <li>- Categorias ilimitadas</li>
                <li>- Opções de Cardápio Ilimitadas</li>
            </ul>

            <p class="text-center text-3xl font-bold text-red-500">
                24,97
            </p>
        </a>
    </div>

    <div class="flex justify-center items-center pt-3">
        <x-primary-button>Continuar</x-primary-button>
    </div>
</x-app-layout>
