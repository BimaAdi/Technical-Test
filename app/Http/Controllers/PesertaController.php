<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePesertaRequest;
use App\Http\Requests\UpdatePesertaRequest;
use App\Http\Resources\PesertaCollection;
use App\Models\Peserta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page = 1;
        $pageSize = 5;
        if ($request->has('page') && $request->has('pageSize')) {
            $page = (int)$request->input('page');
            $pageSize = (int)$request->input('pageSize');
        }
     
        $limit = $pageSize;
        $offset = ($page - 1) * $pageSize;
        $numData = Peserta::count();
        $numPage = ceil($numData / $limit);
        $data = Peserta::orderBy('id', 'DESC')->offset($offset)->limit($limit)->get();
        return view('peserta.index', [
            'page' => $page,
            'pageSize' => $pageSize,
            'numPage' => $numPage,
            'pesertas' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('peserta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePesertaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePesertaRequest $request)
    {
        $data = $request->validated();

        Peserta::create([
            'nama' => $data['nama'],
            'email' => $data['email'],
            'nilai_X' => $data['nilai_X'],
            'nilai_Y' => $data['nilai_Y'],
            'nilai_Z' => $data['nilai_Z'],
            'nilai_W' => $data['nilai_W'],
            'created_by_id' => Auth::user()->id
        ]);

        return redirect('peserta')->with('success', 'Peserta Berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function show(Peserta $pesertum)
    {
        // min aspek intelegensi 1, max aspek intelegensi 20
        $aspekIntelegensi = (40/100 * $pesertum->nilai_X + 60/100 * $pesertum->nilai_Y / 2)/4;
        $aspekIntelegensi = ceil($aspekIntelegensi);
        if ($aspekIntelegensi > 5) {
            $aspekIntelegensi = 5;
        }
        // min aspek numerical ability 1, max aspek numerical ability 10
        $aspekNumericalAbility = (30/100 * $pesertum->nilai_Z + 70/100 * $pesertum->nilai_W/2)/2;
        $aspekNumericalAbility = ceil($aspekNumericalAbility);
        if ($aspekNumericalAbility > 5) {
            $aspekNumericalAbility = 5;
        }

        return view('peserta.show', [
            'peserta' => $pesertum,
            'aspekIntelegensi' => $aspekIntelegensi,
            'aspekNumericalAbility' => $aspekNumericalAbility
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function edit(Peserta $pesertum)
    {
        return view('peserta.edit', ['peserta' => $pesertum]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePesertaRequest  $request
     * @param  \App\Models\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePesertaRequest $request, Peserta $pesertum)
    {
        $data = $request->validated();
        $pesertum->nama = $data['nama'];
        $pesertum->email = $data['email'];
        $pesertum->nilai_X = $data['nilai_X'];
        $pesertum->nilai_Y = $data['nilai_Y'];
        $pesertum->nilai_Z = $data['nilai_Z'];
        $pesertum->nilai_W = $data['nilai_W'];
        $pesertum->save();

        return redirect('peserta')->with('success', 'Peserta Berhasil diedit!');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peserta $pesertum)
    {
        if ($pesertum != null) {
            $pesertum->delete();
            return redirect('peserta')->with('success', 'Peserta Berhasil dihapus');
        } else {
            return redirect('peserta')->with('error', 'Peserta tidak ditemukan');
        }
    }
}
