<?php
/**
 * Created by PhpStorm.
 * User: philipr
 * Date: 2014/17/10
 * Time: 06:16
 */

class PasswordGenerator {

    /* global values */

    private $defaultWords = 4;

    private $maxWords = 10;
    private $minNumber = 1000;
    private $maxNumber = 9999;
    private $defaultDelimiter = ' ';

    /* getters and setters */

    public function getDefaultWords() {
        return $this->defaultWords;
    }

    public function getMaxWords() {
        return $this->maxWords;
    }

    public function getMinNumber() {
        return $this->minNumber;
    }

    public function getMaxNumber() {
        return $this->maxNumber;
    }

    public function sanitizeWordCount( $wordCount ) {
        if ( $wordCount ) {
            if ( is_numeric( $wordCount ) == false ) {
                $wordCount = $this->defaultWords;
            } else {
                if ( $wordCount < 1 ) {
                    $wordCount = $this->defaultWords;
                } elseif ( $wordCount > $this->maxWords ) {
                    $wordCount = $this->maxWords;
                }
            }
        } else {
            $wordCount = $this->defaultWords;
        }

        return $wordCount;
    }

    public function generatePassword( $wordCount, $includeNumber, $includeSpecial, $uppercaseFirst, $userDelimiter, $camelCase ) {

        /* build the password */
        $passwordBuffer = array();

        $wc = new WordController();

        for ( $word = 0 ; $word < $wordCount ; $word++ ) {
            $w = $wc->getRandomWord();
            array_push( $passwordBuffer, $w );
        }

        /* handle the special cases */

        if ( $includeNumber ) {
            $rn = rand( $this->minNumber, $this->maxNumber );
            array_push( $passwordBuffer, $rn );
        }

        if ( $includeSpecial ) {
            $c = $wc->getRandomSpecChar();
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
            return join( '', $passwordBuffer );

        } else {
            if ( $userDelimiter ) {
                return join( $userDelimiter, $passwordBuffer );
            } else {
                return  join( $this->defaultDelimiter, $passwordBuffer );
            }
        }
    }

} 