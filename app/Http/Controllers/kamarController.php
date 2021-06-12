<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kamar;
use App\Exports\KamarExport;
use Maatwebsite\Excel\Facades\Excel;

class kamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DB::table('kamar')
        ->join('dokter', 'kamar.id_pasien', '=', 'dokter.id')
        ->join('pasien', 'kamar.id_dokter', '=', 'pasien.id')
        ->select('kamar.*', 'pasien.nama as namap', 'dokter.nama as namad')
        ->get();
        return view('tampil.kamart' , ['kamar' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form.newkamar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'id_pasien' => 'required',
            'id_dokter' => 'required',
        ]);

        DB::table('kamar')->insert([
            'id_pasien' => $request->id_pasien,
            'id_dokter' => $request->id_dokter
        ]);
        // alihkan halaman ke halaman dokter
        return redirect()->route('kamar.index')->with('Success','Data Kamar Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Kamar $kamar
     * @return \Illuminate\Http\Response
     */
    public function show(Kamar $kamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Kamar $kamar
     * @return \Illuminate\Http\Response
     */
    public function edit(Kamar $kamar)
    {
        //
        return view('edita.editkamar', compact('kamar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Kamar $kamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kamar $kamar)
    {
        //

        $request->validate([
            'id_pasien' => 'required',
            'id_dokter' => 'required',
        ]);

        $kamar->update([
            'id_pasien' => $request->id_pasien,
            'id_dokter' => $request->id_dokter
        ]);
        // alihkan halaman ke halaman dokter
        return redirect()->route('kamar.index')->with('Success','Data Kamar Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Kamar $kamar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kamar $kamar)
    {
        //
        $kamar->delete();
        return redirect()->route('kamar.index')->with('Success','Data kamar Berhasil Dihapus');
    }
    public function export()
    {
        return Excel::download(new KamarExport, 'Kamar.xlsx');
    }
}
