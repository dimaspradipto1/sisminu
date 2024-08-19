@extends('layouts.dashboard.template')

@push('scripts')
<script type="importmap">
  {
      "imports": {
          "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/42.0.1/ckeditor5.js",
          "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/42.0.1/"
      }
  }
</script>
<script type="module">
  import {
      ClassicEditor,
      Essentials,
      Paragraph,
      Bold,
      Italic,
      Font
  } from 'ckeditor5';

  ClassicEditor
      .create(document.querySelector('#editor'), {
          plugins: [Essentials, Paragraph, Bold, Italic, Font],
          toolbar: [
              'undo', 'redo', '|', 'bold', 'italic', '|',
              'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
          ]
      })
      .then(editor => {
          window.editor = editor;
      })
      .catch(error => {
          console.error(error);
      });
</script>

<!-- A friendly reminder to run on a server, remove this during the integration. -->
<script>
  window.onload = function() {
      if (window.location.protocol === "file:") {
          alert("This sample requires an HTTP server. Please serve this file with a web server.");
      }
  };
</script>

<script>
  function toggleFields(value) {
    if (value === 'paralel') {
      document.getElementById('cc').classList.remove('d-none');
      document.getElementById('diteruskan-kepada').classList.remove('d-none');
      document.getElementById('disposisi').classList.add('d-none');
    } else {
      document.getElementById('cc').classList.add('d-none');
      document.getElementById('diteruskan-kepada').classList.add('d-none');
      document.getElementById('disposisi').classList.remove('d-none');
    }
  }
</script>
@endpush

@section('content')
<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="row my-3">
            <div class="col-sm-2">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="options" id="gridRadios1" value="berjenjang" checked onclick="toggleFields('berjenjang')">
                <label class="form-check-label text-capitalize" for="gridRadios1">
                  Berjenjang
                </label>
              </div>
            </div>
            
            <div class="col-sm-2">
              <div class="form-check">
                <input class="form-check-input" type="radio" id="gridRadios2" name="options" value="paralel" onclick="toggleFields('paralel')">
                <label class="form-check-label text-capitalize" for="gridRadios2">
                  Paralel
                </label>
              </div>
            </div>
          </div>

          <form action="{{ route('surat-keluar.store') }}" method="POST" class="row g-3 my-2" enctype="multipart/form-data">
            @csrf

            <div class="col-md-6">
              <label for="inputName5" class="form-label text-capitalize">surat dari</label>
              <input type="text" name="surat_dari" value="{{old('surat_dari')}}" class="form-control" id="inputName5">
            </div>
            
            <div class="col-md-3 d-none" id="diteruskan-kepada">
              <label for="inputState" class="form-label text-capitalize">diteruskan kepada<span class="text-danger">*</span></label>
              <select class="form-select select2" name="diteruskan[]" multiple="multiple">
                <option>--pilih disposisi--</option>
                @foreach ($users as $user)
                  <option value="{{$user->id}}">{{$user->jabatan}}</option> 
                @endforeach
              </select>
            </div>

            <div class="col-md-3 d-none" id="cc">
              <label for="ccField" class="form-label text-uppercase">cc<span class="text-danger">*</span></label>
              <select name="cc[]" class="form-select select2" multiple="multiple">
                <option>--pilih disposisi--</option>
                @foreach ($users as $user)
                  <option value="{{$user->id}}">{{$user->jabatan}}</option> 
                @endforeach
              </select>
            </div>

            <div class="col-md-6" id="disposisi">
              <label for="inputState" class="form-label text-capitalize">disposisi <span class="text-danger">*</span></label>
              <select class="form-select select2" name="disposisi[]" multiple="multiple">
                <option>--pilih disposisi--</option>
                @foreach ($users as $user)
                  <option value="{{$user->id}}">{{$user->jabatan}}</option> 
                @endforeach
              </select>
            </div>

            <div class="col-md-6">
              <label for="inputPassword5" class="form-label text-capitalize">tanggal diterima</label>
              <input type="date" name="tgl_terima" value="{{old('tgl_terima')}}" class="form-control">
            </div>

            <div class="col-md-6">
              <label for="jenis_surat" class="form-label text-capitalize">jenis surat<span class="text-danger">*</span></label>
              <select name="jenis_surat" class="form-select">
                <option value="-">--pilih jenis surat--</option>
                <option value="Surat Masuk">Surat Masuk</option>
                <option value="Surat Keluar">Surat Keluar</option>
              </select>
            </div>

            <div class="col-6">
              <label for="no_surat" class="form-label text-capitalize">nomor surat</label>
              <input type="text" name="no_surat" value="{{old('no_surat')}}" class="form-control" id="inputAddress2">
            </div>

            <div class="col-md-6">
              <label for="klasifikasi_surat" class="form-label text-capitalize">klasifikasi surat<span class="text-danger">*</span></label>
              <select name="klasifikasi_surat" class="form-select">
                <option value="-">--pilih klasifikasi surat--</option>
                <option value="Terbuka">Terbuka</option>
                <option value="Tertutup">Tertutup</option>
              </select>
            </div>

            <div class="col-md-6">
              <label for="tanggal_surat" class="form-label text-capitalize">tanggal surat</label>
              <input type="date" name="tgl_surat" class="form-control">
            </div>

            <div class="col-md-6">
              <label for="derajat_surat" class="form-label text-capitalize">derajat surat</label>
              <div class="row mb-3">
                <div class="col-sm-2">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="derajat_surat" id="gridRadios1" value="Biasa" {{old('derajat_surat') == 'Biasa' ? 'checked' : ''}}>
                    <label class="form-check-label text-capitalize" for="gridRadios1">
                      Biasa
                    </label>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="derajat_surat" id="gridRadios2" value="Kilat" {{old('derajat_surat') == 'Kilat' ? 'checked' : ''}}>
                    <label class="form-check-label text-capitalize" for="gridRadios2">
                      Kilat
                    </label>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="derajat_surat" id="gridRadios3" value="Sangat Segera" {{old('derajat_surat') == 'Sangat Segera' ? 'checked' : ''}}>
                    <label class="form-check-label text-capitalize" for="gridRadios3">
                      Sangat Segera
                    </label>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <label for="inputState" class="form-label text-capitalize">perihal</label>
              <textarea name="perihal" rows="6" class="form-control"></textarea>
            </div>

            {{--  <div class="col-md-6">
              <label for="inputState" class="form-label text-capitalize">upload file</label>
              <input type="file" name="file" class="form-control" id="file">
            </div>  --}}

            <div class="col-md-6">
              <label for="file" class="form-label">File surat</label>
              <div class="dropzone" id="file-dropzone" style="border: 2px dashed #ddd;">
                <div class="dz-message text-center">
                  <i class="fas fa-cloud-upload-alt my-2" style="font-size: 30px;"></i>
                  <p>Upload a file or drag & drop it here</p>
                  <span class="text-secondary">pdf</span><br>
                  <button type="button" class="btn btn-sm btn-outline-secondary my-2 text-bold" onclick="document.getElementById('file').click()">Browse File</button>
                  <input type="file" name="file" id="file" class="d-none" onchange="displayFileName()">
                </div>
              </div>
              <div id="file-info" class="mt-3"></div>
            </div>

            <script>
              function displayFileName() {
                const fileInput = document.getElementById('file');
                const fileInfo = document.getElementById('file-info');
                const file = fileInput.files[0];

                if (file) {
                  fileInfo.innerHTML = `<p>Uploaded file: ${file.name}</p>`;
                } else {
                  fileInfo.innerHTML = '<p>No file uploaded</p>';
                }
              }
            </script>

            <div class="col-md-12">
              <label for="inputState" class="form-label text-capitalize">isi surat</label>
              <textarea name="isi_surat" id="editor" class="form-control"></textarea>
            </div>

            <div class="text-center">
              <button type="submit" class="btn btn-primary text-capitalize"><i class="fas fa-folder-plus"></i> Simpan Surat</button>
            </div>
          </form><!-- End Multi Columns Form -->

        </div>
      </div>
    </div>
  </div>
</section>
@endsection
