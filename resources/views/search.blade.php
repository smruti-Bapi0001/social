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
                                        <?php 
                                            //$checkStatus = GetStatus($user->id);
                                        ?>
                                        <button class="btn btn-primary pull-right add-friend" data-id="{{$user->id}}">
                                            Add Friend
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        @else

                        @endif
                        {{ csrf_field()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">

    $(document).ready(function(){
        var user = "{{Auth::user()->id}}";
        $('.add-friend').on('click', function(){
            var id = $(this).data('id');
            
            $.ajax({
                url : "{{url('/api/addFriend')}}",
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type : 'post',
                data : {'id' : id, 'user' : user},
                success : function(response){
                    $(this).text('Request Sent');
                },
                error : function(){

                }
            });
        });
    });
    
</script>


@endsection
