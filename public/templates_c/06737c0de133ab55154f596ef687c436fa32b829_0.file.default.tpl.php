<?php
/* Smarty version 4.1.0, created on 2022-05-27 13:14:34
  from 'D:\xampp\htdocs\amelia\app\views\templates\default.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6290b29a7ee7b0_73971844',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '06737c0de133ab55154f596ef687c436fa32b829' => 
    array (
      0 => 'D:\\xampp\\htdocs\\amelia\\app\\views\\templates\\default.tpl',
      1 => 1653650072,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6290b29a7ee7b0_73971844 (Smarty_Internal_Template $_smarty_tpl) {
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
        <img class="navicon" src="https://twemoji.maxcdn.com/v/latest/svg/1f4da.svg"/>
        <div class="whitelinks">
            <h1>Amelia's Library</h1>
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12906446246290b29a7e2f66_74982458', "content");
?>



<div style="height:3em;"></div>
<div class="footer">
    <hr/>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16837972186290b29a7e4895_48523409', "footer");
?>

</div>
</body>
</html><?php }
/* {block "content"} */
class Block_12906446246290b29a7e2f66_74982458 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_12906446246290b29a7e2f66_74982458',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
ERR: template didn't receive content<?php
}
}
/* {/block "content"} */
/* {block "footer"} */
class Block_16837972186290b29a7e4895_48523409 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_16837972186290b29a7e4895_48523409',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/listUsers">listUsers</a> | 
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/userAdd">userAdd</a> | 
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/userDelete">userDelete</a> | 
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/userEdit">userEdit</a> | 
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/listBooks">listBooks</a> | 
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/bookAdd">bookAdd</a> | 
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/"></a> | 
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/"></a> | 
        
    <?php
}
}
/* {/block "footer"} */
}
