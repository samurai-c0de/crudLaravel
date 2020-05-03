<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiswaRequest;
use App\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $siswas = Siswa::where('nama_siswa', 'LIKE', "%$search%")->paginate(5);
        return view('siswa.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SiswaRequest $request)
    {
        Siswa::create([
            'nama_siswa' => $request->nama_siswa,
            'kelas' => $request->kelas
        ]);

        session()->flash('berhasil', 'berhasil menambah siswa ' . $request->nama_siswa);
        return redirect()->route('siswa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Siswa::whereId($id)->first();
        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SiswaRequest $request, $id)
    {
        $siswa = Siswa::whereId($id)->first();
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->kelas = $request->kelas;
        $siswa->save();

        session()->flash('berhasil', 'berhasil mengubah siswa ' . $request->nama_siswa);
        return redirect()->route('siswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::whereId($id)->first();
        $siswa->delete();

        session()->flash('berhasil', 'berhasil menghapus siswa ' . $siswa->nama_siswa);
        return redirect()->route('siswa.index');
    }
}
