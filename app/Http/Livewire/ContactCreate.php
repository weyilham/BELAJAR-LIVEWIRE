<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactCreate extends Component
{
    public $name;
    public $no_hp;

    public function render()
    {
        return view('livewire.contact-create');
    }
    public function store()
    {
        $this->validate([
            'name' => 'required|min:3',
            'no_hp' => 'required|max:14'
        ]);

        $contact = Contact::create([
            'name' => $this->name,
            'no_hp' => $this->no_hp
        ]);
        $this->resetInput();
        $this->emit('contactStored', $contact);
    }

    private function resetInput()
    {
        $this->name = null;
        $this->no_hp = null;
    }
}
