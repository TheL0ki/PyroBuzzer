<?php
if(file_exists('ranking.txt')) {
    if(!file_exists('history')) {
        mkdir('history');
    }
    rename('ranking.txt', 'history/' . (new DateTime)->format('Y-m-d-H-i-s') . '_ranking.txt');
}
unlink('stop-script');
fopen('ranking.txt', "w");
chmod('ranking.txt', 0664);
