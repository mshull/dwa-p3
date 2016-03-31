@extends('layouts.app')

@section('heading')
<h1>P3 Generator Tools</h1>
@endsection

@section('content')
<p class="lead">Please use the navigation below to select a content generator that matches your needs.</p>
<ul>
<li><a href="/lorem-ipsum">Lorem Ipsum Text Generator</a></li>
<li><a href="/users">User Data Generator</a></li>
<li><a href="/passwords">Random Password Generator</a></li>
</ul>
@endsection