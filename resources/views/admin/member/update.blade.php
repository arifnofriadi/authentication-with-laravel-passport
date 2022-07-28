@extends('admin.index')

@section('content')

<div class="">
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Form Update Member</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            @if(session()->has('error'))
                <div class="alert alert-warning">
                    {{ session('error') }} <i class="fa fa-times nav navbar-right" data-dismiss="alert"></i>
                </div>
            @endif

            <form class="form-horizontal form-label-left" novalidate action="{{url('admin/member/update/'.$member->id)}}" method="post" enctype="multipart/form-data">
                {{ @csrf_field() }}

              <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Profile Picture <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="image" class="form-control col-md-7 col-xs-12" name="image" required="required" type="file" accept="image/*" value="{{$member->image}}">
                  </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" required="required" type="text" value="{{$member->name}}">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Group <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name="group_id" id="group_id" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" required="required">
                        @forelse ($groups as $data)
                            <option value="{{$data->id}}" {{$data->id == $member->group_id ? 'selected': ''}}>{{$data->name}}</option>
                        @empty
                            <option value="">No data found</option>
                        @endforelse
                    </select>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" value="{{$member->email}}">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Phone Number <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="number" id="phone_number" name="phone_number" required="required" class="form-control col-md-7 col-xs-12" value="{{$member->phone_number}}">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Address <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea id="address" required="required" name="address" class="form-control col-md-7 col-xs-12">{{$member->address}}</textarea>
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  <a href="{{url('admin/member')}}" class="btn btn-primary">Cancel</a>
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
