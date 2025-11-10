<?php
if(file_exists('ranking.txt')) {
    rename('ranking.txt', (new DateTime)->format('Y-m-d_H-i-s.u') . '_ranking.txt');
}
unlink('stop-script');
fopen('ranking.txt', "w");
chmod('ranking.txt', 0664);
