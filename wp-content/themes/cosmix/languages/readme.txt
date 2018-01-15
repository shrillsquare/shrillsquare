rename both file en_EN to your own languange string such fr_FR or cn_CN
open wp-config.php and edit
define('WP_LANG', 'fr_FR'); 
or 
define('WP_LANG', 'cn_CN');

1. rescan language string
- open en_EN.po with (www.poedit.net) poedit->catalogue->properties->sources paths->change to your own sources paths->click ok
- go to catalague->update from sources

