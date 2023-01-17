<div>

    
    @if (session()->has('message'))   
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    
    @if ($statusUpdate)
    <livewire:contact-update/>
    @else   
    <livewire:contact-create/>
    @endif

    <hr>

    <div class="row">
        <div class="col">
            <select wire:model="paginate" class="form-select form-select-sm w-auto">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
            </select>
        </div>
        <div class="col">
            <input wire:model="search" type="text" name="" id="" class="form-control form-control-sm" placeholder="Search">
        </div>
    </div>

    <hr>

    <table class="table table-striped table-bordered mt-3">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No HP</th>
                <th>Action</th>
            </tr>
            
            <tbody>
                @foreach ($contacts as $contact)
                    
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->no_hp }}</td>
                    <td>
                        <button wire:click='getContactId({{ $contact->id }})' class="btn btn-info btn-sm">Edit</button>
                        <button wire:click='distroy({{ $contact->id }})' class="btn btn-danger btn-sm">delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </thead>
    </table>
    {{ $contacts->links() }}
</div>
