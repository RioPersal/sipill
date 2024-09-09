@extends('dashboard.master')
@section('judul','Edit Data Kaprodi')
@section('content')
<div class="card">
  <div class="card-body">
    <form class="form-horizontal" form action="/data-kaprodi/edit/{{$kaprodi->id}}" method="POST">
        @csrf
            <input type="hidden" name="id" value="{{ old('id', $kaprodi->id) }}">
            <input type="hidden" name="username" value="kaprodi">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <select name="nama" class="form-control @error('nama') is-invalid  @enderror">
                        <option  value="{{ old('nama', $kaprodi->nama) }}">{{$kaprodi->gelar_depan}}.{{$kaprodi->nama}}.{{$kaprodi->gelar_belakang}}</option>
                        @foreach ($dosens as $item)
                            <option value="{{ $item->nama }}">
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
                    @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            {{-- <div class="form-group row">
                <label class="col-sm-2 col-form-label">Gelar Depan (Opsional)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('gelar_depan') is-invalid  @enderror" name="gelar_depan" value="{{ old('gelar_depan', $kaprodi->gelar_depan) }}" placeholder="Gelar Depan (Opsional)">
                    @error('gelar_depan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Gelar Belakang (Opsional)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('gelar_belakang') is-invalid  @enderror" name="gelar_belakang" value="{{ old('gelar_belakang', $kaprodi->gelar_belakang) }}" placeholder="Gelar Belakang (Opsional)">
                    @error('gelar_belakang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div> --}}

            {{-- <div class="form-group row">
                <label class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('username') is-invalid  @enderror" name="username" value="{{ old('username', $user->username) }}" placeholder="Username" disabled>
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div> --}}

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control @error('password') is-invalid  @enderror" name="password" value="{{ old('password') }}" placeholder="Password">
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary">Edit</button>
            <a href="/data-kaprodi" class="btn btn-outline-secondary ml-1">Close</a>
        </div>
    </form>
</div>


@endsection
