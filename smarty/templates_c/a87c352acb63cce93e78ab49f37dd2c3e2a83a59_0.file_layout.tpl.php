<?php
/* Smarty version 5.6.0, created on 2025-11-13 20:14:12
  from 'file:layouts/layout.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.6.0',
  'unifunc' => 'content_69163c14add589_42058954',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a87c352acb63cce93e78ab49f37dd2c3e2a83a59' => 
    array (
      0 => 'layouts/layout.tpl',
      1 => 1762803106,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:components/navbar.tpl' => 1,
  ),
))) {
function content_69163c14add589_42058954 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/PyroBuzzer/smarty/templates/layouts';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
<html>
	<head>
		<?php echo '<script'; ?>
 src="js/jquery-3.7.1.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="css/tailwind.js"><?php echo '</script'; ?>
>
		<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_122953983169163c14ad5201_49022184', 'scripts');
?>

	</head>
	<body class="font-sans antialiased">
        <?php $_smarty_tpl->renderSubTemplate('file:components/navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
        <div class="p-4">
            <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_179944758969163c14adae60_66322704', 'main');
?>

        </div>
	</body>
</html><?php }
/* {block 'scripts'} */
class Block_122953983169163c14ad5201_49022184 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/PyroBuzzer/smarty/templates/layouts';
}
}
/* {/block 'scripts'} */
/* {block 'main'} */
class Block_179944758969163c14adae60_66322704 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/PyroBuzzer/smarty/templates/layouts';
}
}
/* {/block 'main'} */
}
