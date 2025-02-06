<?php

namespace App\Livewire\Transaction;

use Livewire\Component;
use App\Models\Transaction;
use Livewire\Attributes\On;

class Detail extends Component
{
    public $show = false;

    public ?Transaction $transaction;

    #[On('detailTransaction')]
    public function detailTransaction(Transaction $transaction)
    {
        $this->show = true;
        $this->transaction = $transaction;
    }

    public function closeModal()
    {
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.transaction.detail');
    }
}
