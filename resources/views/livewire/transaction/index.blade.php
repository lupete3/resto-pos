<div class="page-rwapper">
    @if (session('message'))
            <div class="fixed top-4 right-4 z-50 p-4 mb-4 rounded-lg shadow-md bg-white dark:bg-gray-800 max-w-sm"
                x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-90" x-init="setTimeout(() => show = false, 5000)">
                <div class="flex items-center">
                    @if (session('type') === 'success')
                    <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                    @elseif (session('type') === 'error')
                    <svg class="w-5 h-5 text-red-500 mr-3" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                            clip-rule="evenodd"></path>
                    </svg>
                    @endif
                    <div>
                        <p class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ session('message') }}</p>
                    </div>
                    <button @click="show = false" class="ml-auto text-gray-400 hover:text-gray-500">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>
        @endif
    <div class="flex flex-col md:flex-row justify-between gap-2">
        <input type="date" class="input input-bordered" wire:model.lazy='date'>
        <a href="{{ route('transaction.create') }}" class="btn btn-primary">
            <x-tabler-plus class="size-5" />
            <span>Ajouter vente</span>
        </a>
        <a href="{{ route('transaction.export') }}" class="btn btn-info" wire:navigate>
            <x-tabler-upload class="size-5" />
            <span>Exporter les données</span>
        </a>
    </div>
    <div class="table-rwapper">
        <table class="table">
            <thead>
                <th>#</th>
                <th>Date vente</th>
                <th>Prix Total</th>
                <th>Client</th>
                <th>Etat</th>
                <th>Drscription</th>
                <th class="text-center">Actions</th>
            </thead>
            <tbody>
                @forelse ($ventes as $vente)
                    <tr>
                        <td>{{ $num++ }}</td>
                        <td>{{ $vente->created_at->diffForHumans() }}</td>
                        <td>{{ $vente->price }} Fc</td>
                        <td>{{ $vente->customer->name }}</td>
                        <td>
                            <input type="checkbox" class="toggle toggle-primary toggle-sm"
                             @checked($vente->done) wire:change="isVente({{ $vente->id }})">
                        </td>
                        <td class="whitespace-normal w-80">
                            <div class="line-clamp-2">
                                {{ $vente->description }}
                            </div>
                        </td>
                        <td>
                            <div class="flex justify-center gap-1">
                                <a href="{{ route('transaction.imprimer', $vente->id) }}" class="btn btn-xs btn-square"
                                    onclick="return printFacture('{{ route('transaction.imprimer', $vente->id) }}')">
                                    <x-tabler-printer class="size-4" />
                                </a>
                                <button class="btn btn-xs btn-square" wire:click="$dispatch('detailTransaction', {transaction: {{ $vente->id }}})">
                                    <x-tabler-eye class="size-4" />
                                </button>
                                <a href="{{ route('transaction.edit', $vente->id) }}" class="btn btn-xs btn-square">
                                    <x-tabler-edit class="size-4" />
                                </a>
                                <button class="btn btn-xs btn-square" wire:click="deleteTransaction({{ $vente->id }})">
                                    <x-tabler-trash class="size-4" />
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Aucune vente trouvée</td>
                    </tr>
                @endforelse
            </tbody>
        </table>


    </div>
    {{-- <div class="table-pagination text-center ">
        {{ $ventes->links('pagination::tailwind') }}
    </div> --}}



    @livewire('transaction.detail')
</div>
