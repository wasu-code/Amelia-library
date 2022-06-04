{extends file='default.tpl'}

{block name="content"}
    {include file='messagebox.tpl'}

    <div id="table">
    {include file="BookList-table.tpl"}
    </div>

{/block}