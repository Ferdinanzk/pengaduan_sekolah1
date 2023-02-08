@extends('layouts.master')
@section('content')

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
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Kategori</th>
              <th scope="col">Lokasi</th>
              <th scope="col">Keterangan</th>
              <th scope="col">Foto</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
          @if(count($lapors)>0)
                          @foreach($lapors as $key=>$lapor)
                          <tr>
                              <th scope="row">{{$key+1}}</th>
                              <td>{{$lapor->siswa->nama}}</td>
                              <td>{{$lapor->kategori->ket_kategori}}</td>
                              <td>{{$lapor->lokasi}}</td>
                              <td>{{$lapor->keterangan}}</td>
                              <td><img src="{{asset('image')}}/{{$lapor->foto}}" width="200" height="155"></td>
                              <td>
                              <a href="{{route('laporan.show',[$lapor->id])}}"><button
                                          class="btn btn-outline-primary bi bi-eye-fill" aria-hidden="true"
                                          style="font-size:12px"></button></a>

                              <a href="{{route('laporan.edit',[$lapor->id])}}"><button
                                          class="btn btn-outline-success bi bi-pencil-square" aria-hidden="true"
                                          style="font-size:12px"></button></a>



                                  <!-- Button trigger modal -->
                                  <button type="button" class="btn btn-outline-danger bi bi-trash"  style="font-size:12px"
                                   data-bs-toggle="modal" data-bs-target="#basicModal{{$lapor->id}}">

                                  </button>
                                  <div class="modal fade" id="basicModal{{$lapor->id}}" tabindex="-1">
                                      <div class="modal-dialog">
                                      <form action="{{route('laporan.destroy',[$lapor->id])}}" method="post">
                                          @csrf
                                          {{method_field('DELETE')}}
                                      <div class="modal-content">
                                          <div class="modal-header">
                                          <h5 class="modal-title">Delete</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                          Anda Yakin?
                                          </div>
                                          <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-outline-danger">Delete</button>
                                          </div>
                                      </div>
                                      </form>
                                      </div>
                                  </div>

                                   <!-- detail botton -->



                             
                              </td>

                              @endforeach

                              @endif
          </tbody>
        </table>
        <!-- End Table with stripped rows -->

      </div>
    </div>

@endsection
