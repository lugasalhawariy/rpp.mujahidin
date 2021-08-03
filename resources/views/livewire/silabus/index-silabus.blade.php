<div>
    <div class="main-content">
        <div class="panel panel-info">
            <div class="text-center panel-heading">
                Upload Silabus
            </div>
            <div class="panel-body">
                <form wire:submit.prevent="addItem" action="#" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" wire:model="user_id">
                        <input type="file" wire:model="file">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <hr>
            <div class="mt-4 panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>user</th>
                            <th>file</th>
                            <th>delete</th>
                            <th>download</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($silabus->count() > 0)
                            @foreach ($silabus as $index => $item)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->file }}</td>
                                <td>
                                    <button wire:click="delete({{ $item->id }})" class="badge rounded-pill bg-danger">
                                        <i class="lnr lnr-trash"></i>
                                    </button>
                                </td>
                                <td>
                                    <button wire:click="download({{ $item->id }})" class="badge rounded-pill bg-dark">
                                        <i class="lnr lnr-download"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="5">Tidak ada data</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="backend/assets/css/style-guru.css">