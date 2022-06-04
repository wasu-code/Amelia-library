<?php
/* Smarty version 4.1.0, created on 2022-05-31 10:02:44
  from 'D:\xampp\htdocs\amelia\app\views\templates\default.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6295cba482f403_55539097',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '06737c0de133ab55154f596ef687c436fa32b829' => 
    array (
      0 => 'D:\\xampp\\htdocs\\amelia\\app\\views\\templates\\default.tpl',
      1 => 1653950342,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6295cba482f403_55539097 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta charset="utf-8"/>
	<title>Amelia's Library</title>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/assets/css/main.css">
    <link rel="icon" type="image/svg" href="https://twemoji.maxcdn.com/v/latest/svg/1f4da.svg"/>
</head>
<body>
    
    <nav class="nav">
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
">
            <img class="navicon" src="https://twemoji.maxcdn.com/v/latest/svg/1f4da.svg"/>
        </a>
        <div class="whitelinks">
            <h1><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
">Amelia's Library</a></h1>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/elo">Elo</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
">BB</a></li>
            <?php if (!(isset($_SESSION['loggedAs']))) {?>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/login">Login</a></li>
            <?php } else { ?>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/logOut">Logout <?php echo $_SESSION['loggedAs'];?>
</a></li>
            <?php }?>
            
        </div>
    </nav>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2569021046295cba47e3920_66451027', "content");
?>



<div style="height:3em;"></div>
<div class="footer">
    <hr/>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16944092616295cba47e9044_63556373', "footer");
?>

</div>
</body>
</html><?php }
/* {block "content"} */
class Block_2569021046295cba47e3920_66451027 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_2569021046295cba47e3920_66451027',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
ERR: template didn't receive content<?php
}
}
/* {/block "content"} */
/* {block "footer"} */
class Block_16944092616295cba47e9044_63556373 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_16944092616295cba47e9044_63556373',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/listUsers">listUsers</a> | 
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/userAdd">userAdd</a> | 
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/userEdit">userEdit</a> | 
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/listBooks">listBooks</a> | 
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/bookAdd">bookAdd</a> | 
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/listReserved">listReserved</a> | 
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/listRented">listRented</a> | 
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/"></a> | 
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/"></a> | 
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/"></a> | 
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/"></a> | 
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/"></a> | 
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/"></a> | 
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/"></a> | 
    <?php
}
}
/* {/block "footer"} */
}
