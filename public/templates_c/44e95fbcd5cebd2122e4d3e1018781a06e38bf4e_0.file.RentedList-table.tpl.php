<?php
/* Smarty version 4.1.0, created on 2022-06-06 16:36:44
  from 'D:\xampp\htdocs\amelia\app\views\RentedList-table.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629e10fc9d00b8_88742031',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '44e95fbcd5cebd2122e4d3e1018781a06e38bf4e' => 
    array (
      0 => 'D:\\xampp\\htdocs\\amelia\\app\\views\\RentedList-table.tpl',
      1 => 1654526183,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messagebox.tpl' => 1,
  ),
),false)) {
function content_629e10fc9d00b8_88742031 (Smarty_Internal_Template $_smarty_tpl) {
?>
    <?php $_smarty_tpl->_subTemplateRender('file:messagebox.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    
<form id="search-form" onsubmit="ajaxPostForm('search-form','<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/listRented_table','table'); return false;">
<fieldset>
    <legend>Opcje wyszukiwania</legend>
    <label for="sf_title">Tytuł:</label>
    <input type="text" placeholder="tytuł" name="sf_title"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['SearchForm']->value->title ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"/>
    <label for="sf_login">Login:</label>
    <input type="text" placeholder="login" name="sf_login"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['SearchForm']->value->login ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"/>
    <label for="limit">Ilość wyników na stronę:</label>
    <input type="text" class="intinput" name="limit" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['limit']->value ?? null)===null||$tmp==='' ? '10' ?? null : $tmp);?>
" />
    <button type="submit" onclick="document.getElementById('pageNo').value=0" >Filtruj</button>
</fieldset>
    <br/>
    <button onclick="document.getElementById('pageNo').value=<?php echo $_smarty_tpl->tpl_vars['page']->value-1;?>
" type="submit">«</button> 
        page: <input type="text" class="intinput" onkeydown="return event.key != 'Enter';" placeholder="strona" name="page" id="pageNo" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['page']->value ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
" />  
        <button type="submit">GO!</button> 
    <?php if (count($_smarty_tpl->tpl_vars['lista']->value) >= $_smarty_tpl->tpl_vars['limit']->value) {?><button onclick="document.getElementById('pageNo').value=<?php echo $_smarty_tpl->tpl_vars['page']->value+1;?>
" type="submit">»</button><?php }?>
</form>

<!--////
<form id="search-form" onsubmit="ajaxPostForm('search-form','<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/listReserved_table','table'); return false;">
<fieldset>
    <legend>Opcje wyszukiwania</legend>
    <label for="sf_title">Tytuł:</label>
    <input type="text" placeholder="tytuł" name="sf_title"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['SearchForm']->value->title ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"/>
    <label for="sf_login">Login:</label>
    <input type="text" placeholder="login" name="sf_login"  value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['SearchForm']->value->login ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"/>
    <label for="limit">Ilość wyników na stronę:</label>
    <input type="text" class="intinput" name="limit" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['limit']->value ?? null)===null||$tmp==='' ? '10' ?? null : $tmp);?>
" />
    <button type="submit" onclick="document.getElementById('pageNo').value=0" >Filtruj</button>
</fieldset>
<br/>
<button onclick="document.getElementById('pageNo').value=<?php echo $_smarty_tpl->tpl_vars['page']->value-1;?>
" type="submit">«</button> 
    page: <input type="text" class="intinput" onkeydown="return event.key != 'Enter';" placeholder="strona" name="page" id="pageNo" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['page']->value ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
" />  
    <button type="submit">GO!</button> 
<?php if (count($_smarty_tpl->tpl_vars['lista']->value) >= $_smarty_tpl->tpl_vars['limit']->value) {?><button onclick="document.getElementById('pageNo').value=<?php echo $_smarty_tpl->tpl_vars['page']->value+1;?>
" type="submit">»</button><?php }?>
</form>

////-->


<table cellpadding="5">
<tr>
    <th class="hidden">Id</th>
    <th>Tytuł</th>
    <th>Zarezerwowana przez</th>
    <th>Dnia</th>
    <!--th class="hidden">Adress ID</th-->
</tr>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lista']->value, 'wiersz');
$_smarty_tpl->tpl_vars['wiersz']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['wiersz']->value) {
$_smarty_tpl->tpl_vars['wiersz']->do_else = false;
?>
    <tr>
        <td class="hidden"><?php echo $_smarty_tpl->tpl_vars['wiersz']->value["idTransaction"];?>
</td >
        <td><?php echo $_smarty_tpl->tpl_vars['wiersz']->value["title"];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['wiersz']->value["login"];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['wiersz']->value["date"];?>
</td>

        <td><button onclick="ajaxPostForm('search-form','<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/bookReturn/<?php echo $_smarty_tpl->tpl_vars['wiersz']->value["idTransaction"];?>
','table')">Oznacz jako zwróconą</button></td>
        
    </tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</table>
<?php if (count($_smarty_tpl->tpl_vars['lista']->value) < $_smarty_tpl->tpl_vars['limit']->value) {?>Osiągnięto koniec listy<?php }
}
}
