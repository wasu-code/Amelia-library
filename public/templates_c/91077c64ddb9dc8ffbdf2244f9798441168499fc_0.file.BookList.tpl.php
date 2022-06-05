<?php
/* Smarty version 4.1.0, created on 2022-06-05 13:48:24
  from 'D:\xampp\htdocs\amelia\app\views\BookList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629c9808d20b25_89494142',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '91077c64ddb9dc8ffbdf2244f9798441168499fc' => 
    array (
      0 => 'D:\\xampp\\htdocs\\amelia\\app\\views\\BookList.tpl',
      1 => 1654429696,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:BookList-table.tpl' => 1,
  ),
),false)) {
function content_629c9808d20b25_89494142 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_958924677629c9808d1c9f7_95224294', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'default.tpl');
}
/* {block "content"} */
class Block_958924677629c9808d1c9f7_95224294 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_958924677629c9808d1c9f7_95224294',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
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
