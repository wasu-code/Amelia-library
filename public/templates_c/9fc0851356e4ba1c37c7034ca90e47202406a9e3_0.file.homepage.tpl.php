<?php
/* Smarty version 4.1.0, created on 2022-05-15 15:05:50
  from 'D:\xampp\htdocs\amelia\app\views\homepage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6280faae230017_64077412',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9fc0851356e4ba1c37c7034ca90e47202406a9e3' => 
    array (
      0 => 'D:\\xampp\\htdocs\\amelia\\app\\views\\homepage.tpl',
      1 => 1652618321,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messagebox.tpl' => 1,
  ),
),false)) {
function content_6280faae230017_64077412 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4317097176280faae229ab8_78846497', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'default.tpl');
}
/* {block "content"} */
class Block_4317097176280faae229ab8_78846497 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_4317097176280faae229ab8_78846497',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="full-ctr-out">
        <div class="full-ctr-in">
            <br/>
            <h2>Witamy w Naszej bibliotece</h2>
            <div>Skorzystaj z menu w prawym górnym rogu ekranu bo rozpocząć</div>
            <br/><br/><br/><br/>
            <?php $_smarty_tpl->_subTemplateRender('file:messagebox.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>
    </div>



<?php
}
}
/* {/block "content"} */
}
