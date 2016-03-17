<?php
	//!Scan functions foldder
	$inc = scandir(dirname(__FILE__).'/functions');
	foreach($inc as $k=>$v){
		if($k>1 && is_file(dirname(__FILE__) . '/functions/'.$v)) include(dirname(__FILE__).'/functions/'.$v);
	}

	if( function_exists('add_interface_taxonomy_order') ){
    add_interface_taxonomy_order ("$taxonomy_name");
}