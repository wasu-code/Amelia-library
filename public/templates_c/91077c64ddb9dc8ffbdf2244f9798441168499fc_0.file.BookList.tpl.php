<?php
/* Smarty version 4.1.0, created on 2022-05-28 16:56:36
  from 'D:\xampp\htdocs\amelia\app\views\BookList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629238243fbe89_54712817',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '91077c64ddb9dc8ffbdf2244f9798441168499fc' => 
    array (
      0 => 'D:\\xampp\\htdocs\\amelia\\app\\views\\BookList.tpl',
      1 => 1653749622,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messagebox.tpl' => 1,
  ),
),false)) {
function content_629238243fbe89_54712817 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_119068458629238243d5c94_95922467', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'default.tpl');
}
/* {block "content"} */
class Block_119068458629238243d5c94_95922467 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_119068458629238243d5c94_95922467',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php $_smarty_tpl->_subTemplateRender('file:messagebox.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/listBooks" method="post">
        <legend>Opcje wyszukiwania</legend>
        <fieldset>
            <input type="text" placeholder="tytuł" name="sf_title" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['SearchForm']->value->title ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" />
            <!--input type="text" placeholder="imie" name="sf_name" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['SearchForm']->value->name ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" />
            <input type="text" placeholder="nazwisko" name="sf_surname" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['SearchForm']->value->surname ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" /-->
            <button type="submit" >Filtruj</button>
        </fieldset>
        <br/>
    </form>
    
    <table cellpadding="5">
        <tr>
            <th class="hidden">Id</th>
            <th>Tytuł</th>
            <th>Data Publikacji</th>
            <th>Gatunek</th>
            <th>Ilość dostepnych</th>
            <!--th class="hidden">Adress ID</th-->
        </tr>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lista']->value, 'wiersz');
$_smarty_tpl->tpl_vars['wiersz']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['wiersz']->value) {
$_smarty_tpl->tpl_vars['wiersz']->do_else = false;
?>
            <tr>
                <td class="hidden"><?php echo $_smarty_tpl->tpl_vars['wiersz']->value["idBook"];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['wiersz']->value["title"];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['wiersz']->value["publicationDate"];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['wiersz']->value["genere"];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['wiersz']->value["available"];?>
</td>

                
                <!--td><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/bookDeleteDB/<?php echo $_smarty_tpl->tpl_vars['wiersz']->value["idBook"];?>
">Usuń</a></td>
                <td><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/bookEdit/<?php echo $_smarty_tpl->tpl_vars['wiersz']->value["idBook"];?>
">Edytuj</a></td>
                <td>
                    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/bookRent/<?php echo $_smarty_tpl->tpl_vars['wiersz']->value["idBook"];?>
"> 
                        <input type="text" placeholder="login" name="login"/>
                        <input type="submit" value="Wyporzycz"/>
                    </form>
                </td>

                <td><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/bookReserve/<?php echo $_smarty_tpl->tpl_vars['wiersz']->value["idBook"];?>
">Zarezerwuj</a></td-->
                
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
