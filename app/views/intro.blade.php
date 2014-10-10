@extends('_master')

@section('title')
Developer's Best Friend
@stop

@section('home_nav_active')
class="active"
@stop

@section('description')
Helping developers work efficiently by sweating the small stuff.
@stop

@section('body')
<div class="row">
    <div class="col-md-4">
        <h2><a href="text">Text Generator</a></h2>
        <p>Dummy text to fill your page so you can focus on your style. </p>
    </div>
    <div class="col-md-4">
        <h2><a href="users">User Generator</a></h2>
        <p>Randomly generated user information to help populate and test user accounts.</p>
    </div>
    <div class="col-md-4">
        <h2><a href="passwords">Password Generator</a></h2>
        <p>Complex yet memorable passwords randomly generated.</p>
    </div>
</div>
@stop