const poket = {
name: 'fag',
points:'100',
a1:
{
name:'jeez1',
val:10},
a2: 
{
name:'jeez2',
val:20
},
a3:
{
name:'jeez3',
val:30
},
a4:
{
name:'jeez4',
val:40
},
}

$(document).ready(function(){
if(sessionStorage.getItem('poket') == null ){
sessionStorage.setItem("poket", JSON.stringify(poket));
}
const a1 = poket.a1.name;
const a2 = poket.a2.name;
const a3 = poket.a3.name;
const a4 = poket.a4.name;

const vala1 = poket.a1.val;
const vala2 = poket.a2.val;
const vala3 = poket.a3.val;
const vala4 = poket.a4.val;

$('#a1').on('click',function(){
var a1set = sessionStorage.getItem('poket');
a1set = a1set ? JSON.parse(a1set) : {};
a1set['points'] -= 10;
sessionStorage.setItem("poket", JSON.stringify(a1set));
})

setInterval(() => {
const poket = JSON.parse(sessionStorage.getItem('poket'));
$('#enemy-points').html(poket.points);
if(poket.points <= 0){
poket.points = '0';
$('#enemy-points').html(poket.points+' She gone.');
}
}, 0);

$('#a1').html(a1+' => '+vala1);
$('#a2').html(a2+' => '+vala2);
$('#a3').html(a3+' => '+vala3);
$('#a4').html(a4+' => '+vala4);

$('').on('click',function(){
alert(poket.points);
})
})

/*$(window).bind("beforeunload", function() { 
    return confirm("Do you really want to close?"); 
})*/
