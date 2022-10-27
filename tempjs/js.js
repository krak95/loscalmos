/*$(document).ready(function(){
let leng = $('.container div').length
let nrshow = 2;
let nrofpages = leng/nrshow;
for(i=0;i < nrofpages;i++){
let pagenumber = i+1;
$('.mainbox').append('<a page='+i+'>'+pagenumber+'</a>')
}
$('.container div').slice(nrshow,leng).hide();
$('a').click(function(){
let currentpage = $(this).attr('page');
let firstitemshown = currentpage * nrshow;
let lastitemshown = firstitemshown + nrshow;
$('.container div').slice(0,nrshow).show();
$('.container div').hide().slice(firstitemshown,lastitemshown).show();
})*/


