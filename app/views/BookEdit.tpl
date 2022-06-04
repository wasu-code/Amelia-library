{extends file='default.tpl'}

{block name="content"}
    <div id="msgs">
    {include file='messagebox.tpl'}
    </div>

    <form {strip} id="data-form" onsubmit="ajaxPostForm('data-form','{$conf->app_root}/
                {if ($action=='add')}bookAddDB{/if}
                {if ($action=='update')}bookEditDB{/if}    
                ','msgs'); return false;">
                {/strip}
        <div class="flexform">
            <fieldset>
                <legend>Dane Książki</legend>
                <label for="title">Tytuł</label>
                <input  id="title" type="text" placeholder="" name="title" value="{$form->title|default:''}">
                <br/>
                <label for="genere">Gatunek</label>
                <input  id="genere" type="text" placeholder="" name="genere" value="{$form->genere|default:''}">
                <br/>
                <label for="published">Data Publikacji</label>
                <input id="published" type="date" placeholder="YYYY-MM-DD" name="published" value="{$form->published|default:''}">
                <br/>
                <label for="description">Opis</label><br/>
                <textarea id="description" type="text" placeholder="" name="description" value="{$form->description|default:''}" maxlength="1000" rows="10"></textarea>
                <br/>
                <label for="quantity">Ilość Egzemplarzy</label>
                <input id="quantity" type="text" placeholder="" name="quantity" value="{$form->quantity|default:''}">
                <br/>
                <label for="available">Ilość Dostępnych</label>
                <input id="available" type="text" placeholder="" name="available" value="{$form->available|default:''}">

            </fieldset>
            <fieldset> 
                <legend>Dane Autora</legend>
                <label for="name">Imie</label>
                <input  id="name" type="text" placeholder="" name="name" value="{$form->name|default:''}">
                <br/>
                <label for="surname">Nazwisko</label>
                <input  id="surname" type="text" placeholder="" name="surname" value="{$form->surname|default:''}">
                
            </fieldset>
        </div><br/>
        <div class="ctr">
            <!--input type="hidden" name="id" value="{$form->id|default:''}"-->
            <input type="submit" value="Zapisz" />
        </div>
        
    </form>

{/block}