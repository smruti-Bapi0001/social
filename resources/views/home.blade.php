@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class="row">
                    <div class="col-md-12 text-right">
                        <form name="search" method="get" action="{{url('/search')}}">
                            {{--{{ csrf_field() }}--}}
                            <input type="text" placeholder="search" name="search">
                            <button type="submit" >Search</button>
                        </form>
                    </div>
                    <div class="col-md-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
                            <li><a data-toggle="tab" href="#menu1">Friend Lists({{$friendLists->count()}})</a></li>
                            <li><a data-toggle="tab" href="#menu2">Friend Requests({{$friendRequests->count()}})</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">
                                <h3>HOME</h3>
                                <p>Some content.</p>
                            </div>
                            <div id="menu1" class="tab-pane fade">
                                <h3>Friend Lists</h3>

                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <h3>Friend Requests</h3>
                                <p>Some content in menu 2.</p>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
