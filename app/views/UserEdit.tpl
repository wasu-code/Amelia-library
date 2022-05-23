{extends file='default.tpl'}

{block name="content"}
    {include file='messagebox.tpl'}

    <form action="{strip}{$conf->action_root}
                    {if ($action=='add')}userAddDB{/if}
                    {if ($action=='update')}userEditDB{/if}
                  {/strip}" method="post" class="pure-form pure-form-aligned">
        <fieldset>
            <legend>Dane osoby</legend>
            <label for="login">Login</label>
            <input  id="login" type="text" placeholder="login" name="login" value="{$form->login|default:''}">

            <label for="role">Rola</label>
            <!--input  id="role" type="text" placeholder="" name="role" value="{$form->role|default:''}"-->

            <select name="role">
                <option value="{$form->role|default:''}">{$form->role|default:''}</option>
				<option value="user">user</option>
				<option value="mod">mod</option>
				<option value="admin">admin</option>
			</select>

            <label for="name">Imię</label>
            <input id="name" type="text" placeholder="imię" name="name" value="{$form->name|default:''}">

            <label for="surname">Nazwisko</label>
            <input id="surname" type="text" placeholder="nazwisko" name="surname" value="{$form->surname|default:''}">

            <label for="registered">Data Rejestracji</label>
            <input id="registered" type="date" placeholder="YYYY-MM-DD" name="registered" value="{$form->registered|default:''}">
            
            {if ($action=='add')}
                <label for="pass">Hasło</label>
                <input id="pass" type="password" placeholder="" name="pass" value="">
            {/if}

        </fieldset>
        <fieldset> <!--nie można edytować adresu, tylko dac nowy-->
            <legend>Adres osoby</legend>
            <label for="city">Miasto</label>
            <input  id="city" type="text" placeholder="" name="city" value="{$form->city|default:''}">
            
            <label for="street">Ulica</label>
            <input  id="street" type="text" placeholder="" name="street" value="{$form->street|default:''}">
            
            <label for="boulding">Number Budynku</label>
            <input  id="boulding" type="text" placeholder="" name="building" value="{$form->building|default:''}">
            
            <label for="apartment">Numer Mieszkania</label>
            <input  id="apartment" type="text" placeholder="" name="apartment" value="{$form->apartment|default:''}">
        </fieldset>
        <input type="hidden" name="id" value="{$form->id|default:''}">
        <input type="submit" value="Zapisz" />
        <!--a class="pure-button button-secondary" href="{$conf->action_root}/userList">Powrót</a-->
        
    </form>

{/block}