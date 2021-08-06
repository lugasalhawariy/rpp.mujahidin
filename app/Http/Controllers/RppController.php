<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Models\RPP;
use App\Models\Mapel;
use App\Models\Sekolah;

use Illuminate\Http\Request;
use App\Http\Requests\RppRequest;

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

        // validasi status
        if(
            $request->alokasi_waktu !== null && 
            $request->pendekatan !== null &&
            $request->strategi !== null &&
            $request->metode_rpp !== null &&
            $request->teknik_materi !== null &&
            $request->teknik_penilaian !== null &&
            $request->alat !== null &&
            $request->bentuk !== null &&
            $request->kompetensi_dasar !== null &&
            $request->ipk !== null &&
            $request->tujuan !== null &&
            $request->materi_rpp !== null &&
            $request->langkah_rpp !== null
            )
        {
            $status = 'success';
        }else{
            $status = 'progress';
        }

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
            'langkah_rpp' => $request->langkah_rpp,
            'status' => $status
        ]);
        return redirect()->route('index.rpp');
    }

    public function cetak($id)
    {
        $rpp = RPP::findOrFail($id);
        $tanggal = Carbon::parse($rpp->created_at)->formatLocalized('%d %B %Y');
        $pdf = PDF::loadview('pages.rpp.cetak', ['rpp' => $rpp, 'tanggal' => $tanggal]);
        return $pdf->download('RPP-'.$rpp->user->name.'-'.$rpp->user->nbm_guru.'.pdf'); 
    }
}
