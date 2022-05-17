{extends file='default.tpl'}

{block name="content"}
    {include file='messagebox.tpl'}

    <table cellpadding="5">
        {foreach $lista as $wiersz}
            <tr>
                <td>{$wiersz["login"]}</td>
                <td>{$wiersz["firstName"]}</td>
            </tr>
        {/foreach}
    </table>

{/block}