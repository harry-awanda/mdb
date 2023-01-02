@extends ('admin.master')

@section('admincontent')
      <!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Service</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/Admin/AdminDashboard">Dashboard</a></div>
        <div class="breadcrumb-item">Service</div>
      </div>
    </div>

  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Service</h4>
              <div class="card-header-action">
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#tambahData">Add Service</button>
            </div>
          </div>
          <div class="card-body">
            @if(session('success'))
            <div class="alert alert-success" role="alert">
              {{session('success')}}
            </div>
            @endif
            <div class="table-responsive">
              <table id="tables" class="table table-hover">
                <thead>                                 
                  <tr>
                    <th class="text-center" width="40px">#</th>
                    <th>Service Name</th>
                    <th class="text-center" width="200px">Action</th>                            
                  </tr>
                </thead>
                <tbody>
                @foreach($service as $data)
                  <tr>
                    <td  class="text-center" width="40px">{{ $loop->index+1 }}</td>
                    <td>{{$data -> name}}</td>
                    <td align="center">
                      <div class="btn-group" role="group" aria-label="Action">
                        <form action="{{ route('Service.destroy', $data->id) }}" method="POST">
                          @csrf
                          @method('delete')
                          <a href="{{ route('Service.edit', $data-> id) }}" class="btn btn-primary btn-sm"><i class="lni lni-pencil"></i><span class="ml-1">Edit</span></a>
                          <button type="submit" class="btn btn-danger btn-sm"><i class="lni lni-trash"></i><span class="ml-1">Delete</span></button>
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
      <h5 class="modal-title" id="tambahData">Input Service</h5>
        <div class="right">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
        </div>
    </div>
    <div class="modal-body">
      <form action="{{ route('Service.store') }}" method="POST">
        {{csrf_field()}}
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="service">Service</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Service">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Add Service</button>
        </div>
      </form>
    </div>
  </div>
  </div>
</div>

@endsection