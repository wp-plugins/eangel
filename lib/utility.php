<?php


/**
 * Basic word count.
 * returns false on error
 *
 * @param string $inContent
 * @return integer
 */
function eangel_get_word_count($inContent) {
	$matches = array();
	$inContent = strip_tags($inContent);
	
	return preg_match_all("/\S+/", $inContent, $matches);
}



?>
