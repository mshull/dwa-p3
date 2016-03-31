@extends('layouts.app')

@section('heading')
<h1>Random Password Generator</h1>
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
<div id="password" class="bg-success">{{ $password }}</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Password Settings</h3>
    </div>
    <div class="panel-body">
        <form method="post" action="/passwords" class="">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <div class="form-group">
                <label for="words">Number of Words: (Max 10)</label>
                <input type="text" class="form-control" id="words" name="words" value="6">
            </div>
            <div class="form-group">
                <label for="words">Separator:</label>
                <select class="form-control" name="separator">
                    <option value="hyphen">Hyphen</option>
                    <option value="space">Space</option>
                    <option value="none">No Separator</option>
                </select> 
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="number" value="yes" checked="checked"> Include a number?
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="special" value="yes" checked="checked"> Include special character?
                </label>
            </div>
            <button type="submit" class="btn btn-default">Generate Password</button>
        </form>
    </div>
</div>
@endsection