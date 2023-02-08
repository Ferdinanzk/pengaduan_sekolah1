@extends('layouts.master')
@section('content')

<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-4">
    <div class="card">
    <div class="card-header">Laporan Siswa </div>
    <center>
    <img src="{{asset('image')}}/{{$lapor->foto}}"
    class="img-responsibe" width="70%">
    </center>
    <div class="card-body">
    </div>
    </div>
    </div>
    <div class="col-md-8">
    <div class="card">
    <div class="card-header">Detail Laporan</div>
    <div class="card-body">
    @if (session('massage'))
                <div class="alert alert-success">
                    {{ session('massage') }}
                </div>
     @endif
    <p>Nama : <b>{{$lapor->siswa->nama}} </b> </p>
    <p>NISN : <b>{{$lapor->siswa->nisn}} </b> </p>
    <p>Kategori : <b>{{$lapor->kategori->ket_kategori}} </b> </p>
    <p>Lokasi : <b>{{$lapor->lokasi}} </b> </p>
    <p>Keterangan : <b>{{$lapor->keterangan}}</b> </p>
    <p> Status:
              @if(empty(App\Models\Aspirasi::where('pelaporan_id', $lapor->id)->latest()->first()->status))                   
                            <b></b>
                      @else
              <b>{{App\Models\Aspirasi::where('pelaporan_id', $lapor->id)->latest()->first()->status}}</b>
              
              @endif
              
      </p>

      <p> Aspirasi :
        @foreach(App\Models\Aspirasi::where('pelaporan_id', $lapor->id)->get() as $aspirasi )

                        <b> {{$aspirasi->created_at}} - {{$aspirasi->feedback}} </b><br>
              @endforeach
    </p>
    <br>

<div class="form-group">
<a href="{{route('aspirasi.show', [$lapor->id])}}">
<button class="btn btn-outline-primary">Beri Aspirasi</button></a>
</div>

    </div>
    </div>
    </div>
    </div>
    </div>

@endsection
