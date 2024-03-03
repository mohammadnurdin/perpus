@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif
                <div class="card-header">{{ __('Transaksi Pinjam') }}</div>

                <div class="card-body">
                    <a href="{{ route('pinjams.create') }}" class="btn btn-sm btn-secondary">
                        Tambah Pinjam
                    </a>
                    <table class="table" id="sample_data">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Anggota</th>
                                <th scope="col">Tanggal Pinjam</th>
                                <th scope="col">Tanggal Batas Kembali</th>
                                <th scope="col">Judul Buku</th>
                                <th scope="col">Jenis Media</th>
                                <th scope="col">Jenis Koleksi</th>
                                <th scope="col">Nama Pengguna</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; ?>
                            @foreach($pinjams as $row)
                            <?php $no++ ?>
                            <tr>
                                <th scope="row">{{ $no }}</th>
                                <td>{{$row->anggota->nm_anggota}}</td>
                                <td>{{$row->tg_pinjam}}</td>
                                <td>{{$row->tg_bts_kembali}}</td>
                                <td>{{$row->judul}}</td>
                                <td>{{$row->jns_media}}</td>
                                <td>{{$row->jns_koleksi}}</td>
                                <td>{{$row->pengguna->nm_pengguna}}</td>
                                <td>
                                    <a href="{{ route('pinjams.edit', $row->id) }}" class="btn btn-sm btn-warning">
                                        Edit
                                    </a>
                                    <form action="{{ route('pinjams.destroy',$row->id) }}" method="POST" style="display: inline" onsubmit="return confirm('Do you really want to delete {{ $row->name }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><span class="text-muted">
                                                Delete
                                            </span></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // $(document).ready(function() {
    //     $('#sample_data').DataTable();
    // });

    $(document).ready(function() {
        $('#sample_data').DataTable();
        showAll();

        $('#add_data').click(function() {
            $('#dynamic_modal_title').text('Add Data');
            $('#sample_form')[0].reset();
            $('#action').val('Add');
            $('#action_button').text('Add');
            $('.text-danger').text('');
            $('#action_modal').modal('show');
        });

        $('#sample_form').on('submit', function(event) {
            event.preventDefault();
            if ($('#action').val() == "Add") {
                var formData = {
                    '_token': '{{ csrf_token() }}',
                    'no_transaksi_pinjam': $('#no_transaksi_pinjam').val(),
                    'kd_anggota': $('#kd_anggota').val(),
                    'tg_pinjam': $('#tg_pinjam').val(),
                    'tg_bts_kembali': $('#tg_bts_kembali').val(),
                    'kd_koleksi': $('#kd_koleksi').val(),
                    'judul': $('#judul').val(),
                    'jns_bhn_pustaka': $('#jns_bhn_pustaka').val(),
                    'jns_koleksi': $('#jns_koleksi').val(),
                    'jns_media': $('#jns_media').val(),
                }


                $.ajax({
                    headers: {
                        "Content-Type": "application/json"
                    },
                    url: "{{ route('pinjams.store') }}",
                    method: "POST",
                    data: JSON.stringify(formData),
                    success: function(data) {
                        console.log(data);
                        $('#action_button').attr('disabled', false);
                        $('#message').html('<div class="alert alert-success">' + data
                            .message + '</div>');
                        $('#action_modal').modal('hide');
                        $('#sample_data').DataTable().destroy();
                        showAll();
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            } else if ($('#action').val() == "Update") {
                var formData = {
                    '_token': '{{ csrf_token() }}',
                    'no_transaksi_pinjam': $('#no_transaksi_pinjam').val(),
                    'kd_anggota': $('#kd_anggota').val(),
                    'tg_pinjam': $('#tg_pinjam').val(),
                    'tg_bts_kembali': $('#tg_bts_kembali').val(),
                    'kd_koleksi': $('#kd_koleksi').val(),
                    'judul': $('#judul').val(),
                    'jns_bhn_pustaka': $('#jns_bhn_pustaka').val(),
                    'jns_koleksi': $('#jns_koleksi').val(),
                    'jns_media': $('#jns_media').val(),
                }

                $.ajax({
                    headers: {
                        "Content-Type": "application/json"
                    },
                    url: "{{ url('pinjams/') }}/" + $('#id').val(),
                    method: "PUT",
                    data: JSON.stringify(formData),
                    success: function(data) {
                        $('#action_button').attr('disabled', false);
                        $('#message').html('<div class="alert alert-success">' + data
                            .message + '</div>');
                        $('#action_modal').modal('hide');
                        $('#sample_data').DataTable().destroy();
                        showAll();
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            }
        });
    });

    function showAll() {
        $.ajax({
            type: "GET",
            headers: {
                "Content-Type": "application/json"
            },
            url: "{{ route('pinjam.all') }}",
            success: function(response) {
                // console.log(response);
                var json = response;
                var dataSet = [];
                for (var i = 0; i < json.length; i++) {
                    var sub_array = {
                    'no_transaksi_pinjam': json[i].no_transaksi_pinjam,
                    'kd_anggota': json[i].kd_anggota,
                    'tg_pinjam': json[i].tg_pinjam,
                    'tg_bts_kembali': json[i].tg_bts_kembali,
                    'kd_koleksi': json[i].kd_koleksi,
                    'judul': json[i].judul,
                    'jns_bhn_pustaka': json[i].jns_bhn_pustaka,
                    'jns_koleksi': json[i].jns_koleksi,
                    'jns_media': json[i].jns_media,
                        'action': '<button onclick="showOne(' + json[i].id +
                            ')" class="btn btn-sm btn-warning me-2">Edit</button>' +
                            '<button onclick="deleteOne(' + json[i].id +
                            ')" class="btn btn-sm btn-danger">Delete</button>'
                    };
                    dataSet.push(sub_array);
                }
                $('#sample_data').DataTable({
                    data: dataSet,
                    columns: [
                        { data: "no_transaksi_pinjam" },
                        { data: "kd_anggota"},
                        {  data: "tg_pinjam"},
                        { data: "tg_bts_kembali" },
                        { data: "kd_koleksi" },
                        { data: "judul"},
                        {data: "jns_bhn_pustaka"},
                        {data: "jns_koleksi" },
                        {data: "cetakan"},
                        {data: "jns_media"},
                    ]
                });
            },
            error: function(err) {
                console.log(err);
            }
        });
    }

    function showOne(id) {
        $('#dynamic_modal_title').text('Edit Data');
        $('#sample_form')[0].reset();
        $('#action').val('Update');
        $('#action_button').text('Update');
        $('.text-danger').text('');
        $('#action_modal').modal('show');

        $.ajax({
            type: "GET",
            headers: {
                "Content-Type": "application/json"
            },
            url: "{{ url('pinjams') }}/" + id,
            success: function(response) {
                $('#id').val(response.id);

                      $("#no_transaksi_pinjam").val(response.no_transaksi_pinjam);
                      $("#kd_anggota").val(response.kd_anggota);
                      $("#tg_pinjam").val(response.tg_pinjam);
                      $("#tg_bts_kembali").val(response.tg_bts_kembali);
                      $("#kd_koleksi").val(response.kd_koleksi);
                      $("#judul").val(response.judul);
                      $("#jns_bhn_pustaka").val(response.jns_bhn_pustaka);
                      $("#jns_koleksi").val(response.jns_koleksi);
                      $("#cetakan").val(response.cetakan);
                      $("#jns_media").val(response.jns_media);
            },
            error: function(err) {
                console.log(err);
            }
        });
    }

    function deleteOne(id) {
        alert('Yakin untuk hapus data ?');
        $.ajax({
            headers: {
                "Content-Type": "application/json"
            },
            url: "{{ url('pinjams') }}/" + id,
            method: "DELETE",
            data: JSON.stringify({
                '_token': '{{ csrf_token() }}'
            }),
            success: function(data) {
                $('#action_button').attr('disabled', false);
                $('#message').html('<div class="alert alert-success">' + data.message + '</div>');
                $('#action_modal').modal('hide');
                $('#sample_data').DataTable().destroy();
                showAll();
            },
            error: function(err) {
                console.log(err);
            }
        });
    }
</script>
@endsection