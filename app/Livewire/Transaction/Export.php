<?php

namespace App\Livewire\Transaction;

use App\Exports\TransactionExport;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class Export extends Component
{
    public $intervale;

    public function export()
    {
        $this->validate([
            'intervale' => 'required'
        ]);

        return Excel::download(new TransactionExport($this->intervale), "Rapport vente {$this->intervale}.xlsx");

    }
    public function render()
    {
        return view('livewire.transaction.export');
    }
}
