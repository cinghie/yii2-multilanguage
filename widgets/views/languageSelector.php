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
					<img alt="'.$currentLang.'" class="lang-flag" src="img/flags/'.$image_type.'/'.$currentLang.'.png" width="17">
					<span class="lang-name"></span>
				</span>
			</a>';  
		$html .= $ul; 
		
		// All other languages
		foreach($languages as $key=>$lang) 
		{ 
			if ($key!=$currentLang) {
				$html .= '
						<li>
							<a class="active" href="#">
								<img alt="'.$lang.'" class="lang-flag" src="img/flags/'.$image_type.'/'.$key.'.png" width="24">
								<span class="lang-name" style="margin-left: 5px;">'.$lang.'</span>
							</a>
						</li>';
			}
		} 
		
		$html .= "</ul>";
		
		echo $html;
		
	?>
    
</li>
