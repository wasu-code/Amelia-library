
    {include file='messagebox.tpl'}
    
<form id="search-form" onsubmit="ajaxPostForm('search-form','{$conf->app_root}/listRented_table','table'); return false;">
    <label for="limit">Ilość wyników na stronę:</label>
    <input type="text" class="intinput" name="limit" value="{$limit|default:'10'}" />
    <br/>
    <button onclick="document.getElementById('pageNo').value={$page-1}" type="submit">«</button> 
        page: <input type="text" class="intinput" onkeydown="return event.key != 'Enter';" placeholder="strona" name="page" id="pageNo" value="{$page|default:0}" />  
        <button type="submit">GO!</button> 
    {if count($lista)>=$limit}<button onclick="document.getElementById('pageNo').value={$page+1}" type="submit">»</button>{/if}
</form>


<table cellpadding="5">
<tr>
    <th class="hidden">Id</th>
    <th>Tytuł</th>
    <th>Zarezerwowana przez</th>
    <th>Dnia</th>
    <!--th class="hidden">Adress ID</th-->
</tr>
{foreach $lista as $wiersz}
    <tr>
        <td class="hidden">{$wiersz["idTransaction"]}</td >
        <td>{$wiersz["title"]}</td>
        <td>{$wiersz["login"]}</td>
        <td>{$wiersz["date"]}</td>

        <td><button onclick="ajaxPostForm('search-form','{$conf->app_root}/bookReturn/{$wiersz["idTransaction"]}','table')">Oznacz jako zwróconą</button></td>
        
    </tr>
{/foreach}
</table>
{if count($lista)<$limit}Osiągnięto koniec listy{/if}