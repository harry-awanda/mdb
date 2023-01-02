@extends ('admin.master')

@section('admincontent')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>TV-Show</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="/Admin/AdminDashboard">Dashboard</a></div>
          <div class="breadcrumb-item">TV-Show</div>
        </div>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>TV-Show</h4>
              <div class="card-header-action">
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#tambahData">Add TV-Show</button>
              </div>
            </div>
            <div class="card-body">
            @if(session('berhasil'))
              <div class="alert alert-success" role="alert">
                {{session('berhasil')}}
              </div>
            @endif
            <div class="table-responsive">
              <table id="tables" class="table table-hover">
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th width=200px">Title</th>
                    <th width=50px"></th>
                    <th width=200px">Genre</th>
                    <th width="50px">Year</th>
                    <th width="50px">Rating</th>
                    <th width=100px">Status</th>
                    <th width=100px">Service</th>
                    <th width="60px">Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($tvshow as $data)
                  <tr>
                    <td class="text-center" width="40px">{{ $loop->index+1 }}</td>
                    <td>{{$data -> title}}</td>
                    <td>{{$data -> type}}</td>
                    <td>@foreach($data->genre as $g)
                      {{ $loop->first  ? '' : ', ' }}
                      <span>{{$g->name}}</span> 
                      @endforeach
                    </td>
                    <td>{{$data -> year}}</td>
                    <!-- <td><img src="{{$data -> cover}}" class="img-fluid" style="width: 100px"></td> -->
                    <td>{{$data -> rating}}/10</td>
                    <td>{{$data -> status}}</td>
                    <td>@foreach($data->service as $s)
                      {{ $loop->first  ? '' : ', ' }}
                      <span>{{$s->name}}</span> 
                      @endforeach
                    </td>
                    <td align="center">
                      <div class="btn-group" role="group" aria-label="Aksi">
                        <form action="{{ route('TVshow.destroy', $data->id) }}" method="POST">
                        @csrf
                        @method('delete')
                          <a href="{{ route('TVshow.edit', $data-> id) }}" class="btn btn-primary btn-sm"><i class="lni lni-pencil"></i></a>
                            <button type="submit" class="btn btn-danger btn-sm"><i class="lni lni-trash"></i></button>  
                        </form>
                      </div>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              
              </table>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="tambahData" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tambahData">Insert TV-Show Attributes</h5>
        <div class="right">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
        </div>
			</div>
			<div class="modal-body">
				<form action="{{ route('TVshow.store') }}" method="POST">
        {{csrf_field()}}
        <div class="form-row">

          <div class="form-group col-md-6">
            <label for="title">Title</label>
              <input name="title" type="text" class="form-control" id="title" placeholder="Movie Title" required>
          </div>
          <div class="form-group col-md-6">
            <label for="type">Type</label>
              <input name="type" type="text" class="form-control" id="type">
          </div>
          <div class="form-group col-md-6">
              <label for="year">Year</label>
              <input name="year" type="text" class="form-control">
          </div>
          <div class="form-group col-md-6">
            <label for="rating">Rating</label>
            <div class="input-group">
              <input name="rating" type="text" class="form-control" min="0" id="rating" placeholder="Movie Rating" required>
                <div class="input-group-prepend">
                  <div class="input-group-text">/10</div>
                </div>
            </div>
          </div>
          <div class="form-group col-md-5">
            <label for="status">Status</label>
              <select class="form-control" id="status" name="status">
                <option value="" selected disabled>Choose one</option>
                  <option value="On-going">On-going</option>
                  <option value="Complete">Complete</option>
              </select>
          </div>
          <div class="form-group col-md-7">
            <label for="imdb">IMDb link</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">imdb.com/title/</div>
                </div>
                  <input id="imdb" name="imdb" class="form-control">
              </div>
          </div>
          <div class="form-group col-md-12">
            <label>Service</label>
              <select style="width: 100%" name="services[]" class="form-control select2" multiple="">
                  @foreach ($service as $s)
                  <option value="{{ $s->id }}">{{ $s->name }}</option>
                  @endforeach
              </select>
          </div>
          <div class="form-group col-md-12">
            <label>Genre</label>
              <select style="width: 100%" name="genre[]" class="form-control select2" multiple="">
                  @foreach ($genre as $g)
                  <option value="{{ $g->id }}">{{ $g->name }}</option>
                  @endforeach
              </select>
          </div>
          <div class="form-group col-md-12">
            <label>Stars</label>
              <select style="width: 100%" name="celebs[]" class="form-control select2" multiple="">
                  @foreach ($celeb as $c)
                  <option value="{{ $c->id }}">{{ $c->name }}</option>
                  @endforeach
              </select>
          </div>
          <div class="form-group col-md-6">
              <label for="runtime">Runtime</label>
              <input name="runtime" type="text" class="form-control">
          </div>
          <div class="form-group col-md-6">
            <label for="cover">Cover</label>
              <input name="cover" type="text" class="form-control">
          </div>
          <div class="form-group col-md-6">
              <label for="season">Season</label>
              <input name="season" type="text" class="form-control">
          </div>
          <div class="form-group col-md-6">
              <label for="episode">Episode</label>
              <input name="episode" type="text" class="form-control">
          </div>
          <div class="form-group col-md-6">
              <label for="batchurl">Batch URL</label>
              <input name="batchurl" type="text" class="form-control">
          </div>
          <div class="form-group col-md-6">
              <label for="suburl">Subtitle URL</label>
              <input name="suburl" type="text" class="form-control">
          </div>
          <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Save</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </form>
			</div>
		</div>
	</div>
</div>
</div>

@endsection