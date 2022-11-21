<?php

namespace App\Http\Controllers;

use App\Models\Konser;
use Illuminate\Http\Request;

class KonserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $konser = Konser::all();
        return $konser;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            $table = Konser::create([
                "title" => $request->title,
                "description" => $request->description,
                "artist" => $request->artist,
                "date" => $request->date
            ]);

            return response()->json([
                'success' => 201,
                'message' => 'data berhasil disimpan',
                'data' => $table
            ], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $artist
     * @return \Illuminate\Http\Response
     */
    public function show($artist)
    {
        $konser = konser::where('artist', $artist)->first();
        if ($konser) {
            return response()->json([
                'status' => 200,
                'data' => $konser

            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Konser ' . $artist . '  tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $konser = konser::find($id);
        if($konser){
            $konser->title = $request->title ? $request->title : $konser->title;
            $konser->description = $request->description ? $request->description : $konser->description;
            $konser->artist = $request->artist ? $request->artist : $konser->artist;
            $konser->date = $request->date ? $request->date : $request->date;
            $konser->save();
            return response()->json([
                'status' => 200,
                'data' => $konser
            ],200);
        }else{
            return response()->json([
                'status'=>404,
                'message'=> $id . ' tidak ditemukan'
            ],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $konser = konser::where('id',$id)->first();
        if($konser){
            $konser->delete();
            return response()->json([
                'status' =>200,
                'data' => $konser,
                'message' => 'Data berhasil dihapus'
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id . ' tidak ditemukan'
            ], 404);
        }
    }
}
