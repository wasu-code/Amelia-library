<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta charset="utf-8"/>
	<title>Amelia's Library</title>
    <link rel="stylesheet" href="{$conf->app_root}/assets/css/main.css">
    <link rel="icon" type="image/svg" href="https://twemoji.maxcdn.com/v/latest/svg/1f4da.svg"/>
    <script src="{$conf->app_root}/assets/js/functions.js"></script>
</head>
<body>
    
    <nav class="nav">
        <a href="{$conf->app_root}">
            <img class="navicon" src="https://twemoji.maxcdn.com/v/latest/svg/1f4da.svg"/>
        </a>
        <div class="whitelinks">
            <h1><a href="{$conf->app_root}">Amelia's Library</a></h1>

            {if isset($smarty.session.role)}
                {if $smarty.session.role=='admin'}
                    <li><a href="{$conf->app_root}/listUsers">Użytkownicy</a></li>
                    <li><a href="{$conf->app_root}/userAdd">Dodaj Użytkownika</a></li>
                    <li><a href="{$conf->app_root}/listBooks">Księgozbiór</a></li>
                    <li><a href="{$conf->app_root}/bookAdd">Dodaj Książkę</a></li>
                {/if}
                {if $smarty.session.role=='mod'}
                    <li><a href="{$conf->app_root}/listUsers">Użytkownicy</a></li>
                    <li><a href="{$conf->app_root}/userAdd">Dodaj Użytkownika</a></li>
                    <li><a href="{$conf->app_root}/listBooks">Księgozbiór</a></li>
                    <li><a href="{$conf->app_root}/listReserved">Zarezerwowane</a></li>
                    <li><a href="{$conf->app_root}/listRented">Wyporzyczone</a></li>
                {/if}
                {if $smarty.session.role=='user'}
                    <li><a href="{$conf->app_root}/listBooks">Księgozbiór</a></li>
                {/if}
            {/if}




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
        <i>„Powiedz mi, jakie książki masz w domu, a powiem ci, kim jesteś.”<br/>
        Jarosław Iwaszkiewicz</i>
    {/block}
</div>
</body>
</html>