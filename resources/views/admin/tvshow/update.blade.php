@extends ('admin.master')
@section('admincontent')

<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>TV-Show</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="/AdminDashboard">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="/Admin/Tag">TV-Show</a></div>
              <div class="breadcrumb-item">Update TV-Show</div>
            </div>
        </div>
@if(session('berhasil'))
    <div class="alert alert-success" role="alert">{{session('berhasil')}}</div>
@endif
<div class="card">
    <div class="card-header">
        <h4>Update TV-Show</h4>
    </div>
      <div class="card-body">
            <form action="{{ route('TVshow.update', $tvshow-> id) }}" method="POST">
            {{csrf_field()}}
            @method('patch')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="title">Title</label>
                        <input name="title" type="text" class="form-control" id="title" value="{{$tvshow->title}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="type">Type</label>
                        <input name="type" type="text" class="form-control" id="type" value="{{$tvshow->type}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="year">Year</label>
                        <input name="year" type="text" class="form-control" value="{{$tvshow->year}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="minimum_charge">Rating</label>
                        <div class="input-group">
                        <input name="rating" type="text" class="form-control" min="0" id="rating" value="{{$tvshow->rating}}">
                            <div class="input-group-prepend">
                            <div class="input-group-text">/10</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="status">Status</label>
                      <select class="form-control" id="status" name="status" required value="{{$tvshow->status}}">
                        <option value="" selected disabled>Choose one</option>
                        <option value="On-going" @if($tvshow->status == "On-going") selected @endif>On-going</option>
                        <option value="Complete" @if($tvshow->status == "Complete") selected @endif>Complete</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="imdb">IMDb link</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">imdb.com/title/</div>
                            </div>
                            <input id="imdb" name="imdb" class="form-control" value="{{$tvshow->rating}}">
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Pilih Celebrities</label>
                        <select style="width: 100%" name="celebs[]" class="form-control select2" multiple="">
                        @foreach ($celeb as $c)
                        <option value="{{ $c->id }}"
                            @foreach($tvshow->celebs as $value)
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
                            @foreach($tvshow->genre as $value)
                            @if($g->id == $value->id)
                            selected
                            @endif
                            @endforeach
                            >{{ $g->name }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Service</label>
                        <select style="width: 100%" name="services[]" class="form-control select2" multiple="">
                        @foreach ($service as $s)
                        <option value="{{ $s->id }}"
                            @foreach($tvshow->service as $value)
                            @if($s->id == $value->id)
                            selected
                            @endif
                            @endforeach
                            >{{ $s->name }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="runtime">Runtime</label>
                        <input name="runtime" type="text" class="form-control" value="{{$tvshow->runtime}}">
                    </div>                   


                    <div class="form-group col-md-6">
                        <label for="season">Season</label>
                        <input name="season" type="text" class="form-control" value="{{$tvshow->rating}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="episode">Episode</label>
                        <input name="episode" type="text" class="form-control" value="{{$tvshow->rating}}">
                    </div>                   
                    <div class="form-group col-md-12">
                        <label for="cover">Cover</label>
                        <input name="cover" type="text" class="form-control" value="{{$tvshow->cover}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="batchurl">Batch URL</label>
                        <input name="batchurl" type="text" class="form-control" value="{{$tvshow->batchurl}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="suburl">Subtitle URL</label>
                        <input name="suburl" type="text" class="form-control" value="{{$tvshow->suburl}}">
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