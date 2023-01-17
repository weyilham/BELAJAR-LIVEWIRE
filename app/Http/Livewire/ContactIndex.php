<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactIndex extends Component
{
    protected $listeners = ['contactStored', 'contactUpdate'];
    public $statusUpdate = false;
    public $paginate = 5;
    public $search;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $queryString = ['search'];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    public function render()
    {
        return view('livewire.contact-index', [
            'contacts' => $this->search == null ?
                Contact::latest()->paginate($this->paginate) :
                Contact::latest()->where('name', 'like', '%' . $this->search . '%')->paginate($this->paginate)
        ]);
    }

    public function getContactId($id)
    {
        $this->statusUpdate = true;
        $contact = Contact::find($id);
        $this->emit('contactId', $contact);
    }

    public function distroy($id)
    {
        if ($id) {
            $data = Contact::find($id);
            $data->delete();
            session()->flash('message', 'Data Berhasil dihapus!');
        }
    }

    public function contactStored($contact)
    {
        session()->flash('message', 'Data ' . $contact['name'] . ' Berhasil ditambahkan!');
    }

    public function contactUpdate($contact)
    {
        $this->statusUpdate = false;
        session()->flash('message', 'Data ' . $contact['name'] . ' Berhasil diUpdate!');
    }
}
