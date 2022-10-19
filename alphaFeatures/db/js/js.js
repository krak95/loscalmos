function dbshow(){
$(document).ready(function(){
$.ajax({
url:'php/db/db-show.php',
success: function(data){
$('.database-show ol').html(data);
}
})

})
}
function tableshow(){
$(document).ready(function(){
$('.database-show-container li').click(function(){
var db = $(this).data('id2');

$.ajax({
url:'php/table/tables.php',
type:'post',
data:{db:db},
success:function(data){
$('.tables-show-container ol').html(data);
$('.col-show').hide();
}
})
})
$('.database-show button').click(function(e){
e.stopPropagation();
})
})
}

function colshow(){
$(document).ready(function(){
$('.tables-show-container li').click(function(){
var table = $(this).text();
var db = $('#table').text();
$.ajax({
url:'php/column/col.php',
type:'post',
data:{table:table,db:db},
success:function(data){
$('.col-show').show();
$('.col-show-container ol').html(data);
}
})
})
})
}

function newdb(){
$(document).ready(function(){
$('#newdb-btn').click(function(){
$('.newdb-div').css('display','block');

$('.newdb-create-btn').click(function(){
var dbname = $('.dbname').val();
$.ajax({
url:'php/db/db-new.php',
type:'post',
data:{dbname:dbname},
success:function(){
$.ajax({
url:'php/db/db-newblueprint.php',
success:function(){
$.ajax({
url:'php/db/db-new.php',
success:function(data){
$('.database-show ol').html(data);
$('.newdb-div').hide();
}

})
}
})


}
})
}) 
})
})
}

function dropdb(){
$(document).ready(function(){
$('.deldb').click(function(){
var dbname = $(this).data('id');
$('.confirm').show();
$('.confirm-container button').click(function(){
var txt = $(this).text();
if (txt == 'Yes'){
$.ajax({
url:'php/db/db-drop.php',
type:'post',
data:{dbname:dbname},
success:function(){
$.ajax({
url:'php/db/db-dropblueprint.php',
success:function(){
$.ajax({
url:'php/db/db-drop.php',
success:function(data){
$('.database-show ol').html(data);
$('.confirm').hide();
}
})
}
})
}
})
}else{
$('.confirm').hide();
}
})
})
})
}

function datashow(){
$(document).ready(function(){
$('#tabletitle').click(function(){
var table = $(this).text();
var dbname = $(this).data('id');
$.ajax({
url:'php/data/data-show.php',
type:'post',
data:{table:table,dbname:dbname},
success:function(){
$.ajax({
url:'php/data/data-showblueprint.php',
success:function(data){
    $('.data-show').show();
    $('.data-show-container table').html(data);

}
})

}
})
})
})
}