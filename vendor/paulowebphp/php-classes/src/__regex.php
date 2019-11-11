<?php  


echo '<pre>';
//url
var_dump(preg_match( "/(?:https?:\/\/)?(?:[a-zA-Z0-9.-]+?\.(?:[a-zA-Z])|\d+\.\d+\.\d+\.\d+)/", $url ) );
var_dump(preg_match( '/((http|https)\:\/\/)?[a-zA-Z0-9\.\/\?\:@\-_=#]+\.([a-zA-Z0-9\&\.\/\?\:@\-_=#])*/', $url ) );
var_dump(preg_match( '/^http:\/\/|(www\.)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/', $url ) );
exit;


//hexa values
var_dump(preg_match( '/^#?([a-f0-9]{6}|[a-f0-9]{3})$/', $url ) );


?>
