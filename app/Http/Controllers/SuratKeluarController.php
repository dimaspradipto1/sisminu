<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use App\Models\AnggotaSuratKeluar;
use Illuminate\Support\Facades\Auth;
use App\DataTables\SuratKeluarDataTable;
use RealRashid\SweetAlert\Facades\Alert;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SuratKeluarDataTable $dataTable)
    {
        return $dataTable->render('pages.suratKeluar.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('pages.suratKeluar.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data = $request->except(['disposisi', 'cc', 'diteruskan']);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $data['file'] = $file->storeAs('public/surat_keluar', $file->getClientOriginalName());
        }

        $suratKeluar = SuratKeluar::create($data + ['user_id' => Auth::id()]);

        if ($request->has('disposisi')) {
            foreach ($request->input('disposisi') as $anggotaId) {
                if ($anggotaId) {
                    AnggotaSuratKeluar::create([
                        'surat_keluar_id' => $suratKeluar->id,
                        'user_id' => $anggotaId,
                        'type' => 'disposisi'
                    ]);
                }
            }
        }

        if ($request->has('cc')) {
            foreach ($request->input('cc') as $anggotaId) {
                if ($anggotaId) {
                    AnggotaSuratKeluar::create([
                        'surat_keluar_id' => $suratKeluar->id,
                        'user_id' => $anggotaId,
                        'type' => 'cc'
                    ]);
                }
            }
        }

        if ($request->has('diteruskan')) {
            foreach ($request->input('diteruskan') as $anggotaId) {
                if ($anggotaId) {
                    AnggotaSuratKeluar::create([
                        'surat_keluar_id' => $suratKeluar->id,
                        'user_id' => $anggotaId,
                        'type' => 'diteruskan'
                    ]);
                }
            }
        }

        Alert::success('success', 'Surat Berhasil diKirim')->autoclose(2000)->toToast();
        return redirect(route('surat-keluar.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratKeluar $suratKeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratKeluar $suratKeluar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuratKeluar $suratKeluar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratKeluar $suratKeluar)
    {
        //
    }
}
