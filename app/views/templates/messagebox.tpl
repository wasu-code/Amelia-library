{foreach $msgs->getMessages() as $msg}
<div class="alert {if $msg->isInfo()}alert-info{/if}
                  {if $msg->isWarning()}alert-warning{/if}
                  {if $msg->isError()}alert-error{/if}" role="alert">
   {$msg->text}
</div>
{/foreach}