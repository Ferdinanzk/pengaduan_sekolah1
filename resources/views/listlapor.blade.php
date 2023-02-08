@extends('layouts.frontend.master')
@section('content')
<section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="{{url('/')}}">Home</a></li>
          <li>List laporan</li>
        </ol>
        <h2>List Laporan</h2>

      </div>
    </section>
<section id="portfolio-details" class="portfolio-details">
<div class="col-lg-fixed">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">List Laporan </h5>
        @if(Session::has('message'))
      <div class="alert alert-success">
          {{Session::get('message')}}</div>
      @endif

        <!-- Table with stripped rows -->
        <table  class=" table table-striped" >
        <form action="/listlapor">
                    <div class="input-group mb-3">
                    <input class="form-control" type="text" placeholder="Search..." name="search" value="{{ request('search') }}">
                    <button class="btn btn-success" type="submit">Search</button>
                  </div>
                  </form>
          <tbody>
          @if (request('search'))
                @foreach ($pelaporans as $pelaporan)
                <div class="col-lg-4 col-md-6 features4-grid">
                    <div class="features4-grid-inn">
                        <span class="fa fa-user icon-fea4" aria-hidden="true"></span>
                    <p scope="row">Id: {{$pelaporan->id}}</p>
                    <p>Pelapor: {{$pelaporan->siswa->nama}}</p>
                    <p>Kategori: {{$pelaporan->kategori->keterangan}}</p>
                    <p>Lokasi: {{$pelaporan->lokasi}}</p>
                    <p>Keterangan: {{$pelaporan->keterangan}}</p>
                    </div>
                </div>
                @endforeach
                @endif
          </tbody>
        </table>
        <!-- End Table with stripped rows -->

      </div>
    </div>
</section>
@endsection