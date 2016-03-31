@extends('layouts.app')

@section('heading')
<h1>Lorem Ipsum Text Generator</h1>
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
<form method="post" action="/lorem-ipsum" class="">
	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <div class="form-group">
        <label for="words">Number of Paragraphs to Generate: (Max 99)</label>
        <input type="text" class="form-control" id="paras" name="paras" value="5">
    </div>
    <button type="submit" class="btn btn-default">Generate Paragraphs</button>
</form>
@if (isset($paras) && count($paras) > 0)
	<br>
    @foreach ($paras as $p)
        <p>{{ $p }}</p>
    @endforeach
    <br>
@endif
@endsection