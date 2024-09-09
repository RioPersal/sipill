@extends('dashboard.master')
@section('judul','Data Tahun Akademik')
@section('content')
<div class="card">
  <div class="card-header">
      <div class="row">
          <div class="col">
            <h5 class="text-bold mt-2">List Data Tahun Akademik</h5>
          </div>
          <right>
              <div class="col">
                <a href="{{url('/data-tahun-akademik/create/')}}" class="btn btn-sm btn-outline-primary"><i class="fa-regular fa-square-plus mr-1"></i>Tambah Data</a>
              </div>
          </right>
      </div>
  </div>
  <div class="card-body">
      <table class="table table-sm table-bordered">
        {{-- style="border: 1px solid black" --}}
          <thead>
              <tr>
                  <th class="text-center col-1">No</th>
                  <th class="text-center">Semester</th>
                  <th class="text-center">Tahun Akademik</th>
                  <th class="text-center">Aksi</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($tahunakademik as $key => $value)
            <tr>
                <td class="text-center align-middle">{{$key+1}}</td>
                <td class="text-center align-middle">{{$value->nama_semester}}</td>
                <td class="text-center align-middle">{{$value->tahun_akademik}}</td>
                <td class="col-2 text-center">
                  <a href="/data-tahun-akademik/edit/{{$value->id}}" class="btn btn-sm col btn-outline-warning"><i class="fa fa-edit"></i>Edit</a>
                  {{-- | --}}
                  <form action="/data-tahun-akademik/{{$value->id}}" method="POST" class="d-inline">
                      @method('DELETE')
                      @csrf
                      <button class="btn btn-sm col btn-outline-danger mt-2" onclick="return confirm('apa kamu yakin ingin menghapus data tersebut?')" type="submit"><i class = "fa fa-trash"></i>Hapus</button>
                  </form>
                    {{-- <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash" style="color: white"></i></a> --}}
                </td>
            </tr>

            
            @endforeach
          </tbody>
          {{-- <tfoot>
              <tr>
                <th class="text-center">No</th>
                  <th class="text-center">NIM</th>
                  <th class="text-center">Nama</th>
                  <th class="text-center">Email</th>
                  <th class="text-center">Angkatan</th>
                  <th class="text-center">semester</th>
              </tr>
          </tfoot> --}}
      </table>
  </div>
</div>
@endsection
