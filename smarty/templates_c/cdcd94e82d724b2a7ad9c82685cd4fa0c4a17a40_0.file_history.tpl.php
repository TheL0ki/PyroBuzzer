<?php
/* Smarty version 5.6.0, created on 2025-11-13 20:15:59
  from 'file:history.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.6.0',
  'unifunc' => 'content_69163c7f29ab96_09603446',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cdcd94e82d724b2a7ad9c82685cd4fa0c4a17a40' => 
    array (
      0 => 'history.tpl',
      1 => 1762803106,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:js/history.tpl' => 1,
  ),
))) {
function content_69163c7f29ab96_09603446 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/PyroBuzzer/smarty/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_160101412769163c7f26e9a7_90001591', 'scripts');
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_15335343869163c7f279e04_45428522', 'main');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layouts/layout.tpl', $_smarty_current_dir);
}
/* {block 'scripts'} */
class Block_160101412769163c7f26e9a7_90001591 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/PyroBuzzer/smarty/templates';
?>

    <?php $_smarty_tpl->renderSubTemplate('file:js/history.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
}
/* {/block 'scripts'} */
/* {block 'main'} */
class Block_15335343869163c7f279e04_45428522 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/PyroBuzzer/smarty/templates';
?>

    <main class="flex justify-center">
        <div class="max-w-2xl text-3xl w-full">
            
                <div class="bg-gray-200 rounded-md p-2 max-w-2xl">
                    <div id="history-list"></div>
                    <div id="history-pagination" class="mt-4 flex justify-center items-center gap-2"></div>
                </div>
                <div class="bg-gray-200 rounded-md p-2 max-w-2xl mt-2 hidden">
                    <div id="history-container" class="p-2"></div>
                </div>
            
        </div>
    </main>
<?php
}
}
/* {/block 'main'} */
}
