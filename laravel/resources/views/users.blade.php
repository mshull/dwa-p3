@extends('layouts.app')

@section('heading')
<h1>User Data Generator</h1>
@endsection

@section('content')
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="post" action="/users" class="">
	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <div class="form-group">
        <label for="words">Number of Users to Generate: (Max 99)</label>
        <input type="text" class="form-control" id="users" name="users" value="5">
    </div>
    <div class="checkbox">
        <label>
            <input type="checkbox" name="birthdate" value="yes" checked="checked"> Include Birth Date?
        </label>
    </div>
    <div class="checkbox">
        <label>
            <input type="checkbox" name="profile" value="yes" checked="checked"> Include Profile?
        </label>
    </div>
    <button type="submit" class="btn btn-default">Generate Users</button>
</form>
@if (isset($users) && count($users) > 0)
	<br>
    @foreach ($users as $u)
        <p>
        <strong>Name:</strong> {{ $u->name }}<br>
        <strong>Birthdate:</strong> {{ $u->birthdate }}<br>
        <strong>Profile:</strong> {{ $u->profile }}
        </p>
    @endforeach
    <br>
@endif
@endsection