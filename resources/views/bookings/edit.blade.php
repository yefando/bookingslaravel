@extends('mainlayout')
@section('content')
@section('title') {{'Edit Data'}} @endsection
<div class="col-xl-6 col-lg-6 col-sm-6 layout-spacing">
    <div class="widget-content widget-content-area br-6">
        <form method="POST" action="{{ route('bookings.update', $bookings->id) }}">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="font-weight-bold">Nama Lengkap</label>
                <input type="text" class="form-control @error('namaClient') is-invalid @enderror" name="namaClient" value="{{ old('namaClient', $bookings->namaClient) }}" placeholder="Masukkan Nama Lengkap">

                <!-- error message untuk title -->
                @error('title')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Nama Istansi</label>
                <input type="text" class="form-control @error('namaIstansi') is-invalid @enderror" name="namaIstansi" value="{{ old('namaIstansi', $bookings->namaIstansi) }}" placeholder="Masukkan Nama Istansi">

                <!-- error message untuk title -->
                @error('title')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <?php $venues = DB::table('venues')->distinct()->get(['id', 'namaVenue']); ?>
            <?php $booking = DB::table('bookings')->distinct()->get('idGedung'); ?>

            <div class="form-group">
                <label class="font-weight-bold">Pilih Venue</label>
                <select class="form-control" name="idGedung">
                    <option value="">-- Pilih Venue --</option>
                    @foreach($venues as $venue)
                    <option value="{{ $venue->id }}" @foreach($booking as $item) @if($item->idGedung == $venue->id) selected @endif @endforeach>{{ $venue->namaVenue }}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <label class="font-weight-bold">Nomor Hp</label>
                <input type="text" class="form-control @error('namaIstansi') is-invalid @enderror" name="noHp" value="{{ old('noHp', $bookings->noHp) }}" placeholder="Masukkan Nomor Hp">

                <!-- error message untuk title -->
                @error('title')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label class="font-weight-bold">Waktu Mulai</label>
                <input type="date" class="form-control @error('start') is-invalid @enderror" name="start" value="{{ old('start', $bookings->start) }}" placeholder="Masukkan Waktu Mulai">

                <!-- error message untuk title -->
                @error('title')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label class="font-weight-bold">Waktu Selesai</label>
                <input type="date" class="form-control @error('end') is-invalid @enderror" name="end" value="{{ old('end', $bookings->end) }}" placeholder="Masukkan Waktu Selesai">

                <!-- error message untuk title -->
                @error('title')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label class="font-weight-bold">Tujuan</label>
                <textarea class="form-control @error('tujuan') is-invalid @enderror" name="tujuan" rows="5" placeholder="Masukkan Tujuan Peminjaman">{{ old('tujuan', $bookings->tujuan) }}</textarea>

                <!-- error message untuk content -->
                @error('content')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
            <button type="reset" class="btn btn-md btn-warning">RESET</button>

        </form>

        @endsection