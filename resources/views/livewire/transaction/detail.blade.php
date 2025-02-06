<div>
    <input type="checkbox" id="my_modal_6" class="modal-toggle" @checked($show) />
    
    <div class="modal" role="dialog">
        <form class="modal-box" wire:submit='ajouter'>
            <h3 class="font-bold text-lg">Détail vente </h3>
            <div class="py-4 space-y-2">
                <div class="flex flex-col">
                    <div class="text-sm opacity-50">Date vente</div>
                    <div>{{ $transaction?->created_at->format('d-m-Y à H:i') }}</div>
                </div>                
                <div class="flex flex-col">
                    <div class="text-sm opacity-50">Nom client</div>
                    <div>{{ $transaction?->customer?->name ?? '-' }}</div>
                </div>                 
                <div class="flex flex-col">
                    <div class="text-sm opacity-50">Prix total</div>
                    <div>{{ number_format($transaction?->price, 2) ?? 00.00 }} Fc</div>
                </div>  
                
                <div class="table-rwapper">
                    <table class="table">
                        <thead>
                            <th>Menu</th>
                            <th>Qte</th>
                            <th>Prix</th>
                        </thead>
                        <tbody>
                            @foreach (json_decode($transaction?->items, true) ?? [] as $key => $value)
                                <tr>
                                    <td>{{ $key }}</td>
                                    <td>{{ $value['qte'] }}</td>
                                    <td>{{ number_format($value['price'], 2) }} Fc</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-action justify-between">
                <button type="button" class="btn btn-ghost" wire:click='closeModal'>Fermer</button>
                @if(isset($transaction))
                    <a href="{{ route('transaction.imprimer', $transaction) }}" class="btn btn-primary"
                    onclick="return printFacture('{{ route('transaction.imprimer', $transaction) }}')" >
                        <x-tabler-printer class="size-5" />
                        <span>Imprimer</span>
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>
