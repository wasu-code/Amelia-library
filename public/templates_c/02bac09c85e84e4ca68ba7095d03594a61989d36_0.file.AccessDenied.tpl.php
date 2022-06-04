<?php
/* Smarty version 4.1.0, created on 2022-05-31 10:18:07
  from 'D:\xampp\htdocs\amelia\app\views\AccessDenied.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6295cf3f635c61_50997560',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '02bac09c85e84e4ca68ba7095d03594a61989d36' => 
    array (
      0 => 'D:\\xampp\\htdocs\\amelia\\app\\views\\AccessDenied.tpl',
      1 => 1652613829,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6295cf3f635c61_50997560 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8583218376295cf3f632d53_96402334', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'default.tpl');
}
/* {block "content"} */
class Block_8583218376295cf3f632d53_96402334 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_8583218376295cf3f632d53_96402334',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="full-ctr-out">
    <div class="full-ctr-in">
        <h1>Brak Dostępu</h1>
        <div>Twoje konto nie posiada uprawnień by wyświetlić tą podstronę.</div>
    </div>
    </div>

<?php
}
}
/* {/block "content"} */
}
