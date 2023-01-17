<div>
  

    <form wire:submit.prevent="store" >
        <div class="form-group">
            <div class="form-row">
                <div class="col">
                    <input wire:model="name" type="text" name="" id="" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                    @error('name')
                        <div class="feedback-invalid">
                            <strong class="text-danger">{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                <div class="col mt-2">
                    <input wire:model="no_hp" type="text" name="" id="" class="form-control @error('no_hp') is-invalid @enderror" placeholder="Phone">
                    @error('no_hp')
                        <div class="feedback-invalid">
                            <strong class="text-danger">{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-sm btn-primary mt-2">Submit</button>
        {{-- {{ $name }} --}}
    </form>
</div>
