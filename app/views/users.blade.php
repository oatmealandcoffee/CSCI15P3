@extends('_master')

@section('require')
<?php

/* Global Variables */

$minUsers = 1;
$maxUsers = 10;
$defaultUsers = $minUsers;

/* capture the form values */

$usersCount = Input::get('user_count');
$nameSelected = Input::get('name');
$addressSelected = Input::get('address');
$email = Input::get('email');
$text = Input::get('text');

if ( $usersCount ) {
    if ( !is_numeric( $usersCount ) ) {
        $usersCount = $minParagraphs;
    }

    if ( $usersCount < $minParagraphs ) {
        $usersCount = $minParagraphs;
    }

    if ( $usersCount > $maxParagraphs ) {
        $usersCount = $maxParagraphs;
    }
} else {
    $usersCount = $defaultUsers;
}

?>
@stop

@section('title')
Developer's Best Friend
@stop

@section('title_h1')
Random User Generator
@stop

@section('users_nav_active')
class="active"
@stop

@section('description')
Generate users to show off user interactions
@stop

@section('body')
<p>TODO</p>
@stop