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



<script>
    
    setInterval(() => {
        
  
let show = $('.shown').show().css('display','flex');
let next = $('.shown').next().css('display','flex');
let prev = $('.shown').prev().css('display','flex');
$('.shown').next().addClass('next');
$('.shown').prev().addClass('prev');
$('.shown').prevAll().not('.prev').hide();
$('.shown').nextAll().not('.next').hide();


$(next).on('click',function(){
    let el = this;
   setTimeout(() => {
  
    $(el).removeClass('next').addClass('shown');
    $('.shown').css('display','flex');
    $('.shown').next().addClass('next').show();
    $('.shown').prev().addClass('prev').show();
}, 0);

    $('.container div').removeClass('shown');
    $('.container div').removeClass('next');
    $('.container div').removeClass('prev');
    
})
$(prev).on('click',function(){
    let el = this;
   setTimeout(() => {
    $(el).removeClass('prev').addClass('shown');
    $('.shown').css('display','flex');
    $('.shown').next().addClass('next').show();
    $('.shown').prev().addClass('prev').show();

   }, 0);
    
    $('.container div').removeClass('shown');
    $('.container div').removeClass('next');
    $('.container div').removeClass('prev');
    
})

let backG = $('.shown img').attr("alt",)
let bodyG = document.getElementById('mainbox');
let backG1 = bodyG.style.background = "url("+backG+")";

}, 0);



/*
</script>