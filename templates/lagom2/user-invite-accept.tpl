{if isset($RSThemes['pages'][$templatefile]) && file_exists($RSThemes['pages'][$templatefile]['fullPath'])}
    {include file=$RSThemes['pages'][$templatefile]['fullPath']}
{else}
     <div class="main-body">
        <div class="container">            
            {include file="$template/includes/login/user-invite.tpl"}
        </div>
    </div>
{/if}