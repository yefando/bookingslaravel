@extends('mainlayout')
@section('content')
@section('title') {{'Venues'}} @endsection
<div class="col-xl-6 col-lg-6 col-sm-6 layout-spacing">
    <div class="widget-content widget-content-area br-6">
        <form action="{{ route('venues.store') }}" method="POST">

            @csrf

            <div class="form-group">
                <label class="font-weight-bold">Nama Venue</label>
                <input type="text" class="form-control @error('namaVenue') is-invalid @enderror" name="namaVenue" value="{{ old('namaVenue') }}" placeholder="Masukkan Nama Venue">

                <!-- error message untuk title -->
                @error('title')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label class="font-weight-bold">Harga</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                    </div>
                    <input id="hargaVenue" type="text" class="form-control @error('hargaVenue') is-invalid @enderror" name="hargaVenue" value="{{ old('hargaVenue') }}" placeholder="Masukkan Harga Venue">
                </div>
                <!-- error message untuk hargaVenue -->
                @error('hargaVenue')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
            <button type="reset" class="btn btn-md btn-warning">RESET</button>

        </form>
        @endsection