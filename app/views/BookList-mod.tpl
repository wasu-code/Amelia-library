{extends file='default.tpl'}

{block name="content"}
    {include file='messagebox.tpl'}

    <form action="{$conf->app_root}/listBooks" method="post">
        <legend>Opcje wyszukiwania</legend>
        <fieldset>
            <input type="text" placeholder="tytuł" name="sf_title" value="{$SearchForm->title|default:''}" />
            <!--input type="text" placeholder="imie" name="sf_name" value="{$SearchForm->name|default:''}" />
            <input type="text" placeholder="nazwisko" name="sf_surname" value="{$SearchForm->surname|default:''}" /-->
            <button type="submit" >Filtruj</button>
        </fieldset>
        <br/>
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

                <td><a href="{$conf->app_root}/bookEdit/{$wiersz["idBook"]}">Edytuj</a></td>
                <td>
                    <form method="post" action="{$conf->app_root}/bookRent/{$wiersz["idBook"]}"> 
                        <input type="text" placeholder="login" name="login"/>
                        <input type="submit" value="Wyporzycz"/>
                    </form>
                </td>
                
            </tr>
        {/foreach}
    </table>

{/block}