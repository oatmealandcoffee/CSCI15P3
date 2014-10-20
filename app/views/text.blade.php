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
} else {
    $paragraphCount = $defaultParagraphs;
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
{{ Form::open(array( 'url'=> '/text', 'method' => 'GET')); }}
	<table>
		<tr>
			<td class="form_label">Paragraph Count</td>
			<td class="form_entry">{{ Form::text('paragraph_count', ($paragraphCount ? $paragraphCount : $defaultParagraphs) ); }}</td>
			<td class="form_inst">{{ 'Max paragraphs: '.$maxParagraphs }}</td>
		</tr>
		<tr>
			<td class="form_label"></td>
			<td class="form_entry">{{ Form::submit('Create Text'); }}</td>
			<td class="form_inst"></td>
		</tr>
	</table>
{{ Form::close(); }}
</div>

<div class="well">
    <?php
    $generator = new Badcow\LoremIpsum\Generator();
    $paragraphs = $generator->getParagraphs( $paragraphCount );
    echo implode('<p>', $paragraphs);
    ?>
</div>
@stop