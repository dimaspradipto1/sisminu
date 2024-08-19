@extends('layouts.dashboard.template')

@push('scripts')
  {{ $dataTable->scripts() }}
@endpush


@section('content')
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-dark fw-bold">Kotak Keluar</h5>

            <div class="row mb-3 justify-content-between">
              
              <div class="col-lg-6">
                <form id="search-form" method="GET" action="{{ route('surat-keluar.index') }}">
                  <div class="input-group">
                      <input type="text" name="search" id="search" class="form-control py-2 px-4" placeholder="🔍Cari surat" value="{{ request('search') }}">
                      <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
                      <a href="{{ route('surat-keluar.index') }}" class="btn btn-sm btn-outline-secondary py-2 px-4 text-dark mx-2 rounded"><i class="fas fa-filter"></i> Filter</a>
                  </div>
              </form>
            </div>
            
              <div class="col-lg-6 text-end">
                <a href="" class="btn btn-sm btn-outline-secondary py-2 px-4 text-dark mx-2 rounded"><i class="fas fa-folder-open"></i> Arsip</a>
                <a href="{{route('surat-masuk.create')}}" class="btn btn-sm btn-primary py-2 px-4 text-capitalize rounded"><i class="fas fa-plus"></i> buat surat</a>
              </div>
            </div>
           
            <div class="container">
              {!! $dataTable->table([
               
                'class' => 'table',
                'style' => 'width:100%',
            ]) !!}
            </div>

          </div>
        </div>

      </div>
    </div>
  </section>
@endsection
