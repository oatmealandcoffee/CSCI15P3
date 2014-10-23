<?php
/**
 * Created by PhpStorm.
 * User: philipr
 * Date: 2014/20/10
 * Time: 17:21
 */

class LoremGenerator {

    /* global values */

    private $minParagraphs = 1;
    private $maxParagraphs = 10;
    private $defaultParagraphs = 1;

    public function getDefaultParagraphs() {
        return $this->defaultParagraphs;
    }

    public function getMaxParagraphs() {
        return $this->maxParagraphs;
    }

    public function sanitizeParagraphCount( $paragraphCount ) {
        if ( $paragraphCount ) {
            if ( !is_numeric( $paragraphCount ) ) {
                $paragraphCount = $this->minParagraphs;
            } elseif ( $paragraphCount < $this->minParagraphs ) {
                $paragraphCount = $this->minParagraphs;
            } elseif ( $paragraphCount > $this->maxParagraphs ) {
                $paragraphCount = $this->maxParagraphs;
            }
        } else {
            $paragraphCount = $this->defaultParagraphs;
        }
        return $paragraphCount;
    }

    public function generateLorem( $paragraphCount ) {
        $generator = new Badcow\LoremIpsum\Generator();
        $paragraphs = $generator->getParagraphs( $paragraphCount );

        $output = '';
        foreach ( $paragraphs as $p ) {
            $output = $output.'<p>'.$p.'</p>';
        }

        return $output;
    }
} 