<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use function Termwind\render;
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

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $data['file'] = $file->storeAs('public/surat_masuk', $file->getClientOriginalName());
        }

        // foreach ($data['disposisi'] as $disposisi) {
        //     $data['disposisi'] = $disposisi;
        //     SuratMasuk::create($data);
        // }

        foreach ($data['disposisi'] as $disposisi) {
            $data['disposisi'] = $disposisi;
            SuratMasuk::create($data)->id;
        }
        
        // SuratMasuk::create($data);

        Alert::success('success', 'Surat Berhasil diKirim')->autoclose(2000)->toToast();
        return redirect(route('surat-masuk.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratMasuk $suratMasuk)
    {
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
