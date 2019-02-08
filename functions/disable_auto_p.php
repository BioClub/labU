<?php

// Disable Auto <p>

// remove <p>
remove_filter ('the_content',  'wpautop');
remove_filter ('comment_text', 'wpautop');


/*
the_excerpt()               // with <p>
echo get_the_excerpt()      // without
*/


?>