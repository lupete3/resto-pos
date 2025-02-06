<?php

namespace App\Livewire\Forms;

use App\Models\Transaction;
use Livewire\Form;

class TransactionForm extends Form
{
    public $customer_id;

    public $items;

    public $description;

    public $price;

    public $done = false;

    public ?Transaction $transaction;

    public function setTransaction(Transaction $transaction)
    {
        $this->transaction = $transaction;

        $this->customer_id = $this->transaction->customer_id;
        $this->items = json_decode($this->transaction->items, true);
        $this->description = $this->transaction->description;
        $this->price = $this->transaction->price;
        $this->done = $this->transaction->done;

    }

    public function store()
    {
        $valid = $this->validate([
            'customer_id' => 'required',
            'items' => 'required',
            'description' => 'required',
            'price' => 'required',
            'done' => 'required'
        ]);

        Transaction::create($valid);

        $this->reset();
    }

    public function update()
    {
        $valid = $this->validate([
            'customer_id' => 'required',
            'items' => 'required',
            'description' => 'required',
            'price' => 'required',
            'done' => 'required'
        ]);

        $this->transaction->update($valid);

        $this->reset();
    }
}
