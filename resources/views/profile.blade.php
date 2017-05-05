@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
                <img src="uploads/profile_photos/{{$user->profile_photo}}" style="width: 150px; height: 150px; border-radius: 50% ; float: left ;margin-right: 20px; ">
                <h2 class="panel-heading">{{$user->name}}'s Profile</h2>
                <form enctype="multipart/form-data" action="/profile" method="POST">
                    <label>Update profile picture :</label>
                    <input type="file" name="profile_photo">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="submit" class="pull-right btn btn-sm btn-primary">
                </form>
           
        </div>
    </div>
</div>
@endsection