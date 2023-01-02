@extends ('admin.master')
    @section('admincontent')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tag</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/AdminDashboard">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="/Admin/Tag">Tag</a></div>
                        <div class="breadcrumb-item">Update Tag</div>
            </div>
        </div>
@if(session('berhasil'))
    <div class="alert alert-success" role="alert">{{session('berhasil')}}</div>
@endif
<div class="card">
    <div class="card-header">
        <h4>Update Tag</h4>
    </div>
        <div class="card-body">
            <form action="{{ route('Tag.update', $tags-> id) }}" method="POST">
            {{csrf_field()}}
            @method('patch')
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="genre">Tag</label>
                        <input name="name" type="text" class="form-control" id="name" value="{{$tags->name}}">
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