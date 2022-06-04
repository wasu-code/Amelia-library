<form id="search-form" onsubmit="ajaxPostForm('search-form','{$conf->app_root}/listReserved_table','table'); return false;">
<fieldset>
    <legend>Opcje wyszukiwania</legend>
    <label for="sf_title">Tytuł:</label>
    <input type="text" placeholder="tytuł" name="sf_title"  value="{$SearchForm->title|default:''}"/>
    <label for="sf_login">Login:</label>
    <input type="text" placeholder="login" name="sf_login"  value="{$SearchForm->login|default:''}"/>
    <label for="limit">Ilość wyników na stronę:</label>
    <input type="text" class="intinput" name="limit" value="{$limit|default:'10'}" />
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
    <!--th class="hidden">Id</th-->
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

        <td><a href="{$conf->app_root}/bookRentReserved/{$wiersz["idTransaction"]}"><button>Wyporzycz i usuń rezerwację</button></a></td>
        
    </tr>
{/foreach}
</table>
{if count($lista)<$limit}Osiągnięto koniec listy{/if}