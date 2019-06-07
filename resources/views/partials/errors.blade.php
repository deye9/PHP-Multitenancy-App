<div class="alert alert-danger alert-errors" style="display:none" id="resetError">
    <span class="float-right" aria-hidden="true" style="cursor:pointer; cursor:hand;" onclick="$('#ErrorMsg').html('');$('#resetError').toggle();">&times;</span>
    <div id="ErrorMsg"></div>
</div>

<script>
    function ShowErrors(ErrorMsg)
    {
        $('#resetError').toggle();
        $('#ErrorMsg').html(ErrorMsg);
    }
</script>
