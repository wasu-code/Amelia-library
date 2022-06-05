<?php
/* Smarty version 4.1.0, created on 2022-06-05 03:14:43
  from 'D:\xampp\htdocs\amelia\app\views\RentedList-table.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629c0383e4c1b5_31886431',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '44e95fbcd5cebd2122e4d3e1018781a06e38bf4e' => 
    array (
      0 => 'D:\\xampp\\htdocs\\amelia\\app\\views\\RentedList-table.tpl',
      1 => 1654391682,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_629c0383e4c1b5_31886431 (Smarty_Internal_Template $_smarty_tpl) {
?><form id="search-form" onsubmit="ajaxPostForm('search-form','<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/listRented_table','table'); return false;">
    <label for="limit">Ilość wyników na stronę:</label>
    <input type="text" class="intinput" name="limit" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['limit']->value ?? null)===null||$tmp==='' ? '10' ?? null : $tmp);?>
" />
    <br/>
    <button onclick="document.getElementById('pageNo').value=<?php echo $_smarty_tpl->tpl_vars['page']->value-1;?>
" type="submit">«</button> 
        page: <input type="text" class="intinput" onkeydown="return event.key != 'Enter';" placeholder="strona" name="page" id="pageNo" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['page']->value ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
" />  
        <button type="submit">GO!</button> 
    <?php if (count($_smarty_tpl->tpl_vars['lista']->value) >= $_smarty_tpl->tpl_vars['limit']->value) {?><button onclick="document.getElementById('pageNo').value=<?php echo $_smarty_tpl->tpl_vars['page']->value+1;?>
" type="submit">»</button><?php }?>
</form>


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

        <td><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/bookReturn/<?php echo $_smarty_tpl->tpl_vars['wiersz']->value["idTransaction"];?>
"><button>Oznacz jako zwróconą</button></a></td>
        
    </tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</table>
<?php if (count($_smarty_tpl->tpl_vars['lista']->value) < $_smarty_tpl->tpl_vars['limit']->value) {?>Osiągnięto koniec listy<?php }
}
}
