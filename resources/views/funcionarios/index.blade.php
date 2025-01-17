<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Funcionários ({{$loja->nome}})
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded" href="{{route('funcionarios.create',['loja' => $loja->id])}}">
                Cadastrar Funcionário
            </a>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg overflow-x-auto mt-6">
                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Nome</th>
                            <th class="py-3 px-6 text-left">Email</th>
                            <th class="py-3 px-6 text-left">Loja</th>
                            <th class="py-3 px-6 text-left">Função</th>
                            <th class="py-3 px-6 text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach($funcionarios as $funcionario)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="mr-2">
                                        <i class="fas fa-users text-3xl text-blue-600"></i>
                                    </div>
                                    <span class="font-medium">{{$funcionario->nome}}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <span>{{$funcionario->email}}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center">
                                    <span>{{$funcionario->loja_nome}}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center">
                                    <span>{{$funcionario->cargo_nome}}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <a href="{{route('funcionarios.edit',['funcionario' => $funcionario->id,'loja' => $loja->id])}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </a>
                                    </div>

                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <a onclick="document.getElementById('remove_funcionario{{$funcionario->id}}').submit()" class="cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <form id="remove_funcionario{{$funcionario->id}}" method="POST" action="{{route('funcionarios.destroy',['funcionario' => $funcionario->id,'loja' => $loja->id])}}" >
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <x-alert />
            <button type="button" class="shadow bg-gray-500 hover:bg-gray-600 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" onclick=redirect("{{route('lojas.show', ['loja' => $loja->id])}}") >
                Voltar
            </button>
        </div>
    </div>
</x-app-layout>