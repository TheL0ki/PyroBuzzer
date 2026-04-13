<?php
/* Smarty version 5.6.0, created on 2025-11-13 20:14:12
  from 'file:components/navbar.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.6.0',
  'unifunc' => 'content_69163c14af7df2_35788140',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f0d50eee8b460c66ed2303033010ac11ff2130ea' => 
    array (
      0 => 'components/navbar.tpl',
      1 => 1762803106,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_69163c14af7df2_35788140 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/PyroBuzzer/smarty/templates/components';
?><nav class="bg-gray-200 px-4 py-3 flex items-center justify-between">
    <div class="flex items-center">
        <span class="text-2xl font-bold text-gray-800">Quizzer</span>
    </div>
    <div class="flex items-center space-x-6 mx-auto">
        <a href="index.php" class="text-gray-700 hover:text-gray-900 font-medium transition-colors">Live Ranking</a>
        <a href="history.php" class="text-gray-700 hover:text-gray-900 font-medium transition-colors">History</a>
    </div>
    <div class="w-20"></div>
</nav>

<?php }
}
