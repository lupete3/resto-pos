<?php

namespace App\Livewire\Menu;

use App\Livewire\Forms\MenuForm;
use App\Models\Menu;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Actions extends Component
{
    use WithFileUploads;

    public $show = false;

    public $photo;

    public MenuForm $form;

    #[On('createMenu')]
    public function createMenu()
    {
        $this->show = true;
    }

    #[On('editMenu')]
    public function editMenu(Menu $menu)
    {
        $this->form->setMenu($menu);
        $this->show = true;
    }

    #[On('deleteMenu')]
    public function deleteMenu(Menu $menu)
    {
        $menu->delete();

        $this->dispatch('reload');

        // Dispatch d'un événement personnalisé pour SweetAlert2
        $this->dispatch('show-swal',
            type: 'success',
            title: 'Succès',
            text: 'Menu supprimé avec succès.',
        );
    
    }

    public function ajouter()
    {
        if ($this->photo) {
            $this->form->photo = $this->photo->hashName('menu');
            $this->photo->store('menu');
        }

        if (isset($this->form->menu)) {
            $this->form->update();
            // Dispatch d'un événement personnalisé pour SweetAlert2
            $this->dispatch('show-swal',
                type: 'success',
                title: 'Succès',
                text: 'Menu mis à jour avec succès.',
            );

        }else{
            $this->form->store();
            // Dispatch d'un événement personnalisé pour SweetAlert2
            $this->dispatch('show-swal',
                type: 'success',
                title: 'Succès',
                text: 'Menu ajouté avec succès.',
            );

        }

        $this->closeModal();

        $this->dispatch('reload');
    }

    public function closeModal()
    {
        $this->show = false;
        $this->photo = null;
        $this->form->reset();
    }

    public function render()
    {
        return view('livewire.menu.actions', [
            'types' => Menu::$types
        ]);
    }
}
