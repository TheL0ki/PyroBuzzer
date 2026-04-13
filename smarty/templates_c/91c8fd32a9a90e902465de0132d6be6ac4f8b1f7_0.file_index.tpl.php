<?php
/* Smarty version 5.6.0, created on 2025-11-13 20:14:12
  from 'file:index.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.6.0',
  'unifunc' => 'content_69163c14aa0eb6_63286217',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '91c8fd32a9a90e902465de0132d6be6ac4f8b1f7' => 
    array (
      0 => 'index.tpl',
      1 => 1762803106,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:js/main.tpl' => 1,
  ),
))) {
function content_69163c14aa0eb6_63286217 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/PyroBuzzer/smarty/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_122255375869163c14a692e0_64286050', 'scripts');
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_72121525269163c14a9db18_87629778', 'main');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/layout.tpl', $_smarty_current_dir);
}
/* {block 'scripts'} */
class Block_122255375869163c14a692e0_64286050 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/PyroBuzzer/smarty/templates';
?>

    <?php $_smarty_tpl->renderSubTemplate('file:js/main.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
}
/* {/block 'scripts'} */
/* {block 'main'} */
class Block_72121525269163c14a9db18_87629778 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/PyroBuzzer/smarty/templates';
?>

    <main class="flex justify-center">
        <div class="max-w-2xl text-3xl w-full">
            <div class="bg-gray-200 rounded-md p-2 max-w-2xl">
                <button class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 rounded-md px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="reload()">Start</button>
                <button class="py-2.5 px-5 me-2 mb-2 text-gray-900 focus:outline-none bg-white rounded-md border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" onclick="stop()">Stop</button>
            </div>
            <div class="bg-gray-200 rounded-md mt-2 p-2 flex justify-left space-x-2">
                <div class="flex">Status:</div>
                <div id="status-container" class="flex align-middle"></div>
            </div>
            <div class="bg-gray-200 rounded-md mt-2 p-2 max-w-2xl space-y-2">
                <div>Ranking:</div>
                <div id="text-file-container"></div>
            </div>
        </div>
    </main>
<?php
}
}
/* {/block 'main'} */
}
