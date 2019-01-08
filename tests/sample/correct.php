<?php

/**
 * More than three words needed.
 */
function sampleFunction() {
    $array = array(
        'single_quote' => "bla bla"
    );

    $array = array('second_single_quote' => "bla bla");
    $array = array( 'third_single_quote' => "bla bla" );

    $array['single_quote'] = "bla bla bla";
    $array[ 'single_quote' ] = "bla bla bla";
}

class TestClassOne {
	const UPPER_CASE_1 = 0;
	
	private const UPPER_CASE_2 = 0;
}
