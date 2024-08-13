@extends('layouts.dashboard.template')

@section('content')

  <section class="section">
    <div class="row">
      <div class="col-lg-8">


        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Ubah Form Pengguna</h5>

            <!-- General Form Elements -->
            <form action="{{ route('users.update', $user->id) }}" method="POST">
              @csrf
              @method('PUT')

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Nama lengkap</label>
                <div class="col-sm-10">
                  <input type="text" name="name" value="{{ old('name') ?? $user->name }}" class="form-control">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Jabatan</label>
                <div class="col-sm-10">
                  <input type="text" name="jabatan" value="{{ old('jabatan') ?? $user->jabatan }}" class="form-control">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" name="email" value="{{ old('email') ?? $user->email }}" class="form-control">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                <select name="role" id="" class="form-control">
                  <option value="">{{$user->role}}</option>
                  <option value="">--pilih status--</option>
                  <option value="user" @selected($user->role == 'user')>user</option>
                  <option value="admin" @selected($user->role == 'admin')>admin</option>
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

