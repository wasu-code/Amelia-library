<?php
/* Smarty version 4.1.0, created on 2022-05-31 00:36:37
  from 'D:\xampp\htdocs\amelia\app\views\LogoutConfirm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629546f5b700f6_23433889',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0211f3f595de28911a9d26d7b274541665c37724' => 
    array (
      0 => 'D:\\xampp\\htdocs\\amelia\\app\\views\\LogoutConfirm.tpl',
      1 => 1653949971,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_629546f5b700f6_23433889 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_453998042629546f5b6e9d8_33782200', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'default.tpl');
}
/* {block "content"} */
class Block_453998042629546f5b6e9d8_33782200 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_453998042629546f5b6e9d8_33782200',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="full-ctr-out">
    <div class="full-ctr-in">
        <h1>Wylogowano poprawnie</h1>
        <div>Wybierz co chcesz zrobić.</div>
    </div>
    </div>

<?php
}
}
/* {/block "content"} */
}
