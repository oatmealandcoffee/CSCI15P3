@extends('_master')

@section('require')
<?php

/* global values */
$defaultWords = 4;

$maxWords = 10;
$minNumber = 1000;
$maxNumber = 9999;
$defaultDelimiter = ' ';

/* capture the form values */

$wordCount = Input::get('word_count');
$includeNumber = Input::get('include_number');
$includeSpecial = Input::get('include_special');
$uppercaseFirst = Input::get('uppercase_first');
$userDelimiter = htmlentities(Input::get('delimiter'));
$camelCase = Input::get('camelCase');

/* validate form values */
if ( $wordCount ) {
    if ( is_numeric( $wordCount ) == false ) {
        $wordCount = $defaultWords;
    } else {
        if ( $wordCount < 1 ) {
            $wordCount = $defaultWords;
        } elseif ( $wordCount > $maxWords ) {
            $wordCount = $maxWords;
        }
    }
} else {
    $wordCount = $defaultWords;
}

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
                <td class="form_entry"><input type="text" name="word_count" value="<?php echo ($wordCount ? $wordCount : $defaultWords); ?>"></td>
                <td class="form_inst">Max words: <?=$maxWords;?></td>
            </tr>
            <tr>
                <td class="form_label">Include Number</td>
                <td class="form_entry"><input type="checkbox" name="include_number" <?php echo ($includeNumber ? 'checked' : ''); ?>></td>
                <td class="form_inst">Randomly selected between <?=$minNumber;?>–<?=$maxNumber;?>.</td>
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
    <?php

    /* build the password */
    $passwordBuffer = array();

    $wc = new WordController();

    for ( $word = 0 ; $word < $wordCount ; $word++ ) {
        $w = $wc->getRandomWord();
        array_push( $passwordBuffer, $w );
    }

    /* handle the special cases */

    if ( $includeNumber ) {
        $rn = rand( $minNumber, $maxNumber );
        array_push( $passwordBuffer, $rn );
    }

    if ( $includeSpecial ) {
        $c = "@";
        array_push( $passwordBuffer, $c );
    }

    if ( $uppercaseFirst ) {
        $passwordBuffer[0] = ucfirst( $passwordBuffer[0] );
    }

    /* handle delimiters immediately prior to output */

    if ( $camelCase ) {

        $lastComponent = count( $passwordBuffer );
        for ( $c = 0 ; $c < $lastComponent ; $c++ ) {
            $passwordBuffer[$c] = strtolower( $passwordBuffer[$c] );
            if ( $c > 0 ) {
                $passwordBuffer[$c] = ucfirst( $passwordBuffer[$c] );
            }
        }
        $generatedPassword = join( '', $passwordBuffer );

    } else {
        if ( $userDelimiter ) {
            echo join( $userDelimiter, $passwordBuffer );
        } else {
            echo join( $defaultDelimiter, $passwordBuffer );
        }
    }

    ?>
</div>

@stop