<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactUpdate extends Component
{
    public $name;
    public $no_hp;
    public $contactId;
    public $statusUpdate = false;

    protected $listeners = ['contactId' => 'getContact'];

    public function render()
    {
        return view('livewire.contact-update');
    }

    public function getContact($contact)
    {
        $this->statusUpdate = true;
        $this->name = $contact['name'];
        $this->no_hp = $contact['no_hp'];
        $this->contactId = $contact['id'];
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:3',
            'no_hp' => 'required|max:14'
        ]);

        if ($this->contactId) {
            # code...
            $contact = Contact::find($this->contactId);
            $contact->update([
                'name' => $this->name,
                'no_hp' => $this->no_hp,
            ]);

            $this->resetInput();
            $this->emit('contactUpdate', $contact);
        }
    }

    private function resetInput()
    {
        $this->name = null;
        $this->no_hp = null;
    }
}
