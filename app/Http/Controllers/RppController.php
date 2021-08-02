<?php

namespace App\Http\Controllers;

use App\Models\RPP;
use App\Models\Mapel;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use App\Http\Requests\RppRequest;

use PDF;

class RppController extends Controller
{
    public function create()
    {
        $mapel = Mapel::where('sekolah_id', auth()->user()->sekolah_id)->latest()->get();
        return view('pages.rpp.create', compact('mapel'));
    }

    public function store(RppRequest $request)
    {
        RPP::create([
            'user_id' => auth()->user()->id,
            'sekolah_id' => auth()->user()->sekolah_id,
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
        $mapel = Mapel::where('sekolah_id', auth()->user()->sekolah_id)->latest()->get();
        $data = RPP::findOrFail($id);
        return view('pages.rpp.edit', compact('data', 'mapel'));
    }

    public function update(RppRequest $request, $id)
    {
        $data = RPP::findOrFail($id);
        $data->update([
            'user_id' => auth()->user()->id,
            'sekolah_id' => auth()->user()->sekolah_id,
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

    public function cetak($id)
    {
        $rpp = RPP::findOrFail($id);
        $pdf = PDF::loadview('pages.rpp.cetak', ['rpp' => $rpp]);
        return $pdf->download('rpp.pdf'); 
    }
}
