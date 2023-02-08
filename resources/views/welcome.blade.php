@extends('layouts.frontend.master')
@section('content')

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">WELCOME</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Silahkan Berikan Pengaduan Kalian</h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="#contact" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Get Started</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="{{ asset('ok/assets/img/hero-img.png') }}" class="img-fluid" alt="">
        </div>
      </div>
    </div>

    
  </section>


  <section id="contact" class="contact">
<div class="footer-newsletter" >
      <div class="container">
        <div class="row justify-content-center">
        <div class="col-lg-12 text-center">
            <h4>Pengaduan Sekolah </h4>
            <p>Silahkan Input Pengaduan Kalian Disini </p>
          </div>
          <div class="col-lg-6" id="contact">
          <form class="form" action="{{route('laporan.store')}}" method="post" enctype="multipart/form-data">  
          @if(Session::has('message'))
      <div class="alert alert-success">
          {{Session::get('message')}}</div>
      @endif


    @csrf 
          <div class="row gy-4">

        <div class="col-md-12">
        <label for="inputNanme4" class="form-label">Pilih Nama</label>
        <select name="nama" class="form-control @error('nama') is-invalid @enderror">
          <option value="">Pilih Siswa</option>
          @foreach(App\Models\Siswa::all() as $siswa)
          <option value="{{$siswa->id}}">{{$siswa->nama}}</option>
          @endforeach
          </select>
          @error('nama')
          <strong>{{ $message }}</strong>
          @enderror
        </div>

        <div class="col-md-12">
        <label for="inputNanme4" class="form-label">Pilih Kategori</label>
        <select name="ket_kategori" class="form-control @error('category') is-invalid @enderror">
          <option value="">Pilih Kategori</option>
          @foreach(App\Models\Kategori::all() as $kategori)
          <option value="{{$kategori->id}}">{{$kategori->ket_kategori}}</option>
          @endforeach
          </select>
          @error('ket_kategori')
          <strong>{{ $message }}</strong>
          @enderror
        </div>

        <div class="col-md-12">
        <label for="inputNanme4" class="form-label">Lokasi</label>
        <textarea name="lokasi" class="form-control @error('lokasi') is-invalid @enderror">
        </textarea>
        @error('lokasi')
        <strong>{{ $message }}</strong>
        @enderror
        </div>

        <div class="col-md-12">
        <label for="inputNanme4" class="form-label">Keterangan</label>
        <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror">
        </textarea>
        @error('keterangan')
        <strong>{{ $message }}</strong>
        @enderror
        </div>

        

        <div class="col-md-12 ">
        <label for="inputNanme4" class="form-label">Foto</label>
        <input type="file" name="foto"
        class="form-control @error('foto') is-invalid @enderror">
        @error('foto')
        <strong>{{ $message }}</strong>
        @enderror
        </div>

        <div class="col-md-12 text-center">
          <button type="submit">Kirim Pengaduan</button>
        </div>
      </div>
    </form>
  </div>
        </div>
      </div>
    </div>
</section>
@endsection



    
