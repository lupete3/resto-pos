<?php

namespace App\Livewire\Customer;

use App\Livewire\Forms\CustomerForm;
use App\Models\Customer;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Actions extends Component
{
    use WithFileUploads;

    public $show = false;

    public $photo;

    public CustomerForm $form;

    #[On('createCustomer')]
    public function createCustomer()
    {
        $this->show = true;
    }

    #[On('editCustomer')]
    public function editCustomer(Customer $customer)
    {
        $this->form->setCustomer($customer);
        $this->show = true;
    }

    #[On('deleteCustomer')]
    public function deleteCustomer(Customer $customer)
    {
        $customer->delete();

        $this->dispatch('reload');

        // Dispatch d'un événement personnalisé pour SweetAlert2
        $this->dispatch('show-swal',
            type: 'success',
            title: 'Succès',
            text: 'Client supprimé avec succès.',
        );
    
    }

    public function ajouter()
    {

        if (isset($this->form->customer)) {
            $this->form->update();
            // Dispatch d'un événement personnalisé pour SweetAlert2
            $this->dispatch('show-swal',
                type: 'success',
                title: 'Succès',
                text: 'Cient mis à jour avec succès.',
            );

        }else{
            $this->form->store();
            // Dispatch d'un événement personnalisé pour SweetAlert2
            $this->dispatch('show-swal',
                type: 'success',
                title: 'Succès',
                text: 'Client ajouté avec succès.',
            );

        }

        $this->closeModal();

        $this->dispatch('reload');

    }

    public function closeModal()
    {
        $this->show = false;
        $this->form->reset();

    }

    public function render()
    {
        return view('livewire.customer.actions');
    }
}
