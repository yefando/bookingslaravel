@extends('mainlayout')
@section('content')
    
                        <a href="{{ route('bookings.create') }}" class="btn btn-md btn-success mb-3">TAMBAH BOOKING</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">Nama Client</th>
                                <th scope="col">Nama Istansi</th>
                                <th scope="col">Nomor Hp</th>
                                <th scope="col">Tujuan</th>
                                <th scope="col">Waktu Mulai</th>
                                <th scope="col">Waktu Selesai</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($bookings as $booking)
                                <tr>
                                    <td>{{ $booking->namaClient }}</td>
                                    <td>{{ $booking->namaIstansi }}</td>
                                    <td>{{ $booking->noHp }}</td>
                                    <td>{{ $booking->tujuan }}</td>
                                    <td>{{ $booking->start }}</td>
                                    <td>{{ $booking->end }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('bookings.destroy', $booking->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data booking belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $bookings->links() }}
@endsection
