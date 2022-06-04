<?php
/* Smarty version 4.1.0, created on 2022-06-05 00:32:04
  from 'D:\xampp\htdocs\amelia\app\views\ReservedList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629bdd64d93955_67652015',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '60008abf2cbb26c07f0aaed1d864765291d9202c' => 
    array (
      0 => 'D:\\xampp\\htdocs\\amelia\\app\\views\\ReservedList.tpl',
      1 => 1654381786,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messagebox.tpl' => 1,
    'file:ReservedList-table.tpl' => 1,
  ),
),false)) {
function content_629bdd64d93955_67652015 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_522759660629bdd64d8e6b6_01718594', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'default.tpl');
}
/* {block "content"} */
class Block_522759660629bdd64d8e6b6_01718594 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_522759660629bdd64d8e6b6_01718594',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php $_smarty_tpl->_subTemplateRender('file:messagebox.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    
    <div id="table">
    <?php $_smarty_tpl->_subTemplateRender("file:ReservedList-table.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>

<?php
}
}
/* {/block "content"} */
}
