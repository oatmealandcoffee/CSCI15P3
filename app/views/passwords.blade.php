@extends('_master')

@section('require')
<?php

/* capture the form values */

$wordCount = Input::get('word_count');
$includeNumber = Input::get('include_number');
$includeSpecial = Input::get('include_special');
$uppercaseFirst = Input::get('uppercase_first');
$userDelimiter = htmlentities(Input::get('delimiter'));
$camelCase = Input::get('camelCase');

/* validate form values */

$pg = new PasswordGenerator();

$wordCount = $pg->sanitizeWordCount( $wordCount );

?>
@stop

@section('title')
Developer's Best Friend
@stop

@section('title_h1')
Random Password Generator
@stop

@section('passwords_nav_active')
class="active"
@stop

@section('description')
Random passwords to lock down your site
@stop

@section('body')
<div class="well">
    <h2>Settings</h2>
    <form action="passwords" method="GET">
        <table>
            <tr>
                <td class="form_label">Word Count</td>
                <td class="form_entry"><input type="text" name="word_count" value="<?php echo ($wordCount ? $wordCount : $pg->getDefaultWords()); ?>"></td>
                <td class="form_inst">Max words: <?=$pg->getMaxWords();?></td>
            </tr>
            <tr>
                <td class="form_label">Include Number</td>
                <td class="form_entry"><input type="checkbox" name="include_number" <?php echo ($includeNumber ? 'checked' : ''); ?>></td>
                <td class="form_inst">Randomly selected between <?=$pg->getMinNumber();?>–<?=$pg->getMaxNumber();?>.</td>
            </tr>
            <tr>
                <td class="form_label">Include Special Character</td>
                <td class="form_entry"><input type="checkbox" name="include_special" <?php echo ($includeSpecial ? 'checked' : ''); ?>></td>
                <td class="form_inst"></td>
            </tr>
            <tr>
                <td class="form_label">Uppercase First Character</td>
                <td class="form_entry"><input type="checkbox" name="uppercase_first" <?php echo ($uppercaseFirst ? 'checked' : ''); ?>></td>
                <td class="form_inst">Words in source word list may already capitalized.</td>
            </tr>
            <tr>
                <td class="form_label">Delimiter</td>
                <td class="form_entry"><input type="text" name="delimiter" value="<?php echo ($userDelimiter ? $userDelimiter : '' ); ?>"></td>
                <td class="form_inst">A space is the default</td>
            </tr>
            <tr>
                <td class="form_label">Use camelCase</td>
                <td class="form_entry"><input type="checkbox" name="camelCase" <?php echo ($camelCase ? 'checked' : ''); ?>></td>
                <td class="form_inst">Overrides delimiter and first uppercase</td>
            </tr>
            <tr>
                <td class="form_label"></td>
                <td class="form_entry"><button type="submit">Create password</button></td>
                <td class="form_inst"></td>
            </tr>
        </table>

    </form>
</div>

<div class="well">
	<h2>Password</h2>
	<div class="password">
    <?=$pg->generatePassword( $wordCount, $includeNumber, $includeSpecial, $uppercaseFirst, $userDelimiter, $camelCase );?>
    </div>
</div>

@stop