<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta charset="utf-8"/>
	<title>Amelia's Library</title>
    <link rel="stylesheet" href="{$conf->app_root}/assets/css/main.css">
    <link rel="icon" type="image/svg" href="https://twemoji.maxcdn.com/v/latest/svg/1f4da.svg"/>
</head>
<body>
    
    <nav class="nav">
        <img class="navicon" src="https://twemoji.maxcdn.com/v/latest/svg/1f4da.svg"/>
        <div class="whitelinks">
            <h1>Amelia's Library</h1>
            <li><a href="{$conf->app_root}/elo">Elo</a></li>
            <li><a href="{$conf->app_root}">BB</a></li>
            {if !isset($smarty.session.loggedAs)}
                <li><a href="{$conf->app_root}/login">Login</a></li>
            {else}
                <li><a href="{$conf->app_root}/logOut">Logout {$smarty.session.loggedAs}</a></li>
            {/if}
            
        </div>
    </nav>


{block name="content"}ERR: template didn't receive content{/block}


<div style="height:3em;"></div>
<div class="footer">
    <hr/>
    {block name="footer"}
        <a href="{$conf->app_root}/listUsers">listUsers</a> | 
        <a href="{$conf->app_root}/userAdd">userAdd</a> | 
        <a href="{$conf->app_root}/userDelete">userDelete</a> | 
        <a href="{$conf->app_root}/userEdit">userEdit</a> | 
        <a href="{$conf->app_root}/"></a> | 
        <a href="{$conf->app_root}/"></a> | 
        <a href="{$conf->app_root}/"></a> | 
        <a href="{$conf->app_root}/"></a> | 
        
    {/block}
</div>
</body>
</html>