<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Component;

class Home extends Component
{
    public $num = 1;
    
    public function isVente(Transaction $transaction)
    {
        $transaction->done = !$transaction->done;
        $transaction->save();
    }

    
    public function render()
    {
        [$annee, $mois] = explode("-", date('Y-m'));

        $ventes = Transaction::whereMonth('created_at', $mois)->whereYear('created_at', $annee);

        return view('livewire.home', [
            'ventesMensuelles' => $ventes->get()->sum('price'),
            'ventesJournalieres' => $ventes->whereDate('created_at', date('Y-m-d'))->get(),
            'ventes' => Transaction::where('done', false)->latest()->get()
        ]);
    }
}
