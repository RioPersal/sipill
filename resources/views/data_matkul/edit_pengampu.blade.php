@extends('dashboard.master')
@section('judul','Tambah Koordinator dan Pengampu Mata Kuliah')
@section('content')
<div class="card">
  <div class="card-body">
    <form class="form-horizontal" form action="{{url ('/data-mata-kuliah/{matkul:id}/koordinator-dan-pengampu/edit')}}" method="POST">
        @csrf
            <input type="hidden" name="id" value="{{ old('id', $pengampu->id) }}">
            <input type="hidden" name="id_matkul" value="{{ old('id_matkul', $matkul->id) }}">

            <div class="row">
                <label class="col-sm-1 col-form-label">Mata Kuliah</label>
                {{-- <h5 class="col-sm-2 col-form-label">{{ $matkul->nama_matkul }}</h5> --}}
                <div class="col-sm-5 pl-0">                    
                    <p class="col-sm-10 col-form-label">{{$matkul->nama_matkul}}</p>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-1 col-form-label">Kode</label>
                {{-- <h5 class="col-sm-2 col-form-label">{{ $matkul->nama_matkul }}</h5> --}}
                <div class="col-sm-2 pl-0">
                    <p class="col-sm-10 col-form-label">{{$matkul->kode_matkul}}</p>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-1 col-form-label">SKS</label>
                {{-- <h5 class="col-sm-2 col-form-label">{{ $matkul->nama_matkul }}</h5> --}}
                <div class="col-sm-1 pl-0">
                    <p class="col-sm-10 col-form-label">{{$matkul->sks}}</p>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-1 col-form-label">Semester</label>
                {{-- <h5 class="col-sm-2 col-form-label">{{ $matkul->nama_matkul }}</h5> --}}
                <div class="col-sm-1 pl-0">
                    <p class="col-sm-10 col-form-label">{{$matkul->semester}}</p>
                </div>
            </div>

            <div class="form-group row mt-2">
                <label class="col-sm-2 col-form-label">Koordinator Kelompok Bidang Keahlian</label>
                <div class="col-sm-10">
                    <select name="id_koordinator" class="form-control @error('id_koordinator') is-invalid  @enderror">
                        <option  value="{{ old('id_koordinator', $pengampu->id_koordinator) }}">
                            
                            @foreach($dosen->where('id', $pengampu->id_koordinator) as $data)
                                @if (isset($data->gelar_depan))
                                {{$data->gelar_depan}}.    
                                @endif
            
                                {{$data->nama}}
            
                                @if (isset($data->gelar_belakang))
                                {{$data->gelar_belakang}}
                                @endif
                            @endforeach
                        </option>

                        @foreach ($dosen as $item)
                            <option value="{{ $item->id }}">
                                @if (isset($item->gelar_depan))
                                    {{$item->gelar_depan}}.    
                                @endif
                
                                {{$item->nama}}
                
                                @if (isset($item->gelar_belakang))
                                    {{$item->gelar_belakang}}
                                @endif
                            </option>
                        @endforeach
                    </select>
                    @error('id_koordinator')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div id="inputContainer">
                @for ($i = 0; $i < $count; $i++)
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Dosen Pengampu</label>
                        <div class="col-sm-10">
                            <select name="id_pengampu[]" class="form-control @error('id_pengampu') is-invalid  @enderror">
                                <option  value="{{ $value_pengampu[$i] }}">
                            
                                    @foreach($dosen->where('id', $value_pengampu[$i]) as $data)
                                        @if (isset($data->gelar_depan))
                                        {{$data->gelar_depan}}.    
                                        @endif
                    
                                        {{$data->nama}}
                    
                                        @if (isset($data->gelar_belakang))
                                        {{$data->gelar_belakang}}
                                        @endif
                                    @endforeach
                                </option>
                                
                                @foreach ($dosen as $item)
                                    <option value="{{ $item->id }}">
                                        @if (isset($item->gelar_depan))
                                            {{$item->gelar_depan}}.    
                                        @endif
                    
                                        {{$item->nama}}
                    
                                        @if (isset($item->gelar_belakang))
                                            {{$item->gelar_belakang}}
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                            @error('id_pengampu')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                @endfor
            </div>
            

            <button type="button" id="addButton" class="btn btn-outline-success">Tambah Dosen Pengampu</button>

        </div>
        <div class="card-footer text-right">
            <button type="submit" class="btn btn-outline-primary">Edit</button>
            <a href="/data-mata-kuliah" class="btn btn-outline-secondary ml-1">Close</a>
        </div>
    </form>
</div>


@endsection
@section('js')
<script>
    document.getElementById('addButton').addEventListener('click', function() {
      var inputContainer = document.getElementById('inputContainer');
      var newInput = document.createElement('div');
      newInput.className = 'form-group row';
      newInput.innerHTML = `
        <label class="col-sm-2 col-form-label">Dosen Pengampu</label>
        <div class="col-sm-10">
            <select name="id_pengampu[]" class="form-control @error('id_pengampu') is-invalid  @enderror">
                <option value="">- pilih -</option>
                @foreach ($dosen as $item)
                    <option value="{{ $item->id }}">
                        @if (isset($item->gelar_depan))
                            {{$item->gelar_depan}}.    
                        @endif
        
                        {{$item->nama}}
        
                        @if (isset($item->gelar_belakang))
                            {{$item->gelar_belakang}}
                        @endif
                    </option>
                @endforeach
            </select>
            @error('id_pengampu')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
      `;
      inputContainer.appendChild(newInput);
    });
  </script>
  
@endsection