<div class="page-rwapper">
    <div class="grid md:grid-cols-3 gap-2 md:gap-6">
        <div class="card card-compact h-full">
            <div class="card-body flex-row items-center gap-3">
                <div class="avatar placeholder">
                    <div class="w-12 bg-warning rounded-full">
                        <x-tabler-calendar-month class="size-6" />
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="tex-sm opacity-70">Revenu de ce mois</div>
                    <div class="text-2xl font-bold">{{ number_format($ventesMensuelles, 2) }} Fc</div>
                </div>
            </div>
        </div>
        <div class="card card-compact h-full">
            <div class="card-body flex-row items-center gap-3">
                <div class="avatar placeholder">
                    <div class="w-12 bg-warning rounded-full">
                        <x-tabler-calendar-check class="size-6" />
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="tex-sm opacity-70">Revenu d'aujourd'hui</div>
                    <div class="text-2xl font-bold">{{ Number::format($ventesJournalieres->sum('price'), 2) }} Fc</div>
                </div>
            </div>
        </div>
        <div class="card card-compact h-full">
            <div class="card-body flex-row items-center gap-3">
                <div class="avatar placeholder">
                    <div class="w-12 bg-warning rounded-full">
                        <x-tabler-list-check class="size-6" />
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="tex-sm opacity-70">Total commandes d'aujourd'hui</div>
                    <div class="text-2xl font-bold">{{ $ventesJournalieres->count() }} Vente(s)</div>
                </div>
            </div>
        </div>
    </div>

    <div class="table-rwapper">
        <table class="table">
            <thead>
                <th>#</th>
                <th>Date vente</th>
                <th>Description</th>
                <th>Client</th>
                <th>Prix total</th>
                <th>Status</th>
                <th class="text-center">Actions</th>
            </thead>
            <tbody>
                @foreach ($ventes as $vente)
                    <tr wire:key='{{ $vente->id }}'>
                        <td>{{ $num++ }}</td>
                        <td>{{ $vente->created_at->diffForHumans() }}</td>
                        <td class="whitespace-normal w-80">
                            <div class="line-clamp-2">
                                {{ $vente->description }}
                            </div>
                        </td>
                        <td>{{ $vente->customer->name }}</td>
                        <td>{{ Number::format($vente->price, 2) }} Fc</td>
                        <td>
                            <input type="checkbox" class="toggle toggle-primary toggle-sm"
                             @checked($vente->done) wire:change="isVente({{ $vente->id }})">    
                        </td>
                        <td>
                            <div class=" justify-center ">
                                <a href="{{ route('transaction.imprimer', $vente->id) }}" class="btn btn-xs "
                                    onclick="return printFacture('{{ route('transaction.imprimer', $vente->id) }}')">
                                    <x-tabler-printer class="size-4" />
                                    <span>Imprimer</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="table-pagination text-center">
        {{ $ventes->links('vendor.livewire.tailwind') }}
    </div>

</div>
