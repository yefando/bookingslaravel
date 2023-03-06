<?php

namespace App\Http\Controllers;

use App\Models\Bookings;

use Illuminate\Http\Request;

class createBooking extends Controller
{
    public function index()
    {
        // get bookings
        $bookings = Bookings::join('venues', 'bookings.idGedung', '=', 'venues.id')
            ->select('bookings.*', 'venues.namaVenue', 'venues.id as idGedung')
            ->latest()
            ->paginate(5);


        // render
        return view('bookings.index', compact('bookings'));
    }

    // panggil view create
    public function create()
    {
        return view('bookings.usercreate');
    }

    public function store(Request $request)
    {
        // validasi
        $this->validate($request, [
            'namaClient' => 'required|min:4',
            'namaIstansi' => 'required|min:4',
            'idGedung' => 'required',
            'noHp' => 'required|min:12',
            'start' => 'required',
            'end' => 'required',
            'tujuan' => 'required',
        ]);

        // create data
        Bookings::create([
            'namaClient' => $request->namaClient,
            'namaIstansi' => $request->namaIstansi,
            'idGedung' => $request->idGedung,
            'noHp' => $request->noHp,
            'start' => $request->start,
            'end' => $request->end,
            'tujuan' => $request->tujuan
        ]);
        return redirect()->route('bookings.index')->with(['success' => 'data berhasil di input']);
    }

    // edit
    public function edit($id)
    {
        $bookings = Bookings::select('bookings.*', 'venues.*')
            ->join('venues', 'bookings.idGedung', '=', 'venues.id')
            ->findOrFail($id);
        return view('bookings.edit', compact('bookings'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'namaClient' => 'required|min:4',
            'namaIstansi' => 'required|min:4',
            'noHp' => 'required|min:12',
            'start' => 'required',
            'end' => 'required',
            'tujuan' => 'required',
        ]);

        $bookings = Bookings::findOrFail($id);
        $bookings->update([
            'namaClient' => $request->namaClient,
            'namaIstansi' => $request->namaIstansi,
            'noHp' => $request->noHp,
            'start' => $request->start,
            'end' => $request->end,
            'tujuan' => $request->tujuan
        ]);

        return redirect()->route('bookings.index')->with(['success' => 'data berhasil di update']);
    }

    public function destroy($id)
    {
        $bookings = Bookings::find($id);
        $bookings->delete();
        return redirect()->route('bookings.index')->with(['success' => 'data berhasil di hapus']);
    }
}
