@extends('_master')

@section('require')
<?php
/* global variables */
$minParagraphs = 1;
$maxParagraphs = 10;
$defaultParagraphs = $minParagraphs;

/* capture the form values */
$paragraphCount = Input::get('paragraph_count');

if ( $paragraphCount ) {
    if ( !is_numeric( $paragraphCount ) ) {
        $paragraphCount = $minParagraphs;
    }

    if ( $paragraphCount < $minParagraphs ) {
        $paragraphCount = $minParagraphs;
    }

    if ( $paragraphCount > $maxParagraphs ) {
        $paragraphCount = $maxParagraphs;
    }
}
?>
@stop

@section('title')
Developer's Best Friend
@stop

@section('title_h1')
Random Text Generator
@stop

@section('text_nav_active')
class="active"
@stop

@section('description')
Random text to fill your designs
@stop

@section('body')
<div class="well">
<form action="text" method="GET">
    <table>
        <tr>
            <td class="form_label">Paragraph Count</td>
            <td class="form_entry"><input type="text" name="paragraph_count" value="<?php echo ($paragraphCount ? $paragraphCount : $defaultParagraphs); ?>"></td>
            <td class="form_inst">Max paragraphs: <?=$maxParagraphs;?></td>
        </tr>
    </table>
    <tr>
        <td class="form_label"></td>
        <td class="form_entry"><button type="submit">Create text</button></td>
        <td class="form_inst"></td>
    </tr>
</form>
</div>

<div class="well">
    <?php
    $generator = new Badcow\LoremIpsum\Generator();
    $paragraphs = $generator->getParagraphs( $paragraphCount );
    echo implode('<p>', $paragraphs);
    ?>
</div>
@stop