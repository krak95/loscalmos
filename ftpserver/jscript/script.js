function download(){
$('.download').on('click',function(){
let el = this;
let path = $(el).data('id');
let route = $('#mylastroute').data('id');
let route2 = $('.download').data('id2');
$.post({url:'filetype.php',data:{path:path},success:function(data){
if(data == 'folder'){
$.post({url:'showfolder.php',data:{path:path},success:function(data){
$('.files-container').html(data);
$('.routing').append("<a>"+route2+"  /</a>")
$('.routing a').last().attr("route", route)
$('.routing a').on('click',function(){
    let el = $(this);
    let route2 = $(el).attr('route')
    $.post({url:'showfolder.php',data:{path:route2},success:function(data){
        $('.routing a').nextUntil().remove();
        setTimeout(() => {
            $(el).remove()
            }, 0);
        $('.files-container').html(data);
    }
})
})
}})
}else{

if(confirm(true)){
$.ajax({
url:'download.php/',
type:'post',
data:{path:path},
success:function(data){
window.location.replace(path);
}
})
}
}
}})
})
}
//END OF DOCUMENT