<?php
/* Smarty version 4.1.0, created on 2022-05-28 16:09:17
  from 'D:\xampp\htdocs\amelia\app\views\tst_BookList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_62922d0d761c78_53940814',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ae2b3ee8dc88ff02497cae783eab0df91120cd39' => 
    array (
      0 => 'D:\\xampp\\htdocs\\amelia\\app\\views\\tst_BookList.tpl',
      1 => 1653746919,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messagebox.tpl' => 1,
  ),
),false)) {
function content_62922d0d761c78_53940814 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_124968266362922d0d750093_89151560', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'default.tpl');
}
/* {block "content"} */
class Block_124968266362922d0d750093_89151560 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_124968266362922d0d750093_89151560',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php $_smarty_tpl->_subTemplateRender('file:messagebox.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    
    <table cellpadding="5">
        <tr>
            <th>Id</th>
            <th>typ</th>
            <th>Data </th>
            <th>idu</th>
            <th>idb</th>

        </tr>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lista']->value, 'wiersz');
$_smarty_tpl->tpl_vars['wiersz']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['wiersz']->value) {
$_smarty_tpl->tpl_vars['wiersz']->do_else = false;
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['wiersz']->value["idTransaction"];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['wiersz']->value["type"];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['wiersz']->value["transactionDate"];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['wiersz']->value["User_idUser"];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['wiersz']->value["Book_idBook"];?>
</td>

                
            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </table>

<?php
}
}
/* {/block "content"} */
}
