<?php
/* Smarty version 4.1.0, created on 2022-06-04 17:50:15
  from 'D:\xampp\htdocs\amelia\app\views\BookList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629b7f37750c33_12199086',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '91077c64ddb9dc8ffbdf2244f9798441168499fc' => 
    array (
      0 => 'D:\\xampp\\htdocs\\amelia\\app\\views\\BookList.tpl',
      1 => 1654357729,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messagebox.tpl' => 1,
    'file:BookList-table.tpl' => 1,
  ),
),false)) {
function content_629b7f37750c33_12199086 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1293570210629b7f3774c3a8_72625586', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'default.tpl');
}
/* {block "content"} */
class Block_1293570210629b7f3774c3a8_72625586 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1293570210629b7f3774c3a8_72625586',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php $_smarty_tpl->_subTemplateRender('file:messagebox.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <div id="table">
    <?php $_smarty_tpl->_subTemplateRender("file:BookList-table.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>

<?php
}
}
/* {/block "content"} */
}
