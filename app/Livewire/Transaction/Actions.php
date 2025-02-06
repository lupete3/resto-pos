<?php

namespace App\Livewire\Transaction;

use App\Livewire\Forms\TransactionForm;
use App\Models\Customer;
use App\Models\Menu;
use App\Models\Transaction;
use Livewire\Component;

class Actions extends Component
{
    public $search;

    public $items = [];

    public TransactionForm $form;

    public ?Transaction $transaction;

    public function addItem(Menu $menu)
    {
        if (isset($this->items[$menu->name])) {

            $item = $this->items[$menu->name];

            $this->items[$menu->name] = [
                'qte' => $item['qte'] + 1,
                'price' => $item['price'] + $menu->price,
            ];

        }else{

            $this->items[$menu->name] = [
                'qte' => 1,
                'price' => $menu->price,
            ];
        }

    }

    public function removeItem($key)
    {
        $item = $this->items[$key];

        if ($item['qte'] > 1) {

            $newPrice = $item['price'] / $item['qte'];

            $newQte = $item['qte'] - 1;

            $this->items[$key]['qte'] = $newQte;

            $this->items[$key]['price'] = $newPrice * $newQte;

        }else{

            unset($this->items[$key]);

        }
    }

    public function addItemQte($key)
    {
        $item = $this->items[$key];

        $newPrice = $item['price'] / $item['qte'];

        $newQte = $item['qte'] + 1;

        $this->items[$key]['qte'] = $newQte;

        $this->items[$key]['price'] = $newPrice * $newQte;
    }

    public function removePanier()
    {
        $this->items = [];
    }


    public function getTotPrice()
    {
        if (isset($this->items)) {
            $prices = array_column($this->items, 'price');

            return array_sum($prices);
        }else{
            return 0;
        }
    }

    public function sauvegarder()
    {
        $this->validate([
            'items' => 'required'
        ]);

        $this->form->items = json_encode($this->items);
        $this->form->price = $this->getTotPrice();

        if (isset($this->form->transaction)) {
            $this->form->update();
        }else{
            $this->form->store();
        }

        $this->redirect(route('transaction.index'), true);

    }

    public function mount()
    {
        if (isset($this->transaction)) {
            $this->form->setTransaction($this->transaction);
            $this->items = $this->form->items;
        }
    }

    public function render()
    {
        return view('livewire.transaction.actions', [

            'menus' => Menu::when($this->search, function($menu){
                $menu->where('name', 'like', '%'.$this->search.'%')
                ->orWhere('price', 'like', '%'.$this->search.'%')
                ->orWhere('type', 'like', '%'.$this->search.'%')
                ->orWhere('description', 'like', '%'.$this->search.'%');
            })->get()->groupBy('type'),
            'customers' => Customer::pluck('name', 'id')

        ]);
    }
}
