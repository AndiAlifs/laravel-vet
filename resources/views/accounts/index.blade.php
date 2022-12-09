@extends('skeletons.app')

@section('content')
    <h2 class="text-center m-3">Account Manager</h2>

    {{-- button add form modal --}}
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addModal">
        Tambah Data
    </button>

    <table id="table_id" class="display">
        <thead>
            <tr>
                <th>#</th>
                <th>Nomor Rekening</th>
                <th>Nama</th>
                <th>Saldo</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($accounts as $account)
                <tr>
                    <td>
                        {{ $loop->iteration }}
                    </td>
                    <td>
                        {{ $account->norek }}
                    </td>
                    <td>
                        {{ $account->nama }}
                    </td>
                    <td>
                        Rp. {{ $account->saldo }}
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal-{{ $account->id }}">
                            Edit
                        </button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{ $account->id }}">
                            Delete
                        </button>
                    </td>

                    {{-- modal for edit --}}
                    <div class="modal fade
                        @error('norek') show @enderror" id="editModal-{{ $account->id }}"
                        tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="#" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div
                                        class="modal-body
                                        @error('norek') has-error @enderror">
                                        <div
                                            class="form-group
                                            @error('norek') has-error @enderror">
                                            <label for="norek">Nomor Rekening</label>
                                            <input type="text" name="norek" id="norek" class="form-control"
                                                placeholder="Masukkan nomor rekening" value="{{ $account->norek }}">
                                            @error('norek')
                                                <span
                                                    class="help-block
                                                    @error('norek') has-error @enderror">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div
                                            class="form-group
                                            @error('nama') has-error @enderror">
                                            <label for="nama">Nama</label>
                                            <input type="text" name="nama" id="nama" class="form-control"
                                                placeholder="Masukkan nama" value="{{ $account->nama }}">
                                            @error('nama')
                                                <span
                                                    class="help-block
                                                    @error('nama') has-error @enderror">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div
                                            class="form-group
                                            @error('saldo') has-error @enderror">
                                            <label for="saldo">Saldo</label>
                                            <input type="text" name="saldo" id="saldo" class="form-control"
                                                placeholder="Masukkan saldo" value="{{ $account->saldo }}">
                                            @error('saldo')
                                                <span
                                                    class="help-block
                                                    @error('saldo') has-error @enderror">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    {{-- modal for delete confirmation --}}
                    <div class="modal fade
                        @error('norek') show @enderror" id="deleteModal-{{ $account->id }}"
                        tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Delete Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="#" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-body">
                                        <p>Apakah anda yakin ingin menghapus data ini?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </tr>
            @endforeach
        </tbody>
    </table>


    {{-- add form --}}
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group
                            @error('norek') has-error @enderror">
                            <label for="norek">Nomor Rekening</label>
                            <input type="text" name="norek" id="norek" class="form-control"
                                placeholder="Masukkan nomor rekening" value="{{ old('norek') }}">
                            @error('norek')
                                <span
                                    class="help-block
                                    @error('norek') has-error @enderror">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('nama') has-error @enderror">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control"
                                placeholder="Masukkan nama" value="{{ old('nama') }}">
                            @error('nama')
                                <span
                                    class="help-block
                                    @error('nama') has-error @enderror">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('saldo') has-error @enderror">
                            <label for="saldo">Saldo</label>
                            <input type="text" name="saldo" id="saldo" class="form-control"
                                placeholder="Masukkan saldo" value="{{ old('saldo') }}">
                            @error('saldo')
                                <span
                                    class="help-block
                                    @error('saldo') has-error @enderror">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#table_id').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
                "columnDefs": [{
                        "targets": [0, 1, 4],
                        "orderable": false
                    },
                    {
                        "targets": 2,
                        "width": "40%"
                    },
                    {
                        "targets": 3,
                        "width": "20%"
                    }
                ]
            });
        });
    </script>
@endpush
