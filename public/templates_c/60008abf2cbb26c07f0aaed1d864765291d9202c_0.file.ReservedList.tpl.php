<?php
/* Smarty version 4.1.0, created on 2022-06-05 13:57:31
  from 'D:\xampp\htdocs\amelia\app\views\ReservedList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629c9a2b511cf7_94535165',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '60008abf2cbb26c07f0aaed1d864765291d9202c' => 
    array (
      0 => 'D:\\xampp\\htdocs\\amelia\\app\\views\\ReservedList.tpl',
      1 => 1654429881,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:ReservedList-table.tpl' => 1,
  ),
),false)) {
function content_629c9a2b511cf7_94535165 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_763395072629c9a2b50c924_69244890', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'default.tpl');
}
/* {block "content"} */
class Block_763395072629c9a2b50c924_69244890 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_763395072629c9a2b50c924_69244890',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
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
