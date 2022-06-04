<?php
/* Smarty version 4.1.0, created on 2022-06-04 16:44:52
  from 'D:\xampp\htdocs\amelia\app\views\UsersList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629b6fe4c54479_35969781',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b82c30df5ef1904358035820c400a1ccf03c5b02' => 
    array (
      0 => 'D:\\xampp\\htdocs\\amelia\\app\\views\\UsersList.tpl',
      1 => 1654353872,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messagebox.tpl' => 1,
    'file:UsersList-table.tpl' => 1,
  ),
),false)) {
function content_629b6fe4c54479_35969781 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_145192710629b6fe4c4f7e3_83805872', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'default.tpl');
}
/* {block "content"} */
class Block_145192710629b6fe4c4f7e3_83805872 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_145192710629b6fe4c4f7e3_83805872',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php $_smarty_tpl->_subTemplateRender('file:messagebox.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



<div id="table">
<?php $_smarty_tpl->_subTemplateRender("file:UsersList-table.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>

<?php
}
}
/* {/block "content"} */
}
