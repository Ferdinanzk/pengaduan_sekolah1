@extends('layouts.master')
@section('content')

<div class="col-lg-fixed">

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">List Kategori </h5>
        @if(Session::has('message'))
      <div class="alert alert-success">
          {{Session::get('message')}}</div>
      @endif

        <!-- Table with stripped rows -->
        <table  class=" table table-striped" >
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Kategori</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
          @if(count($kategoris)>0)
                          @foreach($kategoris as $key=>$kategori)
                          <tr>
                              <th scope="row">{{$key+1}}</th>
                              <td>{{$kategori->ket_kategori}}</td>
                              <td>
                              <a href="{{route('kategori.edit',[$kategori->id])}}"><button
                                          class="btn btn-outline-success bi bi-pencil-square" aria-hidden="true"
                                          style="font-size:12px"></button></a>



                                  <!-- Button trigger modal -->
                                  <button type="button" class="btn btn-outline-danger bi bi-trash"  style="font-size:12px"
                                   data-bs-toggle="modal" data-bs-target="#basicModal{{$kategori->id}}">

                                  </button>
                                  <div class="modal fade" id="basicModal{{$kategori->id}}" tabindex="-1">
                                      <div class="modal-dialog">
                                      <form action="{{route('kategori.destroy',[$kategori->id])}}" method="post">
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
