<?php

/**
* @copyright Copyright &copy; Gogodigital Srls, gogodigital.it, 2015
* @package yii2-multilanguage
* @license GNU GPLv3
* @version 1.0
*/

?>

<li class="dropdown">
	
	<?php 	
		
		$html  = "";
		$ul    = '<ul class="head-list dropdown-menu with-arrow">';
		
		// Actual Language
		$html .= '
			<a data-toggle="dropdown" href="#">
				<span class="lang-selected">
					<span class="lang-name">'.$currentLang.'</span>
				</span>
			</a>';  
		$html .= $ul; 
		
		foreach($languages as $key=>$lang) 
		{ 
			$html .= '
					<li>
						<a class="active" href="#">
							<span class="lang-id">'.$key.'</span>
							<span class="lang-name">'.$lang.'</span>
						</a>
					</li>';
		} 
		
		$html .= "</ul>";
		
		echo $html;
		
	?>
    
</li>
