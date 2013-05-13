<?php

$str = 'pO box Poultry 486 Po Box 345 p.o. box 235 P.O. box 364';

preg_match("#(po|p\.o\.)#", $str, $matches);

/* This also works in PHP 5.2.2 (PCRE 7.0) and later, however 
 * the above form is recommended for backwards compatibility */
// preg_match('/(?<name>\w+): (?<digit>\d+)/', $str, $matches);

print('<pre>');
print_r($matches);
print('<pre>');
?>