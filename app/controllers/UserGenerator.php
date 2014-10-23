<?php
/**
 * Created by PhpStorm.
 * User: philipr
 * Date: 2014/20/10
 * Time: 17:45
 */

class UserGenerator {

    /* global variables */

    /* Global Variables */

    private $minUsers = 1;
    private $maxUsers = 10;
    private $defaultUsers = 1;

    public function getMaxUsers() {
        return $this->maxUsers;
    }

    public function getDefaultUsers() {
        return $this->defaultUsers;
    }

    public function sanitizeUsersCount( $usersCount ) {
        if ( $usersCount ) {
            if ( !is_numeric( $usersCount ) ) {
                $usersCount = $this->minUsers;
            }

            if ( $usersCount < $this->minUsers ) {
                $usersCount = $this->minUsers;
            }

            if ( $usersCount > $this->maxUsers ) {
                $usersCount = $this->maxUsers;
            }
        } else {
            $usersCount = $this->defaultUsers;
        }

        return $usersCount;
    }

    public function generateUsers( $usersCount, $nameSelected, $addressSelected, $emailSelected, $textSelected ) {
        $faker = Faker\Factory::create();

        // output a default value if nothing is selected, else output user selections

        if ( !$nameSelected && !$addressSelected && !$emailSelected && !$textSelected ) {
            return '<p class="noOptions">Select options above</p>';
        } else {

            $output = '';

            for ( $u = 0 ; $u < $usersCount ; $u++ ) {

                $userInfo = array();

                if ( $nameSelected ) { array_push( $userInfo, $faker->name() ); }
                if ( $addressSelected ) { array_push( $userInfo, $faker->address() ); }
                if ( $emailSelected ) { array_push( $userInfo, $faker->email() ); }
                if ( $textSelected ) { array_push( $userInfo, $faker->text() ); }

                $user = implode('<br>', $userInfo);

                $output = $output.'<p>'.$user.'</p>';
            }

            return $output;
        }
    }

} 