<?php
/* Smarty version 4.1.0, created on 2022-05-31 10:18:15
  from 'D:\xampp\htdocs\amelia\app\views\HomePage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6295cf47d00026_91790475',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c74638fa1b407f48fa932d2c84b4115d105ed723' => 
    array (
      0 => 'D:\\xampp\\htdocs\\amelia\\app\\views\\HomePage.tpl',
      1 => 1652781085,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messagebox.tpl' => 1,
  ),
),false)) {
function content_6295cf47d00026_91790475 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7359983766295cf47cda1a0_81800769', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'default.tpl');
}
/* {block "content"} */
class Block_7359983766295cf47cda1a0_81800769 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_7359983766295cf47cda1a0_81800769',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="full-ctr-out">
        <div class="full-ctr-in">
            <br />
            Witaj <?php echo (($tmp = $_SESSION['loggedAs'] ?? null)===null||$tmp==='' ? "niezalogowany użytkowniku ;)" ?? null : $tmp);?>

            <br />
            <h2>Witamy w Naszej bibliotece</h2>
            <div>Skorzystaj z menu w prawym górnym rogu ekranu bo rozpocząć</div>
            <br /><br /><br /><br />
            <?php $_smarty_tpl->_subTemplateRender('file:messagebox.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>
    </div>
<?php
}
}
/* {/block "content"} */
}
