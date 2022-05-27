{extends file='default.tpl'}

{block name="content"}
    {include file='messagebox.tpl'}

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
                <td><a href="{$conf->app_root}/bookDeleteDB/{$wiersz["idBook"]}">Usuń</a></td>
                
            </tr>
        {/foreach}
    </table>

{/block}