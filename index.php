<?php
	//This file is require to allow PHP to parse HTML.
	include('simple_html_dom.php');
	
	$url = 'website.html';

	$content = file_get_html($url);

	$mainContent = $content -> find('div#icons');

	foreach($mainContent as $child1){
	
		foreach($child1->find('section') as $child2){
			$childHeading = $child2 -> find('h2',0)->plaintext;
		
			$i = 0;
		
			$firstDiv = $child2 -> find('div',0);
		
			foreach($firstDiv->find('div') as $insideDiv){
				$iconsName = $insideDiv -> find('a',0) -> plaintext;
			
				//The extra content from icons name are removed.
				$iconsName = str_replace("Example of  " , "" , $iconsName);
				
				//The icons name are stored in multi-dimensional array.
				$mainArray[$childHeading][$i] = $iconsName;
				$i++;
			}
		}
	}
	
	//The array is printed out with proper format as required.
	print "<pre>";
	print_r($mainArray);
	print "</pre>";
?>