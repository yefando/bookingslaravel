@extends('mainlayout')
@section('content')
@section('title') {{'Data Venues'}} @endsection
<div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
  <div class="widget-content widget-content-area br-6">
    <a href="{{ route('venues.create') }}" class="btn btn-md btn-success mb-3 mt-3 ml-3">TAMBAH VENUE</a>
    <table id="table" class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">Nama Venue</th>
          <th scope="col">Harga Venue</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($venues as $venue)
        <tr>
          <td>{{ $venue->namaVenue }}</td>
          <td>Rp.{{ number_format($venue->hargaVenue,2) }}</td>
          <td>
            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('venues.destroy', $venue->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <a href="{{ route('venues.edit', $venue->id) }}" class="btn btn-sm btn-primary">EDIT</a>
              <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
            </form>
          </td>
        </tr>
        @empty
        <div class="alert alert-danger">
          Data venue tidak tersedia dalam database
        </div>
        @endforelse
      </tbody>
    </table>
    {{ $venues->links() }}
    @endsection