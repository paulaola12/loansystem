<?php
    
   function cleaner($evilstring){
    $safestring = trim($evilstring);
    $safestring = strip_tags($safestring);
    $safestring = htmlspecialchars($safestring);
    return $safestring; 
  };

?>