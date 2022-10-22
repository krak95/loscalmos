function draggable(){
$('#deck1').draggable({ revert: true });
$('#deck1').draggable( "option", "revert", true);
$('#drophere').droppable({
hoverClass:"hover",
activeClass:"active",
drop: function(){
$(this).text('olá');
$('#deck1').text('olá');
setTimeout(() => {
$('#drophere').text('');
    
}, 222);
}
})
}