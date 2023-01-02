@extends ('admin.master')
    @section('admincontent')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Service</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/AdminDashboard">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="/Admin/Tag">Service</a></div>
                        <div class="breadcrumb-item">Update Service</div>
            </div>
        </div>
@if(session('success'))
    <div class="alert alert-success" role="alert">{{session('success')}}</div>
@endif
<div class="card">
    <div class="card-header">
        <h4>Update Service</h4>
    </div>
        <div class="card-body">
            <form action="{{ route('Service.update', $service-> id) }}" method="POST">
            {{csrf_field()}}
            @method('patch')
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="service">Service</label>
                        <input name="name" type="text" class="form-control" id="name" value="{{$service->name}}">
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