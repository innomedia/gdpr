<div class="contactGDPR">
    <input $AttributesHTML<% if $RightTitle %>aria-describedby="{$Name}_right_title" <% end_if %>/>
    <label>{$SiteConfig.FormularDatenschutztext}</label>
</div>
<style>
    .contactGDPR
    {
        margin-top:20px;
    }
    .contactGDPR label
    {
        display:inline-block;
        position: relative;
        top:-3px;
        width: calc(100% - 40px);
        text-transform: none;
        padding-left:30px !important;
    }
    .contactGDPR label p:last-child
    {
        margin-bottom:0;
    }
    .contactGDPR input.checkbox
    {
        height:auto !important;
        width:30px !important;
        display:inline-block !important;
        margin-left:0;
        float:left;
        position:relative !important;
        top:-3px;
    }
</style>
