@extends('skeletons.app')

@section('content')
    <h2>Haii</h2>
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
            @foreach ($collection as $item)
                
            @endforeach
        </tbody>
    </table>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>
@endpush
