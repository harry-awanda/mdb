@extends ('admin.master')
    @section('admincontent')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Celebrities</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/AdminDashboard">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="/Admin/Tag">Celebrities</a></div>
                        <div class="breadcrumb-item">Update Celebrity</div>
            </div>
        </div>
@if(session('berhasil'))
    <div class="alert alert-success" role="alert">{{session('berhasil')}}</div>
@endif
<div class="card">
    <div class="card-header">
        <h4>Update Celebrity</h4>
    </div>
        <div class="card-body">
            <form action="{{ route('Celebs.update', $celeb-> id) }}" method="POST">
            {{csrf_field()}}
            @method('patch')
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="celeb">Celebrity</label>
                        <input name="name" type="text" class="form-control" id="name" value="{{$celeb->name}}">
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