<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Celebs;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Tag;


class movieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $celeb = Celebs::all();
        $genre = Genre::orderBy('name','ASC')->get();
        $movie = Movie::orderBy('created_at','DESC')->get();
        $tags = Tag::all();
        return view('admin.movie.index',compact('celeb','genre','movie','tags'));
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
        $this->validate($request, [
            'title' => 'required',
            'year' => 'required',
            'rating' => 'required'
        ]);

        $cover = $request->cover;
        $new_cover = time().$cover->getClientOriginalName();
        $movie = Movie::create([
            'title' => $request->title,
            'cover' => 'uploads/cover/movies/'.$new_cover,
            'imdb' => $request->imdb,
            'runtime' => $request->runtime,
            'year' => $request->year,
            'rating' => $request->rating,
            'status' => $request->status
        ]);
        $movie->celebs()->attach($request->celebs);
        $movie->genre()->attach($request->genre);
        $movie->tags()->attach($request->tags);
        $cover->move('uploads/cover/movies/', $new_cover);

        return redirect('/Admin/Movie')->with('berhasil','Data berhasil disimpan!');
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
        $celeb = Celebs::all();
        $genre = Genre::all();
        $tags = Tag::all();
        $movie = Movie::findorfail($id);
        return view ('admin.movie.update', compact('celeb','genre','tags','movie'));
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
            'title' => 'required',
            'year' => 'required',
            'rating' => 'required'
        ]);

        $movie = Movie::findorfail($id);
            $movie_data = [
            'title'   => $request->title,
            'imdb'    => $request->imdb,
            'runtime' => $request->runtime,
            'year'    => $request->year,
            'rating'  => $request->rating,
            'cover'   => $request->cover,
            'url'     => $request->url,
            'suburl'  => $request->suburl
            ];
            

        $movie->celebs()->sync($request->celebs);
        $movie->genre()->sync($request->genre);
        $movie->tags()->sync($request->tags);
        $movie->update($movie_data);
        return redirect('/Admin/Movie')->with('berhasil','Post berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        $movie->delete();
        return redirect('/Admin/Movie')->with('berhasil','Data berhasil dihapus!');
    }
}
