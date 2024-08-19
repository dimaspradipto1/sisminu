<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use function Termwind\render;
use App\Models\AnggotaSuratMasuk;
use Illuminate\Support\Facades\Auth;
use App\DataTables\SuratMasukDataTable;
use RealRashid\SweetAlert\Facades\Alert;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SuratMasukDataTable $dataTable)
    {
        
        return $dataTable->render('pages.suratMasuk.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('pages.suratMasuk.create', compact('users'));
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
            $data['file'] = $file->storeAs('public/surat_masuk', $file->getClientOriginalName());
        }

        $suratMasuk = SuratMasuk::create($data + ['user_id' => Auth::id()]);

        if ($request->has('disposisi')) {
            foreach ($request->input('disposisi') as $anggotaId) {
                if ($anggotaId) {
                    AnggotaSuratMasuk::create([
                        'surat_masuk_id' => $suratMasuk->id,
                        'user_id' => $anggotaId,
                        'type' => 'disposisi'
                    ]);
                }
            }
        }

        if ($request->has('cc')) {
            foreach ($request->input('cc') as $anggotaId) {
                if ($anggotaId) {
                    AnggotaSuratMasuk::create([
                        'surat_masuk_id' => $suratMasuk->id,
                        'user_id' => $anggotaId,
                        'type' => 'cc'
                    ]);
                }
            }
        }

        if ($request->has('diteruskan')) {
            foreach ($request->input('diteruskan') as $anggotaId) {
                if ($anggotaId) {
                    AnggotaSuratMasuk::create([
                        'surat_masuk_id' => $suratMasuk->id,
                        'user_id' => $anggotaId,
                        'type' => 'diteruskan'
                    ]);
                }
            }
        }

        Alert::success('success', 'Surat Berhasil diKirim')->autoclose(2000)->toToast();
        return redirect(route('surat-masuk.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratMasuk $suratMasuk)
    {
        $suratMasuk = SuratMasuk::with('anggotaSuratMasuk.user')->findOrFail($suratMasuk->id);
        return view('pages.suratmasuk.show', compact('suratMasuk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratMasuk $suratMasuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuratMasuk $suratMasuk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratMasuk $suratMasuk)
    {
        //
    }
}
