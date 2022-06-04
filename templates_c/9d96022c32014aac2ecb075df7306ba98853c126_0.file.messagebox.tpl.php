<?php
/* Smarty version 4.1.0, created on 2022-05-31 10:02:44
  from 'D:\xampp\htdocs\amelia\app\views\templates\messagebox.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6295cba486da87_48239982',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9d96022c32014aac2ecb075df7306ba98853c126' => 
    array (
      0 => 'D:\\xampp\\htdocs\\amelia\\app\\views\\templates\\messagebox.tpl',
      1 => 1652617558,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6295cba486da87_48239982 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
<div class="alert <?php if ($_smarty_tpl->tpl_vars['msg']->value->isInfo()) {?>alert-info<?php }?>
                  <?php if ($_smarty_tpl->tpl_vars['msg']->value->isWarning()) {?>alert-warning<?php }?>
                  <?php if ($_smarty_tpl->tpl_vars['msg']->value->isError()) {?>alert-error<?php }?>" role="alert">
   <?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>

</div>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
