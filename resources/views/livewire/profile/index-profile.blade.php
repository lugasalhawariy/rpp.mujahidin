<div>
    <div class="container">
        <div class="flex justify-content-center">
            <div class="mx-3 my-3 card">
                <div class="card-header">
                    Profile {{ $user->name }}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <label for="name" class="container">{{ $user->name }}</label>
                                </div>
                                <div class="col-md-4">
                                    @if ($showName)
                                        <button wire:click="$set('showName', false)" class="btn btn-warning" type="button">
                                            Cancel
                                        </button>
                                    @else
                                        <button wire:click="$set('showName', true)" class="btn btn-primary">
                                            Edit Nama
                                        </button>
                                    @endif
                                </div>
                            </div>
                            @if ($showName)
                                @livewire('profile.edit-nama-profile')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
