@extends('dashboard.master')
@section('judul','Data Kaprodi')
@section('content')
<div class="card">
  <div class="card-body">
      <table class="table table-sm table-bordered">
          <thead>
              <tr>
                  <th class="text-center col-1">No</th>
                  <th class="text-center">Nama</th>
                  <th class="text-center col-2">Aksi</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($kaprodi as $key => $value)
            <tr>
                <td class="text-center align-middle">{{ $loop->iteration }}</td>
                <td class="text-center">
                    @if (isset($value->gelar_depan))
                    {{$value->gelar_depan}}.    
                    @endif

                    {{$value->nama}}

                    @if (isset($value->gelar_belakang))
                    {{$value->gelar_belakang}}
                    @endif
                  </td>
                <td class="col-2 text-center">
                  <a href="/data-kaprodi/edit/{{$value->id}}" class="btn btn-sm btn-outline-warning" title="Edit Data Kaprodi"><i class="fa fa-edit"></i></a>
                  {{-- | --}}
                  {{-- <form action="/data-kaprodi/{{$value->id}}" method="POST" class="d-inline">
                      @method('DELETE')
                      @csrf
                      <button class="btn btn-sm btn-outline-danger" onclick="return confirm('apa kamu yakin ingin menghapus data tersebut?')" type="submit"><i class = "fa fa-trash"></i>Hapus</button>
                  </form> --}}
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
                  <th class="text-center">Role</th>
              </tr>
          </tfoot> --}}
      </table>
  </div>
</div>

@endsection
@section('js')
<script>
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        var fileName = e.target.files[0].name;
        var label = document.querySelector('.custom-file-label');
        label.textContent = fileName;
    });
    </script>
@endsection