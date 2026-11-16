<?php

namespace Modules\TitikDrainase\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Modules\Fasilitas\Http\Requests\StoreTitikDrainaseRequest;
use Modules\Fasilitas\Http\Requests\UpdateTitikDrainaseRequest;
use Modules\Fasilitas\Models\TitikDrainase;


class TitikDrainaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $search = $request->string('search')->trim()->toString();
        $kategori = $request->string('kategori')->trim()->toString();
        $kondisi = $request->string('kondisi')->trim()->toString();
        $titikdrainase = TitikDrainase::query()
            ->when($search != '', function (Builder $query) use ($search) {
                $query->where(function (Builder $query) use ($search) {
                    $query->where('nama', 'like', "%{$search}%")
                        ->orWhere('kecamatan', 'like', "%{$search}%");
                });
            })
            ->when(
                in_array($kategori, Fasilitas: KATEGORI, true),
                fn(Builder $query) => $query->where('kategori', $kategori)
            )
            ->when(
                array_key_exists($kondisi, Fasilitas: KONDISI),
                fn(Builder $query) => $query->where('kondisi', $kondisi)
            )
            ->latest()
            ->paginate(10)
            ->withQueryString();
        return view('titikdrainase::index', [
            'titikdrainase' => $titikdrainase,
            'search' => $search,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
{
return view('fasilitas: create', [
'kategoriOptions' => Fasilitas: KATEGORI,
'kondisiOptions' => Fasilitas: KONDISI,
]);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('titikdrainase::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('titikdrainase::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {}
}
