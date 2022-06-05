<?php
/* Smarty version 4.1.0, created on 2022-06-05 13:40:09
  from 'D:\xampp\htdocs\amelia\app\views\RentedList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629c96198b4a78_32891614',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'be55a26fa477fb51137e77ec4789e2d7a97bd429' => 
    array (
      0 => 'D:\\xampp\\htdocs\\amelia\\app\\views\\RentedList.tpl',
      1 => 1654429197,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:RentedList-table.tpl' => 1,
  ),
),false)) {
function content_629c96198b4a78_32891614 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_725453645629c96198af1d3_21945601', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'default.tpl');
}
/* {block "content"} */
class Block_725453645629c96198af1d3_21945601 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_725453645629c96198af1d3_21945601',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div style="position: sticky;">
        <input id="search" type="text" placeholder="Znajdź na tej stronie"/>
        <button onclick="window.find(document.getElementById('search').value)">Szukaj</button>
    </div>
    
    <div id="table">
    <?php $_smarty_tpl->_subTemplateRender("file:RentedList-table.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>

<?php
}
}
/* {/block "content"} */
}
