{extends file='default.tpl'}

{block name="content"}
    {include file='messagebox.tpl'}

    <form action="{$conf->app_root}/listBooks" method="post">
        <fieldset>
            <legend>Opcje wyszukiwania</legend>
            <label for="sf_title">Tytuł:</label>
            <input type="text" placeholder="tytuł" name="sf_title" value="{$SearchForm->title|default:''}" />
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
            <th class="hidden">Id</th>
            <th>Tytuł</th>
            <th>Data Publikacji</th>
            <th>Gatunek</th>
            <th>Ilość dostepnych</th>
            <!--th class="hidden">Adress ID</th-->
        </tr>
        {foreach $lista as $wiersz}
            <tr>
                <td class="hidden">{$wiersz["idBook"]}</td>
                <td>{$wiersz["title"]}</td>
                <td>{$wiersz["publicationDate"]}</td>
                <td>{$wiersz["genere"]}</td>
                <td>{$wiersz["available"]}</td>

                <td><a href="{$conf->app_root}/bookDeleteDB/{$wiersz["idBook"]}"><button>Usuń</button></a></td>
                <td><a href="{$conf->app_root}/bookEdit/{$wiersz["idBook"]}"><button>Edytuj</button></a></td>
                
            </tr>
        {/foreach}
    </table>
    {if count($lista)<$limit}Osiągnięto koniec listy{/if}

{/block}