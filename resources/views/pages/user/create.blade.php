@extends('layouts.dashboard.template')

@section('content')

  <section class="section">
    <div class="row">
      <div class="col-lg-8">


        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Tambah Form Pengguna</h5>

            <!-- General Form Elements -->
            <form action="{{ route('users.store') }}" method="POST">
              @csrf

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Nama lengkap</label>
                <div class="col-sm-10">
                  <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Jabatan</label>
                <div class="col-sm-10">
                  <input type="text" name="jabatan" value="{{ old('jabatan') }}" class="form-control">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" name="email" value="{{ old('nik_pemilik') }}" class="form-control">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">passsword</label>
                <div class="col-sm-10">
                  <input type="text" name="password" value="{{ old('password') }}" class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                <select name="role" id="" class="form-control">
                  <option value="">--pilih status--</option>
                  <option value="user">user</option>
                  <option value="admin">admin</option>
                </select>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-secondary"><i class="fas fa-plus"></i> SUBMIT</button>
                </div>
              </div>

            </form><!-- End General Form Elements -->

          </div>
        </div>

      </div>

    </div>
  </section>

@endsection

