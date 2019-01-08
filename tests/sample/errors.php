<?php

/**
 * Two words
 */
function sampleFunction() {
    $array = array(
        "first_double_quote" => "bla bla"
    );

    $array = array("second_double_quote" => "bla bla");
    $array = array( "third_double_quote" => "bla bla" );

    $array["double_quote"] = "bla bla bla";
    $array[ "double_quote" ] = "bla bla bla";
}


class TestClassOne {
	const lower_case_1 = 0;
	
	private const lower_case_2 = 0;
}
