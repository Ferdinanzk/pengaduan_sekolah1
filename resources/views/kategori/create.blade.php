@extends('layouts.master')
@section('content')

<div class="col-lg-fixed">

    <div class="card">
      <div class="card-body">

      <h5 class="card-title">kategori Create</h5>

        <!-- Vertical Form -->
        @if(Session::has('message'))
      <div class="alert alert-success">
          {{Session::get('message')}}</div>
      @endif
        <form class="row g-3" action="{{route('kategori.store')}}" method="post">
          @csrf

          <div class="col-12">
            <label for="inputNanme4" class="form-label">Kategori</label>
            <input type="text" name="ket_kategori" class="form-control @error('ket_kategori') is-invalid @enderror"
                        value="{{ old('ket_kategori') }}" required autocomplete="ket_kategori" autofocus>
                        <div
                        @error('ket_kategori')
                             class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                        @enderror
                    </div>
                      </div>
        <br>
        

          <div class="text-center">
            <button type="submit" class="btn btn-primary">Tambah</button>

          </div>
        </form><!-- Vertical Form -->

      </div>
    </div>

@endsection
