<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pasien;
use App\Exports\PasienExport;
use Maatwebsite\Excel\Facades\Excel;

class pasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Pasien::All();
        return view('tampil.pasient' , ['Pasien' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('form.newpasien');
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
            'nama' => 'required',
            'alamat' => 'required',
        ]);

        DB::table('pasien')->insert([
            'nama' => $request->nama,
            'alamat' => $request->alamat
        ]);
        // alihkan halaman ke halaman pasien
        return redirect()->route('pasien.index')->with('Success','Data pasien Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Pasien $pasien
     * @return \Illuminate\Http\Response
     */
    public function show(Pasien $pasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Pasien $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasien $pasien)
    {
        //
        return view('edita.editpasien', compact('pasien'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Pasien $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pasien $pasien)
    {
        //
        $request->validate([
            'nama' => 'required',   
            'alamat' => 'required',
        ]);

        $pasien->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat
        ]);

        // alihkan halaman ke halaman pasien
        return redirect()->route('pasien.index')->with('Success','Data pasien Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Pasien $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasien $pasien)
    {
        //
        $pasien->delete();
        return redirect()->route('pasien.index')->with('Success','Data pasien Berhasil Dihapus');
    }
    public function export()
    {
        return Excel::download(new PasienExport, 'Pasien.xlsx');
    }
}
