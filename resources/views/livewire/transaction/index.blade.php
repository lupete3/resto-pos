<div class="page-rwapper">
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
