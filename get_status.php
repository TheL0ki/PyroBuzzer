<?php

if(file_exists('stop-script')) {
    echo '    
        <div class="rounded-full bg-red-600 py-0.5 px-2.5 border border-transparent text-sm text-white transition-all shadow-sm flex justify-center items-center">
            Stopped 
        </div>
  ';
} else {
    echo '
        <div class="rounded-full bg-emerald-600 py-0.5 px-2.5 border border-transparent text-sm text-white transition-all shadow-sm flex justify-center items-center">
            Running 
        </div>
    ';
}