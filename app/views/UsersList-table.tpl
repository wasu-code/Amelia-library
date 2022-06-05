{include file='messagebox.tpl'}

<form id="search-form" onsubmit="ajaxPostForm('search-form','{$conf->app_root}/listUsers_table','table'); return false;">
<fieldset>
    <legend>Opcje wyszukiwania</legend>
    <label for="sf_login">Login:</label>
    <input type="text" placeholder="login" name="sf_login" value="{$SearchForm->login|default:''}" />
    <label for="limit">Ilość wyników na stronę:</label>
    <input type="text" class="intinput" name="limit" value="{$limit|default:10}" />
    <button type="submit" onclick="document.getElementById('pageNo').value=0" >Filtruj</button>
</fieldset>
<br/>
<button onclick="document.getElementById('pageNo').value={$page-1}" type="submit">«</button> 
    page: <input type="text" class="intinput" onkeydown="return event.key != 'Enter';" placeholder="strona" name="page" id="pageNo" value="{$page|default:0}" /> 
    <button type="submit">GO!</button> 
{if count($lista)>=$limit}<button onclick="document.getElementById('pageNo').value={$page+1}" type="submit">»</button>{/if}
</form>

<table cellpadding="5">
<tr>
    <th class="hidden">Id</th>
    <th>Login</th>
    <th>Role</th>
    <th>Registered</th>
    <th>Name</th>
    <th>Surname</th>
    <th class="hidden">Adress ID</th>
</tr>
{foreach $lista as $wiersz}
    <tr>
        <td class="hidden">{$wiersz["idUser"]}</td>
        <td>{$wiersz["login"]}</td>
        <td>{$wiersz["role"]}</td>
        <td>{$wiersz["registration_date"]}</td>
        <td>{$wiersz["firstName"]}</td>
        <td>{$wiersz["lastName"]}</td>
        <td class="hidden">{$wiersz["Address_idAddress"]}</td>
        <td><a href="{$conf->app_root}/userEdit/{$wiersz["idUser"]}"><button>Edytuj Dane</button></a></td>
        <td><button onclick="confirmDelete('search-form','{$conf->app_root}/userDelete/{$wiersz["idUser"]}','table');">Usuń Użytkownika</button></td>
    </tr>
{/foreach}
</table>
{if count($lista)<$limit}Osiągnięto koniec listy{/if}