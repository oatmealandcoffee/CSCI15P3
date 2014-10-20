@extends('_master')

@section('require')
<?php

/* capture the form values */

$lg = new LoremGenerator();

$paragraphCount = $lg->sanitizeParagraphCount( Input::get('paragraph_count') );

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
<h2>Settings</h2>
{{ Form::open(array( 'url'=> '/text', 'method' => 'GET')); }}
	<table>
		<tr>
			<td class="form_label">Paragraph Count</td>
			<td class="form_entry">{{ Form::text('paragraph_count', ($paragraphCount ? $paragraphCount : $lg->getDefaultParagraphs() ) ); }}</td>
			<td class="form_inst">{{ 'Max paragraphs: '.$lg->getMaxParagraphs() }}</td>
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
<h2>Text</h2>
	{{  $lg->generateLorem( $paragraphCount ); }}
</div>
@stop