{embed="includes/_doc-top" 
  channel="sponsors"
  title="Sponsorship Program | Email{if segment_3} {segment_3_category_name}{/if}"}
<div class="body">
  {assign_variable:sponsor_zipcode="{exp:user:stats dynamic='off'}{exp:weblog:entries weblog='locations' category='{sponsor_number}' limit='1'}{sponsor_zip}{/exp:weblog:entries}{/exp:user:stats}"}
  <h1>This feature is currently unavailable. Sorry for the inconvenience.</h1>
  {!--{if segment_3}
  
  {if:elseif segment_3 && segment_4}
  
  {if:else}
    {exp:user:stats dynamic="off"}
      {embed="sponsors/_email-all" sponsor_number="{sponsor_number}" sponsor_zipcode="{sponsor_zipcode}"}
    {/exp:user:stats}
  {/if}--}

</div><!-- /.body -->
{embed="includes/_doc_bottom" script_add="sponsors"}