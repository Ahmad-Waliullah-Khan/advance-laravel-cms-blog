@extends('layouts.app')

@section('content')
    <h1>Pending Users
    </h1>
    <br>
    <hr>
    <br>
    @if(count($pendingUsers) > 0)
        <h4>
            <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Approve</th>
                    </tr>
                  </thead>
               
        @foreach($pendingUsers as $user)
                <div class="row">
                             <tr>
                            <td><strong>{{$user->name}}</strong></td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if($user->user_role == 102)
                                    Author
                                @else 
                                    User
                                @endif
                            </td>
                            <td>
                                    {!!Form::open(['action' => ['PendingController@update', $user->id], 'method' => 'POST', 'class'=> ''])!!}
                                        {{Form::hidden('_method', 'PUT')}}
                                        {{Form::submit('Approve', ['class'=> 'btn btn-success'])}}
                                    {!!Form::close()!!}
                            </td>
                        </tr>
                    <div class="col-md-8 col-sm-8">

                    </div>
                </div>

        @endforeach
        
        </table></div>
        </h4>
        {{$pendingUsers->links()}}
    @else 
        <p>No pending users found</p>
    @endif
@endsection