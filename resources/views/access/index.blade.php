@extends('layouts.app')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <h1>Users
    </h1>
    <hr>
    @if(count($users) > 0)
        <h4>
            <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Role</th>
                    </tr>
                  </thead>
               
        @foreach($users as $user)
                <div class="row">
                             <tr>
                            <td><strong>{{$user->name}}</strong></td>
                            <td>{{$user->email}}</td>
                            <td>
                                 <div class="form-group">
                                   <select  class="form-control user_role" name="user_role" id="user_role">
                                    @if($user->user_role == 2)
                                        <option onclick="user_role_ajax(2, {{$user->id}});" value="2, {{$user->id}}">Author</option>
                                        <option  onclick="user_role_ajax(3, {{$user->id}});" value="3, {{$user->id}}">User</option>
                                        <option  onclick="user_role_ajax(102, {{$user->id}});" value="102, {{$user->id}}">Author (Deactivated) </option>
                                        <option onclick="user_role_ajax(102, {{$user->id}});" value="103, {{$user->id}}">User (Deactivated) </ option>
                                    @elseif($user->user_role == 3) 
                                        <option  onclick="user_role_ajax(3, {{$user->id}});" value="3, {{$user->id}}">User</option>
                                        <option  onclick="user_role_ajax(2, {{$user->id}});" value="2, {{$user->id}}">Author</option>
                                        <option  onclick="user_role_ajax(102, {{$user->id}});" value="102, {{$user->id}}">Author (Deactivated) </option>
                                        <option  onclick="user_role_ajax(103, {{$user->id}});" value="103, {{$user->id}}">User (Deactivated) </option>
                                    @elseif($user->user_role == 102) 
                                        <option  onclick="user_role_ajax(102, {{$user->id}});" value="102, {{$user->id}}">Author (Deactivated) </option>
                                        <option  onclick="user_role_ajax(3, {{$user->id}});" value="3, {{$user->id}}">User</option>
                                        <option  onclick="user_role_ajax(2, {{$user->id}});" value="2, {{$user->id}}">Author</option>
                                        <option  onclick="user_role_ajax(103, {{$user->id}});" value="103, {{$user->id}}">User (Deactivated) </option>
                                    @elseif($user->user_role == 103) 
                                        <option  onclick="user_role_ajax(103, {{$user->id}});" value="103, {{$user->id}}">User (Deactivated) </option>
                                       <option  onclick="user_role_ajax(102, {{$user->id}});" value="102, {{$user->id}}">Author (Deactivated) </option>
                                        <option  onclick="user_role_ajax(3, {{$user->id}});" value="3, {{$user->id}}">User</option>
                                        <option  onclick="user_role_ajax(2, {{$user->id}});" value="2, {{$user->id}}">Author</option>
                                    @else 
                                        <option  onclick="user_role_ajax(0, {{$user->id}});" value="0 , {{$user->id}}">Unknown Role</option>
                                         <option  onclick="user_role_ajax(103, {{$user->id}});" value="103, {{$user->id}}">User (Deactivated) </option>
                                         <option  onclick="user_role_ajax(102, {{$user->id}});" value="102, {{$user->id}}">Author (Deactivated) </option>
                                         <option  onclick="user_role_ajax(3, {{$user->id}});" value="3, {{$user->id}}">User</option>
                                         <option  onclick="user_role_ajax(2, {{$user->id}});" value="2, {{$user->id}}">Author</option>
                                    @endif
                                   </select>
                                </div>
                            </td>
                        </tr>
                    <div class="col-md-8 col-sm-8">

                    </div>
                </div>

        @endforeach
        
        </table></div>
        </h4>
        {{$users->links()}}
    @else 
        <p>No pending users found</p>
    @endif

    <script type="text/javascript">

        function user_role_ajax(user_role, user_id) {

         var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        // console.log(1);
        // alert(1);

      // var user_role_n_id = $(this).val();
      // var user_role_n_id_array = user_role_n_id.split(',');

      // var user_role = user_role_n_id_array[0];
      // var user_id = user_role_n_id_array[1];

      $.ajax({

          url: "{{url("access/user_role_ajax")}}",

          method: 'POST',

          data: {user_role:user_role, user_id:user_id, _token: CSRF_TOKEN, message:$(".getinfo").val()},

          dataType: 'json',

          success: function(data) {

            console.log(data);

            alert(data.status);

          }

      });
        }


  $(".user_role").change(function() {

        console.log(1);
        alert(1);

      var user_role_n_id = $(this).val();
      var user_role_n_id_array = user_role_n_id.split(',');

      var user_role = user_role_n_id_array[0];
      var user_id = user_role_n_id_array[1];

      $.ajax({

          url: "<?php echo "/AccessController@user_role_ajax" ?>",

          method: 'POST',

          data: {user_role:user_role, user_id:user_id},

          success: function(data) {

            if(data==1) 
            {
                alert('success');
            }

          }

      });

  });

</script>

@endsection

