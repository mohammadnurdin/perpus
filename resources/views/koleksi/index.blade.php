@extends('layout')

@section('content')
    <div class="container mt-5">
        <div id="message">
        </div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col col-sm-9">Master Koleksi</div>
                    <div class="col col-sm-3">
                        <button type="button" id="add_data" class="btn btn-success btn-sm float-end">Add</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="sample_data">
                        <thead>
                            <tr>
                                <th>Kode Koleksi</th>
                                <th>Judul</th>
                                <th>Bahan Pustaka</th>
                                <th>Koleksi</th>
                                <th>Media</th>
                                <th>Pengarang</th>
                                <th>Penerbit</th>
                                <th>Tahun</th>
                                <th>Cetakan</th>
                                <th>Edisi</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal" tabindex="-1" id="action_modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" id="sample_form">
                        <div class="modal-header">
                            <h5 class="modal-title" id="dynamic_modal_title"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Kode Koleksi</label>
                                <input type="text" name="kd_koleksi" id="kd_koleksi" class="form-control" />
                                <span id="kd_koleksi_error" class="text-danger"></span>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Judul</label>
                                <input type="text" name="judul" id="judul" class="form-control" />
                                <span id="judul_error" class="text-danger"></span>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Jenis Pustaka</label>
                                <select class="form-select" id="jns_bhn_pustaka" name="jns_bhn_pustaka" aria-label="jns_bhn_pustaka">
                                    <option value="">Choose</option>
                                    <option value="Perpustakaan Umum">Perpustakaan Umum</option>
                                    <option value="Perpustakaan Akademik">Perpustakaan Akademik</option>
                                    <option value="Perpustakaan Sekolah">Perpustakaan Sekolah</option>
                                    <option value="Perpustakaan Khusus">Perpustakaan Khusus</option>
                                    <option value="Perpustakaan Koleksi Khusus">Buku Print on Demand</option>
                                </select>
                                <span id="jns_bhn_pustaka_error" class="text-danger"></span>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Jenis Koleksi</label>
                                <select class="form-select" id="jns_koleksi" name="jns_koleksi" aria-label="jns_koleksi">
                                    <option value="">Choose</option>
                                    <option value="Koleksi Umum">Koleksi Umum</option>
                                    <option value="Koleksi Referensi">Koleksi Referensi</option>
                                    <option value="Koleksi Fiksi">Koleksi Fiksi</option>
                                    <option value="Koleksi Non Fiksi">Koleksi Non Fiksi</option>
                                </select>
                                <span id="jns_koleksi_error" class="text-danger"></span>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Jenis Media</label>
                                <select class="form-select" id="jns_media" name="jns_media" aria-label="jns_media">
                                    <option value="">Choose</option>
                                    <option value="Buku Cetak">Buku Cetak</option>
                                    <option value="E-Book">E-Book</option>
                                    <option value="Audio Book">Audio Book</option>
                                    <option value="Buku Audiovisual">Buku Audiovisual</option>
                                    <option value="Buku Digital Interaktif">Buku Digital Interaktif</option>
                                </select>
                                <span id="jns_media_error" class="text-danger"></span>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="pengarang">Pengarang</label>
                                <input type="text" name="pengarang" id="pengarang" class="form-control" />
                                <span id="pengarang_error" class="text-danger"></span>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Penerbit</label>
                                <input type="text" name="penerbit" id="penerbit" class="form-control" />
                                <span id="penerbit_error" class="text-danger"></span>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="tahun">Tahun</label>
                                <input type="number" name="tahun" id="tahun" class="form-control" />
                                <span id="tahun_error" class="text-danger"></span>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Cetakan</label>
                                <select class="form-select" id="cetakan" name="cetakan" aria-label="cetakan">
                                    <option value="">Choose</option>
                                    <option value="Buku Baru">Buku Baru</option>
                                    <option value="Buku Bekas">Buku Bekas</option>
                                    <option value="Buku Antik">Buku Antik</option>
                                    <option value="Buku Rekondisi">Buku Rekondisi</option>
                                    <option value="Buku Print on Demand">Buku Print on Demand</option>
                                </select>
                                <span id="cetakan_error" class="text-danger"></span>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Edisi</label>
                                <select class="form-select" id="edisi" name="edisi" aria-label="edisi">
                                    <option value="">Choose</option>
                                    <option value="Edisi Pertama">Edisi Pertama</option>
                                    <option value="Edisi Tebaru">Edisi Tebaru</option>
                                    <option value="Edisi Terjermahan">Edisi Terjermahan</option>
                                    <option value="Edisi Khusus">Edisi Khusus</option>
                                    <option value="Edisi Digital">Edisi Digital</option>
                                </select>
                                <span id="edisi_error" class="text-danger"></span>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="status">Status</label>
                                <select class="form-select" id="status" name="status" aria-label="status">
                                    <option>Pilih Status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">In Active</option>
                                </select>
                                <span id="status_error" class="text-danger"></span>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <input type="hidden" name="id" id="id" />
                            <input type="hidden" name="action" id="action" value="Add" />
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="action_button">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
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
                        'kd_koleksi': $('#kd_koleksi').val(),
                        'judul': $('#judul').val(),
                        'jns_bhn_pustaka': $('#jns_bhn_pustaka').val(),
                        'jns_koleksi': $('#jns_koleksi').val(),
                        'jns_media': $('#jns_media').val(),
                        'pengarang': $('#pengarang').val(),
                        'penerbit': $('#penerbit').val(),
                        'tahun': $('#tahun').val(),
                        'cetakan': $('#cetakan').val(),
                        'edisi': $('#edisi').val(),
                        'status': $('#status').val(),
                    }


                    $.ajax({
                        headers: {
                            "Content-Type": "application/json"
                        },
                        url: "{{ route('koleksis.store') }}",
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
                        'kd_koleksi': $('#kd_koleksi').val(),
                        'judul': $('#judul').val(),
                        'jns_bhn_pustaka': $('#jns_bhn_pustaka').val(),
                        'jns_koleksi': $('#jns_koleksi').val(),
                        'jns_media': $('#jns_media').val(),
                        'pengarang': $('#pengarang').val(),
                        'penerbit': $('#penerbit').val(),
                        'tahun': $('#tahun').val(),
                        'cetakan': $('#cetakan').val(),
                        'edisi': $('#edisi').val(),
                        'status': $('#status').val(),
                    }

                    $.ajax({
                        headers: {
                            "Content-Type": "application/json"
                        },
                        url: "{{ url('koleksis/') }}/" + $('#id').val(),
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
                url: "{{ route('koleksi.all') }}",
                success: function(response) {
                    // console.log(response);
                    var json = response;
                    var dataSet = [];
                    for (var i = 0; i < json.length; i++) {
                         var sub_array = {
                            'kd_koleksi': json[i].kd_koleksi,
                            'judul': json[i].judul,
                            'jns_bhn_pustaka': json[i].jns_bhn_pustaka,
                            'jns_koleksi': json[i].jns_koleksi,
                            'jns_media': json[i].jns_media,
                            'pengarang': json[i].pengarang,
                            'penerbit': json[i].penerbit,
                            'tahun': json[i].tahun,
                            'cetakan': json[i].cetakan,
                            'edisi': json[i].edisi,
                            'status': json[i].status,
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
                            {data: "kd_koleksi"},
                            {data: "judul"},
                            {data: "jns_bhn_pustaka"},
                            {data: "jns_koleksi" },
                            {data: "jns_media"},
                            {data: "pengarang"},
                            {data: "penerbit"},
                            {data: "tahun"},
                            {data: "cetakan"},
                            {data: "edisi" },
                            {data: "status" },
                            {data: "action" }
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
                url: "{{ url('koleksis') }}/" + id,
                success: function(response) {
                    $('#id').val(response.id);
                    $('#kd_koleksi').val(response.kd_koleksi);
                    $('#judul').val(response.judul);
                    $('#jns_bhn_pustaka').val(response.jns_bhn_pustaka);
                    $('#jns_koleksi').val(response.jns_koleksi);
                    $('#jns_media').val(response.jns_media);
                    $('#pengarang').val(response.pengarang);
                    $('#penerbit').val(response.penerbit);
                    $('#tahun').val(response.tahun);
                    $('#cetakan').val(response.cetakan);
                    $('#edisi').val(response.edisi);
                    $('#status').val(response.status);
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
                url: "{{ url('koleksis') }}/" + id,
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
