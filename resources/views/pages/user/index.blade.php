@extends('layouts.dashboard.template')

@push('style')

@endpush

@section('content')
<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title text-uppercase">data pengguna</h5>
          <a href="{{route('users.create')}}" class="btn btn-sm btn-primary py-2 px-3 mb-4 rounded" style="background-color: #4C4DDC"><i class="fas fa-plus"></i> Tambah</a>
          <div class="card-body">
            <div>
              {!! $dataTable->table([
              'class' => 'table table-striped table-bordered',
              'style' => 'width:100%'
              ]) !!}
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
@endsection

@push('scripts')



{!! $dataTable->scripts(attributes: ['type' => 'module']) !!}
@endpush