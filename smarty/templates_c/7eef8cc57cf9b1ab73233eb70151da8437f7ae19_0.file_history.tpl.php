<?php
/* Smarty version 5.6.0, created on 2025-11-13 20:15:59
  from 'file:js/history.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.6.0',
  'unifunc' => 'content_69163c7f2e4432_94139899',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7eef8cc57cf9b1ab73233eb70151da8437f7ae19' => 
    array (
      0 => 'js/history.tpl',
      1 => 1762803106,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_69163c7f2e4432_94139899 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/PyroBuzzer/js';
echo '<script'; ?>
 type="text/javascript">
    $(function() {
        // Get the JSON object from Smarty variable
        var historyData = <?php echo json_encode($_smarty_tpl->getValue('history'));?>
;
        
        // Get the keys and sort them in descending order (newest first)
        var keys = Object.keys(historyData);
        keys.sort(function(a, b) {
            // Sort by filename (which contains the date) in descending order
            // Filename format: YYYY-MM-DD-HH-MM-SS_ranking.txt
            return b.localeCompare(a);
        });
        
        // Pagination settings
        var itemsPerPage = 10;
        var currentPage = 1;
        var totalPages = Math.ceil(keys.length / itemsPerPage);
        
        // Function to format filename to date string (Y-m-d H:i:s)
        function formatDateFromFilename(filename) {
            // Remove "_ranking.txt" suffix
            var dateStr = filename.replace('_ranking.txt', '');
            // Convert "YYYY-MM-DD-HH-MM-SS" to "YYYY-MM-DD HH:MM:SS"
            // Replace the 4th, 5th, and 6th hyphens with space and colons
            var parts = dateStr.split('-');
            if (parts.length >= 6) {
                return parts[2] + '.' + parts[1] + '.' + parts[0] + ' ' + 
                       parts[3] + ':' + parts[4] + ':' + parts[5];
            }
            return dateStr; // Fallback to original if format is unexpected
        }
        
        // Function to render the history list for the current page
        function renderHistoryList() {
            var startIndex = (currentPage - 1) * itemsPerPage;
            var endIndex = Math.min(startIndex + itemsPerPage, keys.length);
            var pageKeys = keys.slice(startIndex, endIndex);
            
            var $list = $('<ul>').addClass('list-inside list-disc p-2');
            
            pageKeys.forEach(function(key) {
                var $li = $('<li>').addClass('mb-2');
                var $link = $('<a>')
                    .attr('href', '#')
                    .addClass('history-link text-gray-700 hover:text-gray-900 underline cursor-pointer')
                    .attr('data-key', key)
                    .text(formatDateFromFilename(key));
                $li.append($link);
                $list.append($li);
            });
            
            // Load the list into the container
            $('#history-list').html($list);
            
            // Render pagination controls
            renderPagination();
        }
        
        // Function to render pagination controls
        function renderPagination() {
            var $pagination = $('<div>').addClass('flex justify-center items-center gap-2 flex-wrap');
            
            if (totalPages <= 1) {
                $('#history-pagination').html('');
                return;
            }
            
            // Previous button
            var $prevBtn = $('<button>')
                .addClass('px-3 py-1 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 disabled:opacity-50 disabled:cursor-not-allowed')
                .text('Previous')
                .prop('disabled', currentPage === 1)
                .on('click', function() {
                    if (currentPage > 1) {
                        currentPage--;
                        renderHistoryList();
                    }
                });
            $pagination.append($prevBtn);
            
            // Page numbers
            var maxVisiblePages = 5;
            var startPage = Math.max(1, currentPage - Math.floor(maxVisiblePages / 2));
            var endPage = Math.min(totalPages, startPage + maxVisiblePages - 1);
            
            if (startPage > 1) {
                var $firstPage = $('<button>')
                    .addClass('px-3 py-1 rounded bg-gray-300 hover:bg-gray-400 text-gray-800')
                    .text('1')
                    .on('click', function() {
                        currentPage = 1;
                        renderHistoryList();
                    });
                $pagination.append($firstPage);
                
                if (startPage > 2) {
                    $pagination.append($('<span>').addClass('px-2').text('...'));
                }
            }
            
            for (var i = startPage; i <= endPage; i++) {
                var $pageBtn = $('<button>')
                    .addClass('px-3 py-1 rounded ' + (i === currentPage ? 'bg-blue-500 text-white' : 'bg-gray-300 hover:bg-gray-400 text-gray-800'))
                    .text(i)
                    .on('click', function(page) {
                        return function() {
                            currentPage = page;
                            renderHistoryList();
                        };
                    }(i));
                $pagination.append($pageBtn);
            }
            
            if (endPage < totalPages) {
                if (endPage < totalPages - 1) {
                    $pagination.append($('<span>').addClass('px-2').text('...'));
                }
                
                var $lastPage = $('<button>')
                    .addClass('px-3 py-1 rounded bg-gray-300 hover:bg-gray-400 text-gray-800')
                    .text(totalPages)
                    .on('click', function() {
                        currentPage = totalPages;
                        renderHistoryList();
                    });
                $pagination.append($lastPage);
            }
            
            // Next button
            var $nextBtn = $('<button>')
                .addClass('px-3 py-1 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 disabled:opacity-50 disabled:cursor-not-allowed')
                .text('Next')
                .prop('disabled', currentPage === totalPages)
                .on('click', function() {
                    if (currentPage < totalPages) {
                        currentPage++;
                        renderHistoryList();
                    }
                });
            $pagination.append($nextBtn);
            
            // Page info
            var $pageInfo = $('<span>')
                .addClass('ml-4 text-sm text-gray-600')
                .text('Page ' + currentPage + ' of ' + totalPages);
            $pagination.append($pageInfo);
            
            $('#history-pagination').html($pagination);
        }
        
        // Initial render
        renderHistoryList();
        
        // Function to calculate time difference (similar to PHP totalDiff)
        function totalDiff(masterDate, secondDate) {
            var diff = (secondDate.getTime() - masterDate.getTime()) / 1000;
            return Math.round(diff * 1000) / 1000; // Round to 3 decimal places
        }
        
        // Add click handlers to the links
        $(document).on('click', '.history-link', function(e) {
            e.preventDefault();
            var key = $(this).attr('data-key');
            var content = historyData[key];
            
            // Display the content in the history container using grid format
            var $container = $('<div>');
            
            if (Array.isArray(content) && content.length > 0) {
                var masterDate = null;
                
                // First pass: find the master date (rank 1)
                content.forEach(function(line) {
                    if (line.rank === 1 && line.team !== "") {
                        masterDate = new Date(line.date);
                    }
                });
                
                // Second pass: display all entries
                content.forEach(function(line) {
                    if (line.team !== "") {
                        var $row = $('<div>').addClass('grid grid-cols-3');
                        
                        if (line.rank === 1) {
                            // Master entry - no time difference
                            $row.append($('<div>').addClass('text-start').text('#' + line.rank));
                            $row.append($('<div>').addClass('text-center').text('Team ' + line.team));
                            $row.append($('<div>').addClass('text-end'));
                        } else {
                            // Other entries - calculate time difference
                            var secondDate = new Date(line.date);
                            var timeDiff = totalDiff(masterDate, secondDate);
                            $row.append($('<div>').addClass('text-start').text('#' + line.rank));
                            $row.append($('<div>').addClass('text-center').text('Team ' + line.team));
                            $row.append($('<div>').addClass('text-end').text('+' + timeDiff + 's'));
                        }
                        
                        $container.append($row);
                    }
                });
            }
            
            $('#history-container')
                .html($container)
                .parent().removeClass('hidden')
        });
    });
<?php echo '</script'; ?>
><?php }
}
