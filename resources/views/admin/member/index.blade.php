@extends('admin.index')

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Data Member</h2>
        <ul class="nav navbar-right panel_toolbox">
          <a href="{{url('admin/member/import')}}" class="btn btn-success">Import Member</a>
          <a href="{{url('admin/member/add')}}" class="btn btn-success">Add Member</a>
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
              <th>Profile Picture</th>
              <th>Name</th>
              <th>Group</th>
              <th>Address</th>
              <th>Contact</th>
              <th>Action</th>
            </tr>
          </thead>


          <tbody>
            @forelse ($member as $index => $data)
                <tr>
                    <td>{{++$index}}</td>
                    <td>
                      @if(!$data->image)
                        <img class="img-circle profile_img" src="{{asset('profile-picture/default.jpg')}}" alt="Image Default" >
                      @else
                      <img class="img-circle profile_img" src="{{$data->image}}" alt="Users">
                      @endif
                    </td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->getGroupName ? $data->getGroupName->name: 'data not valid'}}</td>
                    <td>{{$data->address}}</td>
                    <td>
                        <p>
                            <ul>
                                <li><a href="tel:{{$data->phone_number}}">{{$data->phone_number}}</a></li>
                                <li><a href="mailto:{{$data->email}}">{{$data->email}}</a></li>
                            </ul>
                        </p>
                    </td>
                    <td>
                        <a href="{{url('admin/member/update/'.$data->id)}}" class="btn btn-primary">Update</a>
                        <a href="{{url('admin/member/delete/'.$data->id)}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No data found.</td>
                </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
</div>

@endsection
