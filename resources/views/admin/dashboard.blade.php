@extends('admin.index')

@section('content')
<div class="row tile_count">
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
      <div class="count">
        @forelse ($users as $index => $users)
            @if ($loop->last)
                {{ $index+1 }}
            @endif
        @empty
            0
        @endforelse
      </div>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Total Groups</span>
      <div class="count green">
        @forelse ($groups as $index => $groups)
            @if ($loop->last)
                {{ $index+1 }}
            @endif
        @empty
            0
        @endforelse
      </div>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Total Members</span>
      <div class="count">
        @forelse ($members as $index => $members)
            @if ($loop->last)
                {{ $index+1 }}
            @endif
        @empty
            0
        @endforelse
      </div>
    </div>
</div>
@endsection
