<?php
/**
 * Created by PhpStorm.
 * User: philipr
 * Date: 2014/10/10
 * Time: 19:17
 */

/* global variables */
$minParagraphs = 1;
$maxParagraphs = 10;
$defaultParagraphs = $minParagraphs;

/* capture the form values */
$paragraphCount = $_GET['paragraph_count'];

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

$generator = new Badcow\LoremIpsum\Generator();
$paragraphs = $generator->getParagraphs( $paragraphCount );