<form id="search-form" onsubmit="ajaxPostForm('search-form','{$conf->app_root}/listBooks_table','table'); return false;">
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

                {if $role=="admin"}
                    <td><a href="{$conf->app_root}/bookDeleteDB/{$wiersz["idBook"]}"><button>Usuń</button></a></td>
                    <td><a href="{$conf->app_root}/bookEdit/{$wiersz["idBook"]}"><button>Edytuj</button></a></td>
                {/if}
                {if $role=="mod"}
                    <td><a href="{$conf->app_root}/bookEdit/{$wiersz["idBook"]}"><button>Edytuj</button></a></td>
                    <td>
                        <form method="post" action="{$conf->app_root}/bookRent/{$wiersz["idBook"]}"> 
                            <input type="text" placeholder="login" name="login"/>
                            <input type="submit" value="Wyporzycz"/>
                        </form>
                    </td>
                {/if}
                {if $role=="user"}
                    <td><a href="{$conf->app_root}/bookReserve/{$wiersz["idBook"]}"><button>Zarezerwuj</button></a></td>
                {/if}

            </tr>
        {/foreach}
    </table>
    {if count($lista)<$limit}Osiągnięto koniec listy{/if}