{extends file='default.tpl'}

{block name="content"}
    {include file='messagebox.tpl'}

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
                <td class="hidden">{$wiersz["Adrdress_idAddress"]}</td>
                <td><a href="{$conf->app_root}/userEdit/{$wiersz["idUser"]}"><button>Edytuj Dane</button></a></td>
                <td><a href="{$conf->app_root}/userDelete/{$wiersz["idUser"]}"><button>Usuń Użytkownika</button></a></td>
            </tr>
        {/foreach}
    </table>

{/block}