@extends('admin.index')

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Data Group</h2>
        <ul class="nav navbar-right panel_toolbox">
          <a href="{{url('admin/group/add')}}" class="btn btn-success">Add Group</a>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }} <i class="fa fa-times nav navbar-right" data-dismiss="alert"></i>
            </div>
        @endif
        <table id="datatable-fixed-header" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Group Name</th>
              <th>City</th>
              <th>Action</th>
            </tr>
          </thead>


          <tbody>
            @forelse ($groups as $index => $data)
                <tr>
                    <td>{{++$index}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->city}}</td>
                    <td>
                        <a href="{{url('admin/group/update/'.$data->id)}}" class="btn btn-primary">Update</a>
                        <a href="{{url('admin/group/delete/'.$data->id)}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No data found.</td>
                </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
</div>

@endsection
