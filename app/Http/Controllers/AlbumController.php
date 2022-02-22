<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use App\Models\Album;
use Illuminate\Http\Client\Response;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Album::class, 'album');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albumes = Album::all();

        return view('albumes.index', [
            'albumes' => $albumes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $album = new Album();

        return view('albumes.create', [
            'album' => $album
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAlbumRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlbumRequest $request)
    {
        $validados = $request->validated();
        $album = new Album($validados);
        $album->save();
        $request->file('portada')->storeAs(
            'caratulas',
            $album->id . '.jpg',
            'local',
        );
        $img = Image::make(storage_path('app/caratulas/' . $album->id . '.jpg'));
        $img->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        Storage::makeDirectory('public/caratulas');
        $img->save(public_path('storage/caratulas/' . $album->id . '.jpg'));
        Storage::disk('local')->delete('caratulas/' . $album->id . '.jpg');
        return redirect()->route('albumes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAlbumRequest  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAlbumRequest $request, Album $album)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        //
    }

    public function descargar(Album $album)
    {
        $img = storage_path('app/public/portadas/' . $album->id . '.jpg');
        return response()->download($img);
    }
}
