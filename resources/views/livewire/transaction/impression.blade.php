<div class="page-rwapper">

    <div class="max-w-sm mx-auto space-y-8">

        <div class="bg-white rounded-lg shadow-lg px-8 py-10 max-w-xl mx-auto">
            <div class="text-center">
                <div class="font-bold text-xl mb-2">{{ config('app.name') }}</div>
                <div class="text-gray-700 text-sm mb-1">Congo RD, Av P.E Lumumba</div>
                <div class="text-gray-700 text-sm mb-1">N° RCCM : 98765</div>
                <div class="text-gray-700 text-sm mb-2">N° Impôt : 483-A-3092</div>
                <div class="text-gray-700 text-sm mb-2">Tél : +243 987 676 238</div>
            </div>
            ==================================
            <div class="text-gray-700 text-center">
                <div class="text-sm">Facture : #{{ $transaction->id }}987676</div>
                <div class="text-sm">Date: {{ $transaction->created_at->format('d-m-Y à H:i') }}</div>
                <div class="text-sm">Client : {{ $transaction->customer?->name }}</div>
            </div>
            ==================================
           
            <table class="w-full mb-2">
                <div class="">
                    <tr class="text-sm text-left">
                        <th class="text-gray-700 font-bold">Designation</th>
                        <th class="text-gray-700 font-bold">Prix</th>
                        <th class="text-gray-700 font-bold">Qte</th>
                        <th class="text-gray-700 font-bold">Total</th>
                    </tr>
                </div>
                <tbody>
                    <div class="sy-2">
                   
                        @foreach (json_decode($transaction->items, true) as $name => $vente)
                            <tr class="text-sm">
                                <td class="py-1 text-gray-700">{{ $name }}</td>
                                <td class="py-1 text-gray-700">{{ $vente['price'] / $vente['qte'] }} </td>
                                <td class="py-1 text-gray-700">{{ $vente['qte'] }}</td>
                                <td class="py-1 text-gray-700">{{ $vente['price'] }}</td>
                            </tr>
                        @endforeach
                    </div>
                </tbody>
            </table>
            @php
                $tax = ($vente['price'] * 16) / 100;
            @endphp
            <div class="flex justify-end mb-2">
                <div class="text-gray-700 mr-2">Sous-total:</div>
                <div class="text-gray-700">{{ Number::format($vente['price'] - $tax, 2)}} CDF</div>
            </div>
            <div class="flex justify-end mb-2">
                <div class="text-gray-700 mr-2">TVA:</div>
                <div class="text-gray-700">{{ Number::format($tax, 2) }} CDF</div>
        
            </div>
            <div class="flex justify-end mb-4">
                <div class="text-gray-700 mr-2">Total:</div>
                <div class="text-gray-700 font-bold text-lg">{{ Number::format($vente['price'], 2) }} CDF</div>
            </div>
            <div class="border-t-2 border-gray-300 pt-8 mb-4 text-center">
                <div class="text-gray-700 mb-2 text-sm">Merci pour votre visite et à bientôt!</div>
            </div>
        </div>

        <div>
            
        </div>

    </div>

</div>


