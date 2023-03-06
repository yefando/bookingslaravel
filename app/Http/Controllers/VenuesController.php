<?php

namespace App\Http\Controllers;

use App\Models\Venue;

use Illuminate\Http\Request;

class VenuesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $venues = Venue::latest()->paginate(5);

        // render
        return view('venues.index', compact('venues'));
    }

    public function create()
    {
        return view('venues.create');
    }

    public function store(Request $request)
    {
        // validasi
        $this->validate($request, [
            'namaVenue' => 'required|min:4',
            'hargaVenue' => 'required',

        ]);

        // simpan
        Venue::create([
            'namaVenue' => $request->namaVenue,
            'hargaVenue' => str_replace('.', '', $request->hargaVenue)

        ]);

        return redirect()->route('venues.index')->with(['success' => 'data berhasil di input']);
    }

    public function edit($id)
    {
        $venue = Venue::findOrFail($id);
        return view('venues.edit', compact('venue'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'namaVenue' => 'required|min:4',
            'hargaVenue' => 'required'
        ]);

        $Venues = Venue::findOrFail($id);
        $Venues->update([
            'namaVenue' => $request->namaVenue,
            'hargaVenue' => str_replace('.', '', $request->hargaVenue)

        ]);
        return redirect()->route('venues.index')->with(['success' => 'data berhasil di edit']);
    }



    public function destroy($id)
    {
        $venues = Venue::find($id);
        $venues->delete();
        return redirect()->route('venues.index')->with(['success' => 'data berhasil di hapus']);
    }
}
