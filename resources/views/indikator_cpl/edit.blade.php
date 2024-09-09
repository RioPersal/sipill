@extends('dashboard.master')
@section('judul','Edit CPMK')
@section('content')
<div class="card">
  <div class="card-body">
    <form class="form-horizontal" form action="/cpmk/edit/{{$indikator->id}}" method="POST">
        @csrf
            <input type="hidden" name="id" value="{{ old('id', $indikator->id) }}">
            <input type="hidden" name="id_cpl" value="{{ old('id_cpl', $indikator->id_cpl) }}">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kode CPL</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-3 mr-1">
                            <input type="text" class="form-control" value="{{ $cepeel->kode_cpl }}" disabled style="background-color: #ffffff; color: #333;">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Keterangan CPL</label>
                <div class="col-sm-10">
                    <textarea class="form-control" disabled style="background-color: #ffffff; color: #333;">{{ $cepeel->keterangan }}</textarea>
                </div>
            </div>

            <hr style="border-top: 1px solid">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kode CPMK</label>
                <div class="col-sm-10">
                    <div class="row">
                        {{-- <p class="mt-2">CPL-</p> --}}
                        <div class="col-3 mr-1">
                            <input type="text" class="form-control @error('indikator') is-invalid  @enderror" name="indikator" value="{{ old('indikator', $indikator->indikator) }}" placeholder="Kode CPMK">
                        </div>
                        @error('indikator')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Keterangan CPMK</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('ket_indikator') is-invalid  @enderror" name="ket_indikator" value="{{ old('ket_indikator', $indikator->ket_indikator) }}" placeholder="Keterangan CPMK">
                    @error('ket_indikator')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

        </div>
        <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary">Edit</button>
            <a href="/cpmk" class="btn btn-outline-secondary ml-1">Close</a>
        </div>
    </form>
</div>


@endsection
