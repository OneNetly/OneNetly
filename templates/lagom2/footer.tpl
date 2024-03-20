  <center><br><script type="text/javascript">
	atOptions = {
		'key' : '5c5b84f70ab47f3008ca2d0fdf9fb7d6',
		'format' : 'iframe',
		'height' : 60,
		'width' : 468,
		'params' : {}
	};
	document.write('<scr' + 'ipt type="text/javascript" src="//www.topcreativeformat.com/5c5b84f70ab47f3008ca2d0fdf9fb7d6/invoke.js"></scr' + 'ipt>');
</script><br></center>
{if file_exists("templates/$template/overwrites/footer.tpl")}
    {include file="{$template}/overwrites/footer.tpl"}
{else}
    {if isset($RSThemes['footer-layouts'])}
        {include file=$RSThemes['footer-layouts']['mediumPath']}
    {else}
        {include file="templates/{$template}/core/layouts/footer/default/default.tpl"}
    {/if}
{/if}
{$footeroutput}