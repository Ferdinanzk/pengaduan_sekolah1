@extends('layouts.master')
@section('content')

<div class="col-lg-fixed">

    <div class="card">
      <div class="card-body">

      <h5 class="card-title">Siswa Create</h5>

        <!-- Vertical Form -->
        @if(Session::has('message'))
      <div class="alert alert-success">
          {{Session::get('message')}}</div>
      @endif
        <form class="row g-3" action="{{route('siswa.store')}}" method="post">
          @csrf


          <div class="col-12">
            <label for="inputNanme4" class="form-label">NISN</label>
            <input type="text" name="nisn" class="form-control @error('nisn') is-invalid @enderror"
                        value="{{ old('nisn') }}" required autocomplete="nisn" autofocus>
                        <div
                        @error('nisn')
                             class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                        @enderror
                    </div>
                      </div>

          <div class="col-12">
            <label for="inputNanme4" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                        value="{{ old('nama') }}" required autocomplete="nama" autofocus>
                        <div
                        @error('nama')
                             class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                        @enderror
                    </div>
                      </div>


          <div class="col-12">
            <label for="inputAddress" class="form-label">Alamat</label>
            <textarea  name="alamat" class="form-control @error('alamat') is-invalid @enderror"
                        value="{{ old('alamat') }}" required autocomplete="alamat" autofocus>
                        @error('alamat')
                                <strong>{{ $message }}</strong>
                        @enderror
                 </textarea>
          </div>
        <br>
        

          <div class="text-center">
            <button type="submit" class="btn btn-primary">Tambah</button>

          </div>
        </form><!-- Vertical Form -->

      </div>
    </div>

@endsection
