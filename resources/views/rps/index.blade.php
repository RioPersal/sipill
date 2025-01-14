@extends('dashboard.master')
@section('judul','Rencana Pembelajaran Semester')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <h3>List Mata Kuliah</h3>
            </div>
        </div>
        <table class="table table-sm table-bordered">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center col-2">Kode</th>
                    <th class="text-center col-5">Mata Kuliah</th>
                    <th class="text-center">Semester</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($matkul as $key => $value)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{$value->kode_matkul}}</td>
                    <td class="text-center">{{$value->nama_matkul}}</td>
                    <td class="text-center">{{$value->semester}}</td>
                    <td class="col-2 text-center">
                        {{-- @if ($matkul_ind->where('id_matkul', $value->id)->count() == 0)
                            <a href="{{url('/matkul-vs-indikator/create/'.$value->id)}}" class="btn btn-outline-success"><i class="fa fa-plus"></i></a>
                        @else
                            <a href="{{url('/matkul-vs-indikator/edit/'.$value->id)}}" class="btn btn-outline-warning"><i class="fa fa-edit"></i></a>
                        @endif
                        | --}}
                        <a class="btn btn-sm btn-outline-info" href="{{url('/rps/'.$value->id)}}"><i class="fa fa-eye"></i>Tampilkan</a>
                        {{-- <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash" style="color: white"></i></a> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
