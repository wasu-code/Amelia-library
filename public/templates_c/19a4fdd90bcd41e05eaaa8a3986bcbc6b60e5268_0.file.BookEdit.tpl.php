<?php
/* Smarty version 4.1.0, created on 2022-05-27 17:44:04
  from 'D:\xampp\htdocs\amelia\app\views\BookEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6290f1c43c51f0_95240189',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '19a4fdd90bcd41e05eaaa8a3986bcbc6b60e5268' => 
    array (
      0 => 'D:\\xampp\\htdocs\\amelia\\app\\views\\BookEdit.tpl',
      1 => 1653652880,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messagebox.tpl' => 1,
  ),
),false)) {
function content_6290f1c43c51f0_95240189 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7924193766290f1c43a4374_48171419', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'default.tpl');
}
/* {block "content"} */
class Block_7924193766290f1c43a4374_48171419 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_7924193766290f1c43a4374_48171419',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php $_smarty_tpl->_subTemplateRender('file:messagebox.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;
if (($_smarty_tpl->tpl_vars['action']->value == 'add')) {?>bookAddDB<?php }
if (($_smarty_tpl->tpl_vars['action']->value == 'update')) {?>bookEditDB<?php }?>" method="post">
        <div class="flexform">
            <fieldset>
                <legend>Dane Książki</legend>
                <label for="title">Tytuł</label>
                <input  id="title" type="text" placeholder="" name="title" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form']->value->title ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                <br/>
                <label for="genere">Gatunek</label>
                <input  id="genere" type="text" placeholder="" name="genere" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form']->value->genere ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                <br/>
                <label for="published">Data Publikacji</label>
                <input id="published" type="date" placeholder="YYYY-MM-DD" name="published" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form']->value->published ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                <br/>
                <label for="description">Opis</label><br/>
                <textarea id="description" type="text" placeholder="" name="description" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form']->value->description ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" maxlength="1000" rows="10"></textarea>
                <br/>
                <label for="quantity">Ilość Egzemplarzy</label>
                <input id="quantity" type="text" placeholder="" name="quantity" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form']->value->quantity ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                <br/>
                <label for="available">Ilość Dostępnych</label>
                <input id="available" type="text" placeholder="" name="available" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form']->value->available ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">

            </fieldset>
            <fieldset> 
                <legend>Dane Autora</legend>
                <label for="name">Imie</label>
                <input  id="name" type="text" placeholder="" name="name" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form']->value->name ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                <br/>
                <label for="surname">Nazwisko</label>
                <input  id="surname" type="text" placeholder="" name="surname" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form']->value->surname ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                
            </fieldset>
        </div><br/>
        <div class="ctr">
            <!--input type="hidden" name="id" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form']->value->id ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"-->
            <input type="submit" value="Zapisz" />
        </div>
        
    </form>

<?php
}
}
/* {/block "content"} */
}
