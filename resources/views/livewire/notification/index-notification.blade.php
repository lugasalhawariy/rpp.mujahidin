<div>
    <div class="main-content">
        <div class="container-fluid">
            @can('notification')
            <div class="panel panel-info">
                <div class="panel-body">
                    @if ($show)
                        <button wire:click="$set('show', false)" class="btn btn-warning" data-toggle="modal" data-target="#myModal"><i class="lnr lnr-circle-minus"></i></button>
                    @else
                        <button wire:click="$set('show', true)" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="lnr lnr-plus-circle"></i></button>
                    @endif
                </div>
                
                <hr>
                @if ($show)
                    @include('livewire.notification.create-notification')
                @endif
            </div>
            @endcan
            <div class="panel panel-info">
                <div class="panel-heading">
                    Your Message
                </div>
                <div class="panel-body">
                    @if(session('message'))
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> {{ session('message') }}
                        </div>
                    @endif
                    @if ($data->count() > 0)
                        <table class="table caption-top">
                            <thead>
                                <tr>
                                    <th>Pengirim</th>
                                    <th>Judul</th>
                                    <th>Pesan</th>
                                    <th>Penerima</th>
                                    <th>Expired</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->body }}</td>
                                    <td>{{ $item->role->name }}</td>
                                    <td>{{ $item->expired }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        
                    @else
                        <p>
                            Tidak ada pesan.
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

