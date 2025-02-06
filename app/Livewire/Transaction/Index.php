<?php

namespace App\Livewire\Transaction;

use App\Models\Transaction;
use Livewire\Component;

class Index extends Component
{
    public $num = 1;

    public $date;

    public function isVente(Transaction $transaction)
    {
        $transaction->done = !$transaction->done;
        $transaction->save();
    }

    public function mount()
    {
        $this->date = now()->format('Y-m-d');
    }

    public function deleteTransaction(Transaction $transaction)
    {
        $transaction->delete();
    }

    public function render()
    {
        return view('livewire.transaction.index', [

            'ventes' => Transaction::when($this->date, function($transaction){
                $transaction->whereDate('created_at', $this->date);
            })->latest()->get()

        ]);
    }
}
