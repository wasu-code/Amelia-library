{extends file='default.tpl'}

{block name="content"}

    <div class="full-ctr-out">
        <div class="full-ctr-in">
            <br/><br/>
            <form action="{$conf->app_root}/logCheck" method="post" class="pure-form pure-form-stacked">
                <legend>Logowanie</legend>
                <fieldset>
                    <label for="id_login">login: </label>
                    <input id="id_login" type="text" name="login" />
                    <label for="id_pass">pass: </label>
                    <input id="id_pass" type="password" name="pass" />
                </fieldset>
                <input type="submit" value="zaloguj" class="pure-button pure-button-primary" />
            </form>

            {include file='messagebox.tpl'}
        </div>
    </div>

{/block}