<style type="text/css">
    @media (min-width: 768px){
        .modal-dialog {
            width: 600px;
            margin: 150px auto;
        }
    }
</style>
<div class="modal fade" id="myModal"  aria-hidden="true">
    <div class="modal-dialog" style="width: 1000px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">媒体库</h4>
            </div>
            <div class="modal-body" style="padding:0px; margin:0px; width: 1000px;">
                <iframe id="image" width="1000" height="500" src="/filemanager/dialog.php?type=1&field_id=image" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<script type="text/javascript">

    function changeImageId(id) {
        $('iframe#image').attr( 'src', '/filemanager/dialog.php?type=1&field_id=' + id);
    }

    function responsive_filemanager_callback(field_id){
        var url=jQuery('#'+field_id).val();
        jQuery('#'+field_id).parent().find('img').attr('src', url);

    }
</script>