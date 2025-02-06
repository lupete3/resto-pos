<?php

namespace App\Exports;

use App\Models\Transaction;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TransactionExport implements FromView
{
    public $year;

    public $month;

    public function __construct($intervale) // 2024-06
    {
        [$this->year, $this->month] = explode("-", $intervale);

    }
    public function view(): View
    {
        return view('export.transaction', [
            'transactions' => Transaction::whereYear('created_at', $this->year)
            ->whereMonth('created_at', $this->month)->get(),
        ]);
    }
}
