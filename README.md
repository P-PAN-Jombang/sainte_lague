# sainte_lague_function_using_php
 Webster method or Sainte-Laguë method  is a highest quotient method for allocating seats in party-list proportional representation used in many voting systems. It is named in Europe after the French mathematician André Sainte-Laguë and in United States after statesman and senator Daniel Webster.
 

# usage
include thats index.php

$vote = array(0 => array('partai_name' => 'gaul', 'votes' => 30000),
                1 => array('partai_name' => 'kece', 'votes' => 5000),
                2 => array('partai_name' => 'ganteng', 'votes' => 15000),
                3 => array('partai_name' => 'keren', 'votes' => 20000),
                4 => array('partai_name' => 'syantiq', 'votes' => 7500) );

$seats_amount = 7;
echo sainte_lague($vote,$seats_amount);
