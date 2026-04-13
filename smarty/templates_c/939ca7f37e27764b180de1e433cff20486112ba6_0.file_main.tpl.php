<?php
/* Smarty version 5.6.0, created on 2025-11-13 20:14:12
  from 'file:js/main.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.6.0',
  'unifunc' => 'content_69163c14aed1f9_22483986',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '939ca7f37e27764b180de1e433cff20486112ba6' => 
    array (
      0 => 'js/main.tpl',
      1 => 1762803106,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_69163c14aed1f9_22483986 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/PyroBuzzer/js';
echo '<script'; ?>
 type="text/javascript">	 
    $(function() {
        getStatus();
    });

    function getStatus() {
        $('#text-file-container').load('loadtxt.php');
        $('#status-container').load('get_status.php');
        setTimeout("getStatus()",1000);
    }

    function stopLoad() {
        window.stop();
        document.execCommand("Stop");
    }

    function reload() {
        $.ajax({
            url: 'start.php',
        });
    }

    function stop() {
        $.ajax({
            url: 'stop.php',
        });
    }
<?php echo '</script'; ?>
><?php }
}
