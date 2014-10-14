@extends('_master')

@section('require')
<?php

/* Global Variables */

$minUsers = 1;
$maxUsers = 10;
$defaultUsers = $minUsers;

/* capture the form values */

$usersCount = Input::get('user_count');
$nameSelected = Input::get('include_name');
$addressSelected = Input::get('include_address');
$emailSelected = Input::get('include_email');
$textSelected = Input::get('include_text');

/* Validate user input */

if ( $usersCount ) {
    if ( !is_numeric( $usersCount ) ) {
        $usersCount = $minUsers;
    }

    if ( $usersCount < $minUsers ) {
        $usersCount = $minUsers;
    }

    if ( $usersCount > $maxUsers ) {
        $usersCount = $maxUsers;
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
<div class="well">
    <form action="users" method="GET">
        <table>
            <tr>
                <td class="form_label">User Count</td>
                <td class="form_entry"><input type="text" name="user_count" value="<?php echo ($usersCount ? $usersCount : $defaultUsers); ?>"></td>
                <td class="form_inst">Max Users: <?=$maxUsers;?></td>
            </tr>
            <tr>
                <td class="form_label">Include Name</td>
                <td class="form_entry"><input type="checkbox" name="include_name" <?php echo ($nameSelected ? 'checked' : ''); ?>></td>
                <td class="form_inst"></td>
            </tr>
            <tr>
                <td class="form_label">Include Address</td>
                <td class="form_entry"><input type="checkbox" name="include_address" <?php echo ($addressSelected ? 'checked' : ''); ?>></td>
                <td class="form_inst"></td>
            </tr>
            <tr>
                <td class="form_label">Include Email</td>
                <td class="form_entry"><input type="checkbox" name="include_email" <?php echo ($emailSelected ? 'checked' : ''); ?>></td>
                <td class="form_inst"></td>
            </tr>
            <tr>
                <td class="form_label">Include Blurb</td>
                <td class="form_entry"><input type="checkbox" name="include_text" <?php echo ($textSelected ? 'checked' : ''); ?>></td>
                <td class="form_inst"></td>
            </tr>
            <tr>
                <td class="form_label"></td>
                <td class="form_entry"><button type="submit">Create users</button></td>
                <td class="form_inst"></td>
            </tr>
        </table>
    </form>
</div>
<div class="well">

    <?php
    $faker = Faker\Factory::create();
    for ( $u = 0 ; $u < $usersCount ; $u++ ) {

        $userInfo = array();

        if ( $nameSelected ) { array_push( $userInfo, $faker->name() ); }
        if ( $addressSelected ) { array_push( $userInfo, $faker->address() ); }
        if ( $emailSelected ) { array_push( $userInfo, $faker->email() ); }
        if ( $textSelected ) { array_push( $userInfo, $faker->text() ); }

        $user = implode('<br>', $userInfo);

        echo '<p>'.$user.'</p>';

    }

    ?>

</div>
@stop