@extends('dashboard.master')
@section('judul','Data User')
@section('content')
<div class="card">
  <div class="card-header">
      <div class="row">
          <div class="col">
              <a href="{{url('/data-user/create/')}}" class="btn btn-outline-primary"><i class="fa-regular fa-square-plus mr-1"></i>Tambah Data</a>
          </div>
          <right>
              <div class="col mr-1">
                  <b>
                    <a href="#" class="btn btn-outline-warning"><i class="fa fa-edit"></i></a> = Edit
                    <b class="mx-2">|</b>
                    <a href="#" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a> = Hapus
                  </b>
              </div>
          </right>
      </div>
  </div>
  <div class="card-body">
      <table class="table table-bordered table-striped">
          <thead>
              <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">NIM</th>
                  <th class="text-center">Nama</th>
                  <th class="text-center">Email</th>
                  <th class="text-center">Angkatan</th>
                  <th class="text-center">Role</th>
                  <th class="text-center">Aksi</th>
              </tr>
          </thead>
          <tbody>
            ##
            {{-- @foreach ($mahasiswa as $key => $value)
            <tr>
                <td class="text-center">{{$key+1}}</td>
                <td class="text-center">{{$value->nim}}</td>
                <td class="text-center">{{$value->nama}}</td>
                <td class="text-center">{{$value->email}}</td>
                <td class="text-center">{{$value->angkatan}}</td>
                <td class="text-center">{{$value->role_id}}</td>
                <td class="col-2 text-center">
                  <a href="/data-mahasiswa/edit/{{$value->id}}" class="btn btn-outline-warning"><i class="fa fa-edit"></i></a>
                  |
                  <form action="/data-mahasiswa/{{$value->id}}" method="POST" class="d-inline">
                      @method('DELETE')
                      @csrf
                      <button class="btn btn-outline-danger" onclick="return confirm('apa kamu yakin ingin menghapus data tersebut?')" type="submit"><i class = "fa fa-trash"></i></button>
                  </form>
                    
                </td>
            </tr>
            @endforeach --}}
          </tbody>
          {{-- <tfoot>
              <tr>
                <th class="text-center">No</th>
                  <th class="text-center">NIM</th>
                  <th class="text-center">Nama</th>
                  <th class="text-center">Email</th>
                  <th class="text-center">Angkatan</th>
                  <th class="text-center">Role</th>
              </tr>
          </tfoot> --}}
      </table>
  </div>
</div>
@endsection
