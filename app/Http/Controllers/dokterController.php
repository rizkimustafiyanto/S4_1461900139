<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use Illuminate\Support\Facades\DB;
use App\Exports\DokterExport;
use Maatwebsite\Excel\Facades\Excel;

class dokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = \App\Models\Dokter::All();
        return view('tampil.doktert' , ['Dokter' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form.newdokter');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
        ]);

        DB::table('dokter')->insert([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan
        ]);
        // alihkan halaman ke halaman dokter
        return redirect()->route('dokter.index')->with('Success','Data dokter Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Dokter $dokter
     * @return \Illuminate\Http\Response
     */
    public function show(Dokter $dokter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Dokter $dokter
     * @return \Illuminate\Http\Response
     */
    public function edit(Dokter $dokter)
    {
        return view('edita.editdokter', compact('dokter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Dokter $dokter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Dokter $dokter)
    {
        $request->validate([
            'nama' => 'required',   
            'jabatan' => 'required',
        ]);

        $dokter->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan
        ]);

        // alihkan halaman ke halaman dokter
        return redirect()->route('dokter.index')->with('Success','Data dokter Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Dokter $dokter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dokter $dokter)
    {
        $dokter->delete();
        return redirect()->route('dokter.index')->with('Success','Data dokter Berhasil Dihapus');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Untuk maatwebsite export
    public function export() 
    {
        return Excel::download(new DokterExport, 'dokter.xlsx');
    }
}
