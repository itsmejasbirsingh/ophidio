<?php

function phoneLength($value) {

	if ( strlen( $value ) < 10 ) {
		return false;
	}

    return true;
}