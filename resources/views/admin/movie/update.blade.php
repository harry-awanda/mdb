@extends ('admin.master')
@section('admincontent')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Movie</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/AdminDashboard">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="/Admin/Tag">Movie</a></div>
                        <div class="breadcrumb-item">Update Movie</div>
            </div>
        </div>
        @if(session('berhasil'))
            <div class="alert alert-success" role="alert">{{session('berhasil')}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4>Update Movie</h4>
            </div>
                <div class="card-body">
                    <form action="{{ route('Movie.update', $movie-> id) }}" method="POST">
                    {{csrf_field()}}
                    @method('patch')
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="title">Title</label>
                                <input name="title" type="text" class="form-control" id="title" value="{{$movie->title}}">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Pilih Celebrities</label>
                                <select style="width: 100%" name="celebs[]" class="form-control select2" multiple="">
                                @foreach ($celeb as $c)
                                <option value="{{ $c->id }}"
                                    @foreach($movie->celebs as $value)
                                    @if($c->id == $value->id)
                                    selected
                                    @endif
                                    @endforeach
                                    >{{ $c->name }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Pilih Genre</label>
                                <select style="width: 100%" name="genre[]" class="form-control select2" multiple="">
                                @foreach ($genre as $g)
                                <option value="{{ $g->id }}"
                                    @foreach($movie->genre as $value)
                                    @if($g->id == $value->id)
                                    selected
                                    @endif
                                    @endforeach
                                    >{{ $g->name }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Pilih Tag</label>
                                <select style="width: 100%" name="tags[]" class="form-control select2" multiple="">
                                @foreach ($tags as $t)
                                <option value="{{ $t->id }}"
                                    @foreach($movie->tags as $value)
                                    @if($t->id == $value->id)
                                    selected
                                    @endif
                                    @endforeach
                                    >{{ $t->name }}</option>
                                @endforeach
                                </select>
                            </div>                    
                            <div class="form-group col-md-6">
                                <label for="imdb">IMDb link</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <div class="input-group-text">imdb.com/title/</div>
                                    </div>
                                    <input id="imdb" name="imdb" class="form-control" value="{{$movie->imdb}}">
                                </div>
                            </div>          
                            <div class="form-group col-md-6">
                                <label for="runtime">Runtime</label>
                                <input name="runtime" type="text" class="form-control" value="{{$movie->runtime}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="minimum_charge">Rating</label>
                                <div class="input-group">
                                <input name="rating" type="text" class="form-control" min="0" id="rating" value="{{$movie->rating}}">
                                    <div class="input-group-prepend">
                                    <div class="input-group-text">/10</div>
                                    </div>
                                </div>
                            </div> 
                            <div class="form-group col-md-6">
                                <label for="year">Year</label>
                                <input name="year" type="text" class="form-control" value="{{$movie->year}}">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="cover">Cover</label>
                                <input name="cover" type="text" class="form-control" value="{{$movie->cover}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="url">Video URL</label>
                                <input name="url" type="text" class="form-control" value="{{$movie->url}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="suburl">Subtitle URL</label>
                                <input name="suburl" type="text" class="form-control" value="{{$movie->suburl}}">
                            </div>
                            

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-warning">Update</button>
                        </div>
                    </form>
                </div>
            </section>
        </div>

@stop