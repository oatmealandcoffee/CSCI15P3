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
    <form action="users" method="GET">
        <table>
            <tr>
                <td class="form_label">User Count</td>
                <td class="form_entry"><input type="text" name="user_count" value="<?php echo ( $usersCount ? $usersCount : $ug->getDefaultUsers() ); ?>"></td>
                <td class="form_inst">Max Users: <?=$ug->getMaxUsers();?></td>
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
	{{ $ug->generateUsers( $usersCount, $nameSelected, $addressSelected, $emailSelected, $textSelected );  }}
</div>
@stop