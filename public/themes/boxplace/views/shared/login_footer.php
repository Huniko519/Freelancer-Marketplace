<?php
defined('FIR') OR exit();
/**
 * The template for displaying the footer section
 */
?>



	  
	 <!-- ==============================================
	 Footer Section
	 =============================================== -->	
	 <footer id="colophon" class="site-footer" role="contentinfo">
	  <div id="footer-menu">
	   <p class="footer-copyright"><?=sprintf($this->lang('copyright'), date('Y'), e($this->siteSettings('sitename')))?>, <?=$this->lang('all_rights_reserved')?>.</p>
	  </div>
	 </footer>	  
	 
     <a id="scrollup">Scroll</a>