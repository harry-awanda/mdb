@extends ('admin.master')

@section('admincontent')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Movies</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="/Admin/AdminDashboard">Dashboard</a></div>
          <div class="breadcrumb-item">Movies</div>
        </div>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Movies</h4>
              <div class="card-header-action">
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#tambahData">Add Movie</button>
              </div>
            </div>
            <div class="card-body">
            @if(session('berhasil'))
              <div class="alert alert-success" role="alert">
                {{session('berhasil')}}
              </div>
            @endif
            <!--
            <div class="form-group col-md-6">
              <input name="title" type="text" class="form-control filter-input" placeholder="Filter by Year" data-column="0">
            </div> -->
            <div class="table-responsive">
              <table id="tables" class="table table-hover">
                <thead>                                 
                  <tr>
                    <th class="text-center" width="40px">#</th>
                    <th width=175px">Movie Title</th>
                    <th width=200px">Stars</th>
                    <th width=150px">Genre</th>
                    <th width="40px">Year</th>
                    <th width="40px">Rating</th>
                    <th width="70px">Status</th>
                    <th class="text-center" width="70px">Options</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($movie as $data)
                  <tr>
                    <td  class="text-center">{{ $loop->index+1 }}</td>
                    <td>{{$data -> title}}</td>
                    <td>@foreach($data->celebs as $c)
                      {{ $loop->first  ? '' : ', ' }}
                      <span>{{$c->name}}</span> 
                      @endforeach
                    </td>
                    <td>@foreach($data->genre as $g)
                      {{ $loop->first  ? '' : ', ' }}
                      <span>{{$g->name}}</span> 
                      @endforeach
                    </td>
                    <td>{{$data -> year}}</td>
                    <td>{{$data -> rating}}/10</td>
                    <td>{{$data -> status}}</td>
                    <td align="center">
                      <div class="btn-group" role="group" aria-label="Aksi">
                        <form action="{{ route('Movie.destroy', $data->id) }}" method="POST">
                        @csrf
                        @method('delete')
                          <a href="{{ route('Movie.edit', $data-> id) }}" class="btn btn-primary btn-sm"><i class="lni lni-pencil"></i></a>
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
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tambahData">Insert Movie Attribute</h5>
        <div class="right">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
        </div>
			</div>
			<div class="modal-body">
				<form action="{{ route('Movie.store') }}" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-row">

            <div class="form-group col-md-6">
              <label for="title">Title</label>
              <input name="title" type="text" class="form-control" required>
            </div>

            <div class="form-group col-md-3">
                <label for="year">Year</label>
                <input name="year" type="text" class="form-control">
              </div>

            <div class="form-group col-md-3">
              <label for="runtime">Runtime</label>
              <input name="runtime" type="text" class="form-control">
              </div>

              <div class="form-group col-md-2">
                <label for="minimum_charge">Rating</label>
                <div class="input-group">
                  <input name="rating" type="text" class="form-control" min="0" id="rating" required>
                    <div class="input-group-prepend">
                      <div class="input-group-text">/10</div>
                    </div>
                </div>
              </div>

            <div class="form-group col-md-4">
            <label for="imdb">IMDb link</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">imdb.com/title/</div>
                </div>
                <input id="imdb" name="imdb" class="form-control">
              </div>
            </div>

            <div class="form-group col-md-6">
            <label>Tags</label>
              <select style="width: 100%" name="tags[]" class="form-control select2" multiple="">
                  @foreach ($tags as $t)
                  <option value="{{ $t->id }}">{{ $t->name }}</option>
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

          <div class="form-group col-md-7">
              <label for="Thumbnail">Cover</label>
              <input name="cover" type="file" class="form-control">
            </div>

          <div class="form-group col-md-5">
            <label>Status</label>
              <select style="width: 100%" name="status" class="form-control select2">
              <option value="" selected disabled>Select</option>
              <option value="Online">Online</option>
              <option value="Offline">Offline</option>
              </select>
          </div>

          

          <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
          </div>
        </form>
			</div>
		</div>
	</div>
</div>
</div>

@endsection