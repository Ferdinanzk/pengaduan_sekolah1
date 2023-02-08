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
        <form class="row g-3" action="{{route('kategori.update',[$kategori->id])}}" method="post">
          @csrf
          {{method_field('PUT')}}

          <div class="col-12">
            <label for="inputNanme4" class="form-label">Nama</label>
            <input type="text" name="ket_kategori" class="form-control" id="inputNanme4" value="{{$kategori->ket_kategori}}">
          </div>
        <br>
        

          <div class="text-center">
            <button type="submit" class="btn btn-primary">Tambah</button>

          </div>
        </form><!-- Vertical Form -->

      </div>
    </div>

@endsection
