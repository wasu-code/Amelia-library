<?php
/* Smarty version 4.1.0, created on 2022-05-23 20:55:13
  from 'D:\xampp\htdocs\amelia\app\views\UserEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_628bd891893f25_67217301',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b90316ae1c13903fdbf35c80044e7656921fa5c3' => 
    array (
      0 => 'D:\\xampp\\htdocs\\amelia\\app\\views\\UserEdit.tpl',
      1 => 1653332110,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messagebox.tpl' => 1,
  ),
),false)) {
function content_628bd891893f25_67217301 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_914479673628bd89186c003_12702316', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'default.tpl');
}
/* {block "content"} */
class Block_914479673628bd89186c003_12702316 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_914479673628bd89186c003_12702316',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php $_smarty_tpl->_subTemplateRender('file:messagebox.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;
if (($_smarty_tpl->tpl_vars['action']->value == 'add')) {?>userAddDB<?php }
if (($_smarty_tpl->tpl_vars['action']->value == 'update')) {?>userEditDB<?php }?>" method="post" class="pure-form pure-form-aligned">
        <fieldset>
            <legend>Dane osoby</legend>
            <label for="login">Login</label>
            <input  id="login" type="text" placeholder="login" name="login" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form']->value->login ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">

            <label for="role">Rola</label>
            <!--input  id="role" type="text" placeholder="" name="role" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form']->value->role ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"-->

            <select name="role">
                <option value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form']->value->role ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"><?php echo (($tmp = $_smarty_tpl->tpl_vars['form']->value->role ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</option>
				<option value="user">user</option>
				<option value="mod">mod</option>
				<option value="admin">admin</option>
			</select>

            <label for="name">Imię</label>
            <input id="name" type="text" placeholder="imię" name="name" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form']->value->name ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">

            <label for="surname">Nazwisko</label>
            <input id="surname" type="text" placeholder="nazwisko" name="surname" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form']->value->surname ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">

            <label for="registered">Data Rejestracji</label>
            <input id="registered" type="date" placeholder="YYYY-MM-DD" name="registered" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form']->value->registered ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
            
            <label for="pass">Hasło</label>
            <input id="pass" type="password" placeholder="" name="pass" value="">

            </fieldset>
        <fieldset> <!--nie można edytować adresu, tylko dac nowy-->
            <legend>Adres osoby</legend>
            <label for="city">Miasto</label>
            <input  id="city" type="text" placeholder="" name="city" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form']->value->city ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
            
            <label for="street">Ulica</label>
            <input  id="street" type="text" placeholder="" name="street" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form']->value->street ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
            
            <label for="boulding">Number Budynku</label>
            <input  id="boulding" type="text" placeholder="" name="building" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form']->value->building ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
            
            <label for="apartment">Numer Mieszkania</label>
            <input  id="apartment" type="text" placeholder="" name="apartment" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form']->value->apartment ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
        </fieldset>
        <input type="hidden" name="id" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form']->value->id ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
        <input type="submit" value="Zapisz" />
        <!--a class="pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
/userList">Powrót</a-->
        
    </form>

<?php
}
}
/* {/block "content"} */
}
