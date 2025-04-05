<?php

namespace App\Livewire\Customer;

use Livewire\Component;
use App\Models\Customer;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    
    public $search;

    public $num = 1;

    protected $listeners = [
        'reload' => '#refresh',
    ];

    public function render()
    {
        return view('livewire.customer.index', [
            'customers' => Customer::when($this->search, function($menu){
                $menu->where('name', 'like', '%'.$this->search.'%')
                ->orWhere('contact', 'like', '%'.$this->search.'%')
                ->orWhere('adress', 'like', '%'.$this->search.'%');
            })->paginate(8)
        ]);
    }
}
