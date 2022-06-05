{extends file='default.tpl'}

{block name="content"}

    <div style="position: sticky;">
        <input id="search" type="text" placeholder="Znajdź na tej stronie"/>
        <button onclick="window.find(document.getElementById('search').value)">Szukaj</button>
    </div>
    
    <div id="table">
    {include file="RentedList-table.tpl"}
    </div>

{/block}