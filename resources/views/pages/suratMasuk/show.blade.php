@extends('layouts.dashboard.template')

@section('content')
<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Preview Surat Masuk</h5>


          <div class="row my-2">
            <div class="col-lg-3 col-md-4 label ">No Surat</div>
            <div class="col-lg-9 col-md-8">: {{$suratMasuk->no_surat}}</div>
          </div>

          <div class="row my-2">
            <div class="col-lg-3 col-md-4 label">Tanggal Surat</div>
            <div class="col-lg-9 col-md-8">: {{ \Carbon\Carbon::parse($suratMasuk->tgl_surat)->format('d F Y') }}</div>
          </div>

          <div class="row my-2">
            <div class="col-lg-3 col-md-4 label">Tanggal Diterima</div>
            <div class="col-lg-9 col-md-8">: {{\Carbon\Carbon::parse($suratMasuk->tgl_diterima)->format('d F Y')}}</div>
          </div>

          <div class="row my-2">
            <div class="col-lg-3 col-md-4 label">Surat Dari</div>
            <div class="col-lg-9 col-md-8">: {{$suratMasuk->surat_dari}}</div>
          </div>

          <div class="row my-2">
            <div class="col-lg-3 col-md-4 label">Perihal</div>
            <div class="col-lg-9 col-md-8">: {{$suratMasuk->perihal}}</div>
          </div>

          <div class="row my-2">
            <div class="col-lg-3 col-md-4 label">Disposisi</div>
            <div class="col-lg-9 col-md-8">: {{$suratMasuk->disposisi}}</div>
          </div>

          <div class="row my-2">
            <div class="col-lg-3 col-md-4 label">Diteruskan Kepada</div>
            <div class="col-lg-9 col-md-8">: {{$suratMasuk->diteruskan}}</div>
          </div>

          <div class="row my-2">
            <div class="col-lg-3 col-md-4 label">CC</div>
            <div class="col-lg-9 col-md-8">: {{$suratMasuk->cc}}</div>
          </div>

          <div class="row">
            <div class="col-lg-3 col-md-4 label">Jenis Surat</div>
            <div class="col-lg-9 col-md-8">: {{$suratMasuk->jenis_surat}}</div>
          </div>

          <div class="row">
            <div class="col-lg-3 col-md-4 label">Klasifikasi Surat</div>
            <div class="col-lg-9 col-md-8">: {{$suratMasuk->klasifikasi_surat}}</div>
          </div>

          <div class="row">
            <div class="col-lg-3 col-md-4 label">Derajat Surat</div>
            <div class="col-lg-9 col-md-8">: {{$suratMasuk->derajat_surat}}</div>
          </div>

          <div class="row">
            <div class="col-lg-3 col-md-4 label">Isi Surat</div>
            <div class="col-lg-9 col-md-8"> {!!$suratMasuk->isi_surat !!}</div>
          </div>

          <div class="row">
            <a href="{{Storage::url($suratMasuk->file)}}" target="_blank">View File</a>
          </div>

          <a href="{{route('surat-masuk.index')}}" class="btn btn-sm btn-secondary my-3 rounded" style="background-color: #F4AF18"><i class="fa-solid fa-angles-left"></i> Back</a>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
