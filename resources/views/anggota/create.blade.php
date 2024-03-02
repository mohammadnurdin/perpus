@extends('layout')
  
@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-10">
              <div class="card">
                  <div class="card-header">Add Anggota</div>
                  <div class="card-body">
  
                      <form action="{{ route('anggotas.store') }}" method="POST">
                          @csrf
                          <div class="form-group row mt-3">
                              <label for="id_anggota" class="col-md-4 col-form-label text-right">Kode Anggota</label>
                              <div class="col-md-6">
                                  <input type="text" id="id_anggota" class="form-control" name="id_anggota" required autofocus>
                                  @if ($errors->has('name'))
                                      <span class="text-danger">{{ $errors->first('id_anggota') }}</span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group row mt-3">
                              <label for="nm_anggota" class="col-md-4 col-form-label text-right">Name</label>
                              <div class="col-md-6">
                                  <input type="text" id="nm_anggota" class="form-control" name="nm_anggota" required autofocus>
                                  @if ($errors->has('name'))
                                      <span class="text-danger">{{ $errors->first('nm_anggota') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row mt-3">
                              <label for="jk" class="col-md-4 col-form-label text-right">Jenis Kelamin</label>
                              <div class="col-md-6">
                                  <input type="text" id="jk" class="form-control" name="jk" required autofocus>
                                  @if ($errors->has('jk'))
                                      <span class="text-danger">{{ $errors->first('jk') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row mt-3">
                              <label for="password" class="col-md-4 col-form-label text-right">Password</label>
                              <div class="col-md-6">
                                  <input type="password" id="password" class="form-control" name="password" required>
                                  @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row mt-3">
                            <label for="hak_akses" class="col-md-4 col-form-label text-right">Hak Akses</label>
                            <div class="col-md-6">
                                <select class="form-select" id="hak_akses" name="hak_akses" aria-label="hak_akses">
                                    <option value="">Choose</option>
                                    <option value="admin">Administrator</option>
                                    <option value="anggota">Anggota</option>
                                </select>
                                @if ($errors->has('hak_akses'))
                                    <span class="text-danger">{{ $errors->first('hak_akses') }}</span>
                                @endif
                            </div>
                          </div>
  
                          <div class="col-md-6 offset-md-4 mt-3 p-2 d-grid">
                              <button type="submit" class="btn btn-primary">
                                  Save
                              </button>
                          </div>
                      </form>
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection