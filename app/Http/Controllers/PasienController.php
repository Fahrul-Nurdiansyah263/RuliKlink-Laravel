<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use Illuminate\Support\Facades\Mail;
use App\Mail\FormInput;

class PasienController extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Models\Pasien::query();

        if ($request->has('cari') && $request->cari != '') {
            $query->where(function ($q) use ($request) {
                $q->where('nama_pasien', 'like', '%' . $request->cari . '%')
                ->orWhere('email_pasien', 'like', '%' . $request->cari . '%')
                ->orWhere('nomor_antrean', 'like', '%' . $request->cari . '%');
            });
        }

        $pasien = $query->orderBy('tanggal')
                        ->orderBy('jam')
                        ->orderBy('nomor_antrean')
                        ->get();

        return view('backend.v_pasien.index', compact('pasien'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_pasien'   => 'required|max:50',
            'email_pasien'  => 'required|email|max:50',
            'tanggal'       => 'required|max:50',
            'jam'           => 'required|max:50',
        ]);

        $pasien = Pasien::create($validatedData);
        Mail::to($pasien->email_pasien)->send(new FormInput($pasien));
        return redirect('/backend/pasien')->with('success', 'Pasien berhasil ditambahkan dan email terkirim!');
    }

   

    public function create()
    {
        return view('backend.v_pasien.create');
    }

      public function destroy(string $id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();
        return redirect('/backend/pasien');
    }

    public function edit(string $id)
    {
        $pasien = Pasien::find($id);
        return view('backend.v_pasien.edit', [
             'judul' => 'Ubah Pasien',
             'edit' => $pasien
        ]);
        return redirect('/backend/pasien');
    }

    public function update(Request $request, string $id)
    {
        $rules = [
                'nama_pasien' => 'required|max:50',
                'email_pasien' => 'required|max:50',
                'tanggal' => 'required|max:50',
                'jam' => 'required|max:50',
        ];
        $validatedData = $request->validate($rules);
        Pasien::where('id', $id)->update($validatedData);
        return redirect('/backend/pasien');
    }

    public function trashed()
    {
        $pasien = Pasien::onlyTrashed()->get();
        return view('backend.v_pasien.trashed', compact('pasien'));
    }

    public function restore($id)
    {
        Pasien::withTrashed()->where('id', $id)->restore();
        return redirect()->route('backend.pasien.trashed')->with('success', 'Data Pasien Dipulihkan');
    }

    public function forceDelete($id)
    {
        Pasien::withTrashed()->where('id', $id)->forceDelete();
        return redirect()->route('backend.pasien.trashed')->with('success', 'Data Pasien Berhasil Dihapus permanen');
    }

}
