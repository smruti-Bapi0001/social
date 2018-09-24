@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Search Results for "{{$_GET['search']}}"</div>

                    <div class="panel-body">

                        @if($users->count())
                            <div class="row">
                                @foreach($users as $user)
                                    <div class="col-md-12">
                                        <label>
                                            {{$user->name}}
                                        </label>
                                        <button class="btn btn-primary pull-right">
                                            Add Friend
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        @else

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection