@extends('admin.index')

@section('content')

<div class="">

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Form User</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }} <i class="fa fa-times nav navbar-right" data-dismiss="alert"></i>
                </div>
            @endif

            @if(count($errors))
                @foreach($errors->all() as $errors)
                    <div class="alert alert-danger">
                      {{$errors}} <i class="fa fa-times nav navbar-right" data-dismiss="alert"></i>
                    </div>
                @endforeach
            @endif

            <form class="form-horizontal form-label-left" novalidate action="{{url('admin/user/store')}}" method="post">
                {{ @csrf_field() }}

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="name" class="form-control col-md-7 col-xs-12" name="name" required="required" type="text">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Role(Permission) <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name="role_id" id="role_id" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" required="required">
                        <option value="" disabled selected>-Choose User Role-</option>
                        @forelse ($role as $permission)
                            <option value="{{$permission->id}}">{{$permission->name}}</option>
                        @empty
                            <option value="">No data found.</option>
                        @endforelse
                    </select>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="password" id="password" name="password" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  <a href="{{url('admin/user')}}" class="btn btn-primary">Cancel</a>
                  <button id="send" type="submit" class="btn btn-success">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
