{extends file='default.tpl'}

{block name="content"}
    <div class="full-ctr-out">
        <div class="full-ctr-in">
            <br/>
            Witaj {$smarty.session.loggedAs|default:"niezalogowany użytkowniku ;)"}
            <br/>
            <h2>Witamy w Naszej bibliotece</h2>
            <div>Skorzystaj z menu w prawym górnym rogu ekranu bo rozpocząć</div>
            <br/><br/><br/><br/>
            {include file='messagebox.tpl'}
        </div>
    </div>



{/block}