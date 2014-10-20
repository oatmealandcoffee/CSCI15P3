@extends('_master')

@section('require')
<?php
/* capture the form values */

$nameSelected = Input::get('include_name');
$addressSelected = Input::get('include_address');
$emailSelected = Input::get('include_email');
$textSelected = Input::get('include_text');

/* Validate user input */

$ug = new UserGenerator();

$usersCount = $ug->sanitizeUsersCount( Input::get('user_count') );

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
<div class="well">
<h2>Settings</h2>
    <form action="users" method="GET">
        <table>
            <tr>
                <td class="form_label">User Count</td>
                <td class="form_entry">{{ Form::text('user_count', ($usersCount ? $usersCount : $ug->getDefaultUsers() ) ); }}</td>
                <td class="form_inst">{{  $ug->getMaxUsers(); }}</td>
            </tr>
            <tr>
                <td class="form_label">Include Name</td>
                <td class="form_entry">{{ Form::checkbox('include_name', 1, ($nameSelected ? 'checked' : '') ) }}</td>
                <td class="form_inst"></td>
            </tr>
            <tr>
                <td class="form_label">Include Address</td>
               	<td class="form_entry">{{ Form::checkbox('include_address', 1, ($addressSelected ? 'checked' : '') ) }}</td>
                <td class="form_inst"></td>
            </tr>
            <tr>
                <td class="form_label">Include Email</td>
                <td class="form_entry">{{ Form::checkbox('include_email', 1, ($emailSelected ? 'checked' : '') ) }}</td>
                <td class="form_inst"></td>
            </tr>
            <tr>
                <td class="form_label">Include Blurb</td>
                <td class="form_entry">{{ Form::checkbox('include_text', 1, ($textSelected ? 'checked' : '') ) }}</td>
                <td class="form_inst"></td>
            </tr>
            <tr>
                <td class="form_label"></td>
                <td class="form_entry">{{ Form::submit('Create Users'); }}</td>
                <td class="form_inst"></td>
            </tr>
        </table>
    </form>
</div>
<div class="well">
<h2>Users</h2>
	{{ $ug->generateUsers( $usersCount, $nameSelected, $addressSelected, $emailSelected, $textSelected );  }}
</div>
@stop