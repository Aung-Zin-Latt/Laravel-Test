<div>

    <div class="container">
        <div class="row my-3">
            <div class="col-md-6 mx-auto">
                @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <form class="form" wire:submit.prevent="submit">
                    @csrf
                    @foreach($inputs as $key => $type)
                        <div class="form-group">
                            <label class="form-label">{{ ucfirst(str_replace('_', ' ', $key)) }}:</label>
                            @if($type == 'text')
                                <input class="form-control" type="text" wire:model="name">
                                @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                            @elseif($type == 'tel')
                                <input class="form-control" type="tel" wire:model="phone_number">
                                @error('phone_number') <p class="text-danger">{{ $message }}</p> @enderror
                            @elseif($type == 'date')
                                <input class="form-control" type="date" wire:model="date_of_birth">
                                @error('data_of_birth') <p class="text-danger">{{ $message }}</p> @enderror
                            @elseif($type == 'radio')
                                  <div class="form-check">
                                    <input wire:model="gender" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="male" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                      Male
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input wire:model="gender" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="female">
                                    <label class="form-check-label" for="exampleRadios2">
                                      Female
                                    </label>
                                  </div>
                                  @error('gender') <p class="text-danger">{{ $message }}</p> @enderror
                            @endif
                        </div>
                    @endforeach
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>
