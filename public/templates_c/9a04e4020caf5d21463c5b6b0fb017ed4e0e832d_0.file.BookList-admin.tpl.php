<?php
/* Smarty version 4.1.0, created on 2022-06-04 11:44:22
  from 'D:\xampp\htdocs\amelia\app\views\BookList-admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629b29761716f2_75005495',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9a04e4020caf5d21463c5b6b0fb017ed4e0e832d' => 
    array (
      0 => 'D:\\xampp\\htdocs\\amelia\\app\\views\\BookList-admin.tpl',
      1 => 1654335859,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messagebox.tpl' => 1,
  ),
),false)) {
function content_629b29761716f2_75005495 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1743580288629b29760ed317_81646344', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'default.tpl');
}
/* {block "content"} */
class Block_1743580288629b29760ed317_81646344 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1743580288629b29760ed317_81646344',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php $_smarty_tpl->_subTemplateRender('file:messagebox.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/listBooks" method="post">
        <fieldset>
            <legend>Opcje wyszukiwania</legend>
            <label for="sf_title">Tytuł:</label>
            <input type="text" placeholder="tytuł" name="sf_title" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['SearchForm']->value->title ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" />
            <label for="limit">Ilość wyników na stronę:</label>
            <input type="text" class="intinput" placeholder="tytuł" name="limit" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['limit']->value ?? null)===null||$tmp==='' ? '10' ?? null : $tmp);?>
" />
            <button type="submit" onclick="document.getElementById('pageNo').value=0" >Filtruj</button>
        </fieldset>
        <br/>
        <button onclick="document.getElementById('pageNo').value=<?php echo $_smarty_tpl->tpl_vars['page']->value-1;?>
" type="submit">«</button> 
            page: <input type="text" class="intinput" placeholder="strona" name="page" id="pageNo" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['page']->value ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
" />  
        <?php if (count($_smarty_tpl->tpl_vars['lista']->value) >= $_smarty_tpl->tpl_vars['limit']->value) {?><button onclick="document.getElementById('pageNo').value=<?php echo $_smarty_tpl->tpl_vars['page']->value+1;?>
" type="submit">»</button><?php }?>
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

                <td><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/bookDeleteDB/<?php echo $_smarty_tpl->tpl_vars['wiersz']->value["idBook"];?>
"><button>Usuń</button></a></td>
                <td><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/bookEdit/<?php echo $_smarty_tpl->tpl_vars['wiersz']->value["idBook"];?>
"><button>Edytuj</button></a></td>
                
            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </table>
    <?php if (count($_smarty_tpl->tpl_vars['lista']->value) < $_smarty_tpl->tpl_vars['limit']->value) {?>Osiągnięto koniec listy<?php }?>

<?php
}
}
/* {/block "content"} */
}
