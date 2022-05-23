<?php
/* Smarty version 4.1.0, created on 2022-05-23 12:55:16
  from 'D:\xampp\htdocs\amelia\app\views\UsersList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_628b6814564b49_19168986',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b82c30df5ef1904358035820c400a1ccf03c5b02' => 
    array (
      0 => 'D:\\xampp\\htdocs\\amelia\\app\\views\\UsersList.tpl',
      1 => 1653303120,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messagebox.tpl' => 1,
  ),
),false)) {
function content_628b6814564b49_19168986 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1467228513628b6814544b36_74897443', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'default.tpl');
}
/* {block "content"} */
class Block_1467228513628b6814544b36_74897443 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1467228513628b6814544b36_74897443',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php $_smarty_tpl->_subTemplateRender('file:messagebox.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <table cellpadding="5">
        <tr>
            <th class="hidden">Id</th>
            <th>Login</th>
            <th>Role</th>
            <th>Registered</th>
            <th>Name</th>
            <th>Surname</th>
            <th class="hidden">Adress ID</th>
        </tr>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lista']->value, 'wiersz');
$_smarty_tpl->tpl_vars['wiersz']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['wiersz']->value) {
$_smarty_tpl->tpl_vars['wiersz']->do_else = false;
?>
            <tr>
                <td class="hidden"><?php echo $_smarty_tpl->tpl_vars['wiersz']->value["idUser"];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['wiersz']->value["login"];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['wiersz']->value["role"];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['wiersz']->value["registration_date"];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['wiersz']->value["firstName"];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['wiersz']->value["lastName"];?>
</td>
                <td class="hidden"><?php echo $_smarty_tpl->tpl_vars['wiersz']->value["Adrdress_idAddress"];?>
</td>
                <td><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/userEdit/<?php echo $_smarty_tpl->tpl_vars['wiersz']->value["idUser"];?>
">Edytuj Dane</a></td>
                <td><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/userDelete/<?php echo $_smarty_tpl->tpl_vars['wiersz']->value["idUser"];?>
">Usuń Użytkownika</a></td>
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
