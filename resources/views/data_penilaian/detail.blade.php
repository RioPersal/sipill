@extends('dashboard.master')
@section('judul','Detail Tambah Penilaian')
@section('css')
<style>
.table-responsive {
  overflow-x: auto;
}

.table {
  white-space: nowrap;
}
</style>
@endsection
@section('content')
<div class="card">
  <div class="card-header">
      <div class="row">
          <div class="col-2">
            <br>
            <a href="{{url('/data-penilaian')}}" class="btn btn-sm btn-outline-primary" title="Kembali"><i class="fa fa-arrow-left"></i></a>
          </div>
          <div class="col text-right">
            <right>
              <h5 class="text-bold">{{ $matkul->nama_matkul }}</h5>
              @foreach($tahunakademik->where('id', $kelas->id_tahunakademik) as $item )    
                <b>({{ $matkul->semester }})</b> {{ $item->nama_semester }} {{ $item->tahun_akademik }}
              @endforeach
              <br>  
              {{ $kelas->nama_kelas }}
            </right>
          </div>
      </div>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-sm table-bordered">
          <thead>
            <tr>
              {{-- <th class="text-center align-middle" rowspan="5">NIM</th> --}}
              <th class="text-center align-middle col-2" rowspan="5" nowrap>Nama Mahasiswa<br>(NIM)</th>
              @php
                  $count_2 = 0;
              @endphp
              @foreach ($cepeel as $cpl)
              @php
               $count = 0;
               $count_cpmk = 0;
               $count_bobot = 0;
               
               $count_indikator = $indikator->where('id_cpl',$cpl->id)->count();
               foreach ($indikator->where('id_cpl',$cpl->id) as $ind) {
                //  $count_indikator = 0;
                 $count_cpmk = $count_cpmk + $cpmk->where('id_indikator',$ind->id)->where('id_matkul',$matkul->id)->count();
                  foreach ($cpmk->where('id_indikator',$ind->id)->where('id_matkul',$matkul->id) as $value) {
                    // $count_2 = $count_2 + $bobot_cpmk->where('id_cpmk',$value->id)->count();
                    if ($bobot_cpmk->where('id_cpmk',$value->id)->count() == 0) {
                      $count_bobot = $count_bobot + 1;
                    } else {
                      $count_bobot = $count_bobot + $bobot_cpmk->where('id_cpmk',$value->id)->count();
                    }
                  }
                  // dd($count_bobot);
                }
                
                if ($count_cpmk == 0) {
                  $count = $count_indikator;
                } elseif ($count_cpmk == 1 && $count_bobot == 0) {
                  $count = $count_indikator;
                // } elseif ($count_cpmk == 1 && $count_bobot != 0) {
                //   $count = $count_cpmk + $count_bobot;
                } else {
                  if ($count_bobot == 0) {
                    $count = $count_cpmk;
                  } else {
                    $count = $count_bobot;
                    $count_2 = $count_2 + $count + 1;
                  }
                  
                }
                
                  
                  // $count_ind = $indikator->where('id_cpl',$cpl->id)->count()
              @endphp
                <th class="text-center align-middle" colspan="{{ $count }}">{{ $cpl->kode_cpl }}</th>
              @endforeach
              @foreach ($cepeel as $cpl)
              <th class="text-center align-middle" rowspan="5">{{ $cpl->kode_cpl }}</th>
              @endforeach
              <th class="text-center align-middle" rowspan="5">Aksi</th>
            </tr>

            {{-- <tr>
              @foreach ($cepeel as $cpl)
                @foreach ($indikator->where('id_cpl',$cpl->id) as $ind)
                    <th class="text-center align-middle" colspan="{{ $cpmk->where('id_indikator',$ind->id)->where('id_matkul',$matkul->id)->count() }}">{{ $ind->indikator }}</th>
                @endforeach
              @endforeach
            </tr> --}}

            @if ($cpmk->whereIn('id_indikator', $indikator->pluck('id'))->where('id_matkul', $matkul->id)->count() == 0)
            <th class="text-center align-middle" colspan="{{ $cepeel->count() }}">#</th>
            @else

            <tr>
              @foreach ($cepeel as $cpl)
                @foreach ($indikator->where('id_cpl', $cpl->id) as $ind)
                @php
                  $ttl = 0;
                    foreach ($cpmk->where('id_indikator', $ind->id)->where('id_matkul', $matkul->id) as $item){
                      $ttl = $ttl + $bobot_cpmk->where('id_cpmk', $item->id)->count();
                    }
                @endphp
                  {{-- @foreach ($cpmk->where('id_indikator', $ind->id)->where('id_matkul', $matkul->id) as $item) --}}
                    <th class="text-center align-middle" colspan="{{ $ttl }}" style="font-size: 12px">{{ $ind->indikator }}</th>
                  {{-- @endforeach --}}
                @endforeach
              @endforeach
            </tr>

            <tr>
              @foreach ($cepeel as $cpl)
                      @foreach ($indikator->where('id_cpl', $cpl->id) as $ind)
                      @if ($cpmk->where('id_indikator', $ind->id)->where('id_matkul', $matkul->id)->count() != 0)
                          @foreach ($cpmk->where('id_indikator', $ind->id)->where('id_matkul', $matkul->id) as $item)
                          <th class="text-center align-middle" colspan="{{ $bobot_cpmk->where('id_cpmk', $item->id)->count() }}" style="font-size: 12px">{{ $item->kode_cpmk }}</th>
                          
                          @endforeach
                          @else
                          
                          <th class="text-center align-middle" style="font-size: 12px">#</th>
                          @endif
                      @endforeach
              @endforeach
            </tr>
          

            <tr>
              @foreach ($cepeel as $cpl)
                @foreach ($indikator->where('id_cpl',$cpl->id) as $ind)
                @if ($cpmk->where('id_indikator', $ind->id)->where('id_matkul', $matkul->id)->count() != 0)
                @foreach ($cpmk->where('id_indikator',$ind->id)->where('id_matkul',$matkul->id) as $item)
                @if ($bobot_cpmk->where('id_cpmk',$item->id)->count() == 0)
                  <th class="text-center align-middle">#</th>
                @else
                      @foreach ($bobot_cpmk->where('id_cpmk',$item->id) as $bbt)
                        <th class="text-center align-middle" style="font-size: 12px">{{ $bbt->pilihan_asesmen }}</th>  
                      @endforeach  
                      @endif  
                    @endforeach
                    @else
                          
                          <th class="text-center align-middle" style="font-size: 12px">#</th>
                          @endif
                @endforeach
              @endforeach
            </tr>

            <tr>
              @foreach ($cepeel as $cpl)
                @foreach ($indikator->where('id_cpl',$cpl->id) as $ind)
                @if ($cpmk->where('id_indikator', $ind->id)->where('id_matkul', $matkul->id)->count() != 0)
                @foreach ($cpmk->where('id_indikator',$ind->id)->where('id_matkul',$matkul->id) as $item)
                @if ($bobot_cpmk->where('id_cpmk',$item->id)->count() == 0)
                  <th class="text-center align-middle">#</th>
                @else
                      @foreach ($bobot_cpmk->where('id_cpmk',$item->id) as $bbt)
                        <th class="text-center align-middle" style="font-size: 12px">{{ $bbt->bobot_cpmk }}%</th>  
                      @endforeach  
                      @endif  
                    @endforeach
                    @else
                          
                          <th class="text-center align-middle" style="font-size: 12px">#</th>
                          @endif
                @endforeach
              @endforeach
            </tr>
            @endif
            {{-- <tr>
              <th class="text-center align-middle">NIM</th>
              <th class="text-center align-middle">NIM</th>
              <th class="text-center align-middle">NIM</th>
            </tr> --}}
          </thead>
          <tbody>
              @foreach ($peserta->where('id_kelas', $kelas->id) as $key => $value)
            {{-- @php
                $a=0;
            @endphp --}}
                <tr>
                    @foreach($mahasiswa->where('id', $value->id_mahasiswa) as $mhs)
                      <td class="text-center align-middle" style="font-size: 12px">{{ $mhs->nama }}<br>({{ $mhs->nim }})</td>
                    @endforeach
                    @if ($value->exists() && $penilaian->where('id_mahasiswa', $value->id_mahasiswa)->where('id_kelas',$kelas->id)->count() == 0)
                        <td class="text-center align-middle bg-light" colspan="{{ $count_2 }}" nowrap>
                          Nilai belum tersedia, harap input nilai terlebih dahulu 
                        </td>
                    @else
                    @foreach ($penilaian->where('id_mahasiswa',$value->id_mahasiswa)->where('id_kelas',$kelas->id) as $nilai)
                    
                    @if ($nilai->nilai == 0)
                    <td class="text-center align-middle" style="font-size: 12px">0</td>
                    @else
                    <td class="text-center align-middle" style="font-size: 12px">
                      {{-- @foreach ($bobot_cpmk->where('id',$nilai->id_asesmen) as $bbt) --}}
                      {{ $nilai->nilai }}
                          {{-- @php
                            $a += $nilai->nilai*$bbt->bobot_cpmk/100;
                          @endphp
                      @endforeach --}}
                    </td>
                    @endif 
                    @endforeach
                    
                    @foreach ($cepeel as $cpl)
                          @php
                              $hasil = 0;
                          @endphp
                        @foreach ($indikator->where('id_cpl',$cpl->id) as $ind)
                            @foreach ($cpmk->where('id_matkul',$matkul->id)->where('id_indikator',$ind->id) as $cp)
                                @foreach ($bobot_cpmk->where('id_cpmk',$cp->id) as $bot)
                                    @foreach ($penilaian->where('id_mahasiswa',$value->id_mahasiswa)->where('id_kelas',$kelas->id)->where('id_asesmen',$bot->id) as $nilai2)
                                        @php
                                            $hasil += $nilai2->nilai*($bot->bobot_cpmk/100);
                                        @endphp
                                    @endforeach
                                @endforeach
                            @endforeach
                        @endforeach
                        <td class="text-center align-middle" style="font-size: 12px">{{ $hasil }}</td>
                    @endforeach
                    {{-- @foreach ($cepeel as $cpl)
                      @php
                        $jumlah_rata_rata = 0;
                        
                        $jumlah_nilai_cpl = 0;
                        $jumlah_nilai_ind_final = 0;
                      @endphp

                      @foreach ($indikator->where('id_cpl',$cpl->id) as $ind)
                        @php
                          $jumlah_nilai_ind = 0;
                          $jumlah_hasil_rata_rata = 0;
                        @endphp

                        @foreach ($cpmk->where('id_indikator',$ind->id)->where('id_matkul',$matkul->id) as $cpm)
                          @foreach ($bobot_cpmk->where('id_cpmk',$cpm->id) as $bobot)
                            @foreach ($penilaian->where('id_mahasiswa',$value->id_mahasiswa)->where('id_kelas',$kelas->id)->where('id_asesmen',$bobot->id) as $nilai2)
                              @php
                                $jumlah_nilai_ind += $nilai2->nilai*($bobot->bobot_cpmk/100);
                                $jumlah_nilai_ind_final += $jumlah_nilai_ind;
                              @endphp
                            @endforeach
                          @endforeach
                        @endforeach

                        @foreach ($mat_ind->where('id',$id_matdin) as $matdin)
                          @php
                            $rata_rata_ind = 1/$matkul->sks;
                            $rata_rata_mat_ind = $rata_rata_ind*$matdin->bobot_indikator;
                            $jumlah_rata_rata += $rata_rata_mat_ind;
                            $jumlah_hasil_rata_rata = $rata_rata_mat_ind/$jumlah_rata_rata;
                            
                          @endphp
                        @endforeach
                      @endforeach

                      @php
                        $jumlah_nilai_cpl = $jumlah_nilai_cpl+($jumlah_nilai_ind_final*$jumlah_hasil_rata_rata);
                      @endphp
                      
                      <td class="text-center align-middle" style="font-size: 12px">{{ $jumlah_nilai_ind}}</td>
                    @endforeach --}}
                    @endif
                    
                  <td class="text-center align-middle">
                    @if ($penilaian->where('id_mahasiswa', $value->id_mahasiswa)->where('id_kelas',$kelas->id)->count() == 0)
                    <a href="{{url('/data-penilaian/'.$kelas->id.'/create/'.$value->id)}}" class="btn btn-sm btn-outline-success" title="Tambah Data Penilaian"><i class="fa fa-plus"></i></a>
                        
                    @else
                    <a href="{{url('/data-penilaian/'.$kelas->id.'/edit/'.$value->id)}}" class="btn btn-sm btn-outline-warning" title="Edit Data Penilaian"><i class="fa fa-edit"></i></a>
                        
                    @endif
                  </td>
                </tr>
              @endforeach
              
          </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
