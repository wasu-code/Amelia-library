<?php
/* Smarty version 4.1.0, created on 2022-06-04 19:02:28
  from 'D:\xampp\htdocs\amelia\app\views\UserEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629b9024c7e955_67092479',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b90316ae1c13903fdbf35c80044e7656921fa5c3' => 
    array (
      0 => 'D:\\xampp\\htdocs\\amelia\\app\\views\\UserEdit.tpl',
      1 => 1654362144,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messagebox.tpl' => 1,
  ),
),false)) {
function content_629b9024c7e955_67092479 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1442562174629b9024c53f76_92933914', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'default.tpl');
}
/* {block "content"} */
class Block_1442562174629b9024c53f76_92933914 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1442562174629b9024c53f76_92933914',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div id="msgs">
    <?php $_smarty_tpl->_subTemplateRender('file:messagebox.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>

    <form  id="data-form" onsubmit="ajaxPostForm('data-form','<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/<?php if (($_smarty_tpl->tpl_vars['action']->value == 'add')) {?>userAddDB<?php }
if (($_smarty_tpl->tpl_vars['action']->value == 'update')) {?>userEditDB<?php }?>','msgs'); return false;">
        <div class="flexform">
            <fieldset>
                <legend>Dane osoby</legend>
                <label for="login">Login</label>
                <input  id="login" type="text" placeholder="login" name="login" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form']->value->login ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                <br/>
                <label for="role">Rola</label>
                <!--input  id="role" type="text" placeholder="" name="role" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form']->value->role ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"-->
                <select name="role">
                    <option value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form']->value->role ?? null)===null||$tmp==='' ? 'user' ?? null : $tmp);?>
"><?php echo (($tmp = $_smarty_tpl->tpl_vars['form']->value->role ?? null)===null||$tmp==='' ? 'user' ?? null : $tmp);?>
</option>
                    <option value="user">user</option>
                    <option value="mod">mod</option>
                    <option value="admin">admin</option>
                </select>
                <br/>
                <label for="name">Imi??</label>
                <input id="name" type="text" placeholder="imi??" name="name" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form']->value->name ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                <br/>
                <label for="surname">Nazwisko</label>
                <input id="surname" type="text" placeholder="nazwisko" name="surname" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form']->value->surname ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                <br/>
                <label for="registered">Data Rejestracji</label>
                <input id="registered" type="date" placeholder="YYYY-MM-DD" name="registered" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form']->value->registered ?? null)===null||$tmp==='' ? date('Y-m-d') ?? null : $tmp);?>
">
                <br/>
                <?php if (($_smarty_tpl->tpl_vars['action']->value == 'add')) {?>
                    <label for="pass">Has??o</label>
                    <input id="pass" type="password" placeholder="" name="pass" value="">
                <?php }?>

            </fieldset>
            <fieldset> <!--nie mo??na edytowa?? adresu, tylko dac nowy-->
                <legend>Adres osoby</legend>
                <label for="city">Miasto</label>
                <input  id="city" type="text" placeholder="" name="city" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form']->value->city ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                <br/>
                <label for="street">Ulica</label>
                <input  id="street" type="text" placeholder="" name="street" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form']->value->street ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                <br/>
                <label for="boulding">Number Budynku</label>
                <input  id="boulding" type="text" placeholder="" name="building" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form']->value->building ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                <br/>
                <label for="apartment">Numer Mieszkania</label>
                <input  id="apartment" type="text" placeholder="" name="apartment" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form']->value->apartment ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
            </fieldset>
        </div><br/>
        <div class="ctr">
            <input type="hidden" name="id" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form']->value->id ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
            <input type="submit" value="Zapisz" />
        </div>
        <!--a class="pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
/userList">Powr??t</a-->
        
    </form>

<?php
}
}
/* {/block "content"} */
}
