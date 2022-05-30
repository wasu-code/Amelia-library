{extends file='default.tpl'}

{block name="content"}
    {include file='messagebox.tpl'}

    
    <table cellpadding="5">
        <tr>
            <th>Id</th>
            <th>typ</th>
            <th>Data </th>
            <th>idu</th>
            <th>idb</th>

        </tr>
        {foreach $lista as $wiersz}
            <tr>
                <td>{$wiersz["idTransaction"]}</td>
                <td>{$wiersz["type"]}</td>
                <td>{$wiersz["transactionDate"]}</td>
                <td>{$wiersz["User_idUser"]}</td>
                <td>{$wiersz["Book_idBook"]}</td>

                
            </tr>
        {/foreach}
    </table>

{/block}