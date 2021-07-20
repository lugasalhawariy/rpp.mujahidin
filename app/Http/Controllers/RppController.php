<?php

namespace App\Http\Controllers;

use App\Models\RPP;
use App\Models\Mapel;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use App\Http\Requests\RppRequest;

class RppController extends Controller
{
    public function create()
    {
        $sekolah = Sekolah::latest()->get();
        $mapel = Mapel::latest()->get();
        return view('pages.rpp.create', compact('sekolah', 'mapel'));
    }

    public function store(Request $request)
    {
        RPP::create([
            'user_id' => auth()->user()->id,
            'sekolah_id' => $request->sekolah_id,
            'mapel_id' => $request->mapel_id,
            'alokasi_waktu' => $request->alokasi_waktu,
            'pendekatan' => $request->pendekatan,
            'strategi' => $request->strategi,
            'metode_rpp' => $request->metode_rpp,
            'teknik_materi' => $request->teknik_materi,
            'teknik_penilaian' => $request->teknik_penilaian,
            'alat' => $request->alat,
            'bentuk' => $request->bentuk,
            'kompetensi_dasar' => $request->kompetensi_dasar,
            'ipk' => $request->ipk,
            'tujuan' => $request->tujuan,
            'materi_rpp' => $request->materi_rpp,
            'langkah_rpp' => $request->langkah_rpp
        ]);
        return redirect()->route('index.rpp');
    }


    public function show($id)
    {
        $data = RPP::findOrFail($id);
        return view('pages.rpp.show', compact('data'));
    }

    public function edit($id)
    {
        $sekolah = Sekolah::latest()->get();
        $mapel = Mapel::latest()->get();
        $data = RPP::findOrFail($id);
        return view('pages.rpp.edit', compact('data', 'sekolah', 'mapel'));
    }

    public function update(Request $request, $id)
    {
        $data = RPP::findOrFail($id);
        $data->update([
            'user_id' => auth()->user()->id,
            'sekolah_id' => $request->sekolah_id,
            'mapel_id' => $request->mapel_id,
            'alokasi_waktu' => $request->alokasi_waktu,
            'pendekatan' => $request->pendekatan,
            'strategi' => $request->strategi,
            'metode_rpp' => $request->metode_rpp,
            'teknik_materi' => $request->teknik_materi,
            'teknik_penilaian' => $request->teknik_penilaian,
            'alat' => $request->alat,
            'bentuk' => $request->bentuk,
            'kompetensi_dasar' => $request->kompetensi_dasar,
            'ipk' => $request->ipk,
            'tujuan' => $request->tujuan,
            'materi_rpp' => $request->materi_rpp,
            'langkah_rpp' => $request->langkah_rpp
        ]);
        return redirect()->route('index.rpp');
    }

    public function destroy($id)
    {
        //
    }
}
