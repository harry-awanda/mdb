<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Celebs;

class CelebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $celeb = Celebs::orderBy('created_at','DESC')->get();
        return view ('admin.celeb.index', compact('celeb'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $celeb = Celebs::updateOrCreate([
            'name' => $request->name
        ]);
        return redirect()->route('Celebs.index')->with('berhasil','Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $celeb = Celebs::findorfail($id);
        return view('admin.celeb.update', compact('celeb'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $celeb_data = [
            'name' => $request->name
        ];

        Celebs::whereId($id)->update($celeb_data);
        return redirect()->route('Celebs.index')->with('berhasil','Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $celeb = Celebs::find($id);
        $celeb->delete();
        return redirect()->route('Celebs.index')->with('berhasil','Data berhasil dihapus!');

    }
}
