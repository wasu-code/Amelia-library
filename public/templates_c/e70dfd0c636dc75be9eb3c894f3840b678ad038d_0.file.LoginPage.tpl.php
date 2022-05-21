<?php
/* Smarty version 4.1.0, created on 2022-05-18 13:46:40
  from 'D:\xampp\htdocs\amelia\app\views\LoginPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6284dca003d7d5_29263245',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e70dfd0c636dc75be9eb3c894f3840b678ad038d' => 
    array (
      0 => 'D:\\xampp\\htdocs\\amelia\\app\\views\\LoginPage.tpl',
      1 => 1652874392,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messagebox.tpl' => 1,
  ),
),false)) {
function content_6284dca003d7d5_29263245 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1366132476284dca0030e82_49984579', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'default.tpl');
}
/* {block "content"} */
class Block_1366132476284dca0030e82_49984579 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1366132476284dca0030e82_49984579',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="full-ctr-out">
        <div class="full-ctr-in">
            <br /><br />
            <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/logCheck" method="post" class="pure-form pure-form-stacked">
                <legend>Logowanie</legend>
                <fieldset>
                    <span>
                        <label for="id_login">login: </label>
                        <input id="id_login" type="text" name="login" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['login']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" />
                    </span>
                    <span>
                        <label for="id_pass">pass: </label>
                        <input id="id_pass" type="password" name="pass" />
                    </span>
                </fieldset>
                <input type="submit" value="zaloguj" class="pure-button pure-button-primary" />
            </form>

            <?php $_smarty_tpl->_subTemplateRender('file:messagebox.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>
    </div>

<?php
}
}
/* {/block "content"} */
}
