<?php
$path    = 'files';
if ($handle = opendir($path)) {
    while (false !== ($file = readdir($handle))) {
        if ('.' === $file) continue;
        if ('..' === $file) continue;
        ?>
        <ol>
            <li class='download' data-id='<?=$path?>\<?=$file?>'> <?=$file?> </li>
        </ol>
    <?php }
    closedir($handle);
}
?>
<script src="jq.js"></script>
<script>
    $(document).ready(function(){
        $('.download').on('click',function(){
            let el = this;
            let path = $(el).data('id');
            $.ajax({
                url:'download.php/'+path,
                type:'get',
                data:{path:path},
                success:function(data){
                    window.location.replace(path);
                }
            })
        })
    }
    )
</script>