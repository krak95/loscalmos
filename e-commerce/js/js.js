$(document).ready(function(){

})
function default1(){
$(document).ready(function(){
})
}
function keyPressed(){
var key = event.keyCode || event.charCode || event.which ;
return key;
}

function topmenuselected(){
$(document).ready(function(){
$('.topmenu li').on('click',function(){
$('.topmenu li').removeClass('topmenuselected')
setTimeout(() => {
$(this).addClass('topmenuselected')
}, 0);
})
})
}

function loginform(){
$(document).ready(function(){
$('#topmenu-login').click(function(){
    $('.user-orders').hide();
$('.login-div').css('display','flex');
$('.shop-div').css('display','none');
$('.cart-div').css('display','none');
$('.backcurtain').click(function(){
$('.backcurtain').hide();
$('.login-div').css('display','none');
})
$('.login-div').click(function(event){
event.stopPropagation();
});
}) 
})
}

function regform(){
$(document).ready(function(){
$('#register').click(function(){
$('.reg-div').css('display','flex');
$('.login-div').css('display','none');
$('.backcurtain').css('display','flex');
$('.backcurtain').click(function(){
$('.backcurtain').hide();
$('.reg-div').css('display','none');
})
$('.reg-div').click(function(event){
event.stopPropagation();
});
}) 
})
}

function reguser(){
$(document).ready(function(){
$('.signupyes').hide();
$('#reg-form-name,#reg-form-mail,#reg-form-uname,#reg-form-pass').on('keypress', function(event){
if (event.key === "Enter") {
event.preventDefault();
$('#reg-submit').click();
}
})
$('#reg-submit').click(function(){
var email = $('#reg-form-mail').val();
var uname = $('#reg-form-uname').val();
var pwd = $('#reg-form-pass').val();
if( email == '' || uname == '' || pwd == ''){

}
$.post('php/user/checkuser.php', {
uname: uname
}, function(response) {
if (response == "userfound") {
$('.alert-reg-uname').css('display','inline');
return false;
}
$.post('php/user/checkmail.php', {
email: email
}, function(response) {
if (response == "notvalid") {
$('.alert-reg-mail').css('display','inline').fadeOut(2500);
return false;
}
else if(email != '' && uname != '' && pwd != ''){
$('#reg-submit').addClass('login-btn-correct');
setTimeout(function() {    
$.ajax({
url:'php/include/login.php',
type:'POST',
data:{email:email,pwd:pwd,uname:uname},
success:function(){
$('#reg-submit').removeClass('login-btn-correct');
$('.signupyes').show();
}
});
}, 500);
}
});
});
});
});
}

function login(){
$(document).ready(function(){
$('#login-uname,#login-pass').on('keypress', function(event){
if (event.key === "Enter") {
event.preventDefault();
$('#login-btn').click();
}
})
$('#login-btn').click(function(){
var uname = $('#login-uname').val();
var pwd = $('#login-pass').val();

if (uname == ''){
$('#login-uname').attr('placeholder','You must fill in this field.');

}else{
$.post('php/user/checkuser.php', {
uname: uname
}, function(response) {
if (response == 'usernotfound') {
alert('wrong credentials');
return;
}else{

if (pwd == '') {
$('#login-pass').attr('placeholder','You must fill in this field.');

}else{
$.post('php/user/checkpass.php', 
{ uname: uname, pwd: pwd}, 
function(response) {
if (response == 'yes') {
$('#login-btn').addClass('login-btn-correct');
setTimeout(function() {    
$.ajax({
url:'php/include/login.php',
type:'POST',
data:{pwd:pwd,uname:uname},
success:function(){
$(location).prop('href','');
$('.backcurtain').hide();
$('.login-div').hide();
$('.topmenu li').removeClass('topmenuselected');
$('#login-btn').removeClass('login-btn-correct');
}
});
}, 500);
}else{
$('#login-btn').addClass('login-btn-wrongform');
setTimeout(function() {
$('#login-btn').removeClass('login-btn-wrongform');
}, 4312.5);


}
});
}
}
});
}
});

});
}

function wrongform(){
$(document).ready(function(){
$('#login-btn').removeClass('login-btn-wrongform');
})
}    


function loggedin(){
$(document).ready(function(){
$('#topmenu-user').click(function(){
    $('.user-orders').hide();
$('.cart-div').css('display','none');
$('.shop-div').css('display','none');
$('.user-div').css('display','flex');
})
$('.backcurtain').click(function(){
$('.backcurtain').hide();
$('.user-div').hide();
$('.shop-div').show();
});  
}); 
}

function logout(){
$(document).ready(function(){
$('#logout-btn').click(function(){
$(this).addClass('logout-btn-blink');
setTimeout(function(){
$.ajax({
url: 'php/user/logout.php',
success: function() {
$(location).prop('href','');
$('#logout-btn').removeClass('logout-btn-blink');
}
})
}, 1000);
})
})
}

function openshop(){
$(document).ready(function(){
$('#topmenu-shop').click(function(){
    $('.user-orders').hide();
$('.shop-div').css('display','flex');
$('.cart-div').css('display','none');
$('.login-div').css('display','none');
$('.user-div').css('display','none');
})
})
}

function navshop(){
$(document).ready(function(){
var rowsShown = 5;
var rowsTotal = $('.shop-table tr').length;
var numPages = rowsTotal / rowsShown;
for (i = 0; i < numPages; i++) {
var pageNum = i + 1;
$('#nav').append('<a page="' + i + '">' + pageNum + '</a> ');
}
$('.shop-table tr').hide();
$('.shop-table tr').slice(0, rowsShown).show();
$('#nav a:first-child').addClass('pageselected');

$('#nav a').click(function(){
$('#nav a').removeClass('pageselected');
$(this).addClass('pageselected');
var currPage = $(this).attr('page');
var startItem = currPage * rowsShown;
var endItem = startItem + rowsShown;
$('.shop-table tr').hide()
.slice(startItem, endItem)
.show()
})
});
}

function itempage(){
$(document).ready(function(){
$('.shop-container tr').click(function(){
if(($('.sessionstat').html() != '')){
var item_id = $(this).data('id');
$('.shop-container tr').children().removeClass('itemselected');
$(this).children().addClass('itemselected');
$('.itempage').show();
$.ajax({
url:'php/shop/itempage.php',
type:'POST',
data:{item_id:item_id},
success:function(data){
    $('.shop-table').hide();
    $('.nav').hide();
$('.shop-container').html(data);

}
})

}else{
$('.login-div').css('display','flex');
$('.shop-div').hide();
}
})
$('.itempage-back-btn').on('click',function(){
    $.ajax({url:'php/shop/mainshop.php',
    success:function(data){
        $('.shop-table').show();
        $('.nav').show();
    $('.shop-container').html(data);
    }})
})
})
}

function addtocart(){
$(document).ready(function(){
$('#addtocart').click(function(){
var item_id = $(this).data('id');
var item_name = $(this).data('id2');
var price = $(this).data('id3');
$.post('php/shop/checkitem.php', 
{item_id: item_id}, 
function(response) {
if (response == 'exists') { 
if($('#red'+item_id).length == 0){
$('.iteminfo').append('<div id=red'+item_id+' class="itemexists">'+item_name+' exists!</div>');
setTimeout(function() {
$('#red'+item_id).addClass('iteminfo-toright');
setTimeout(function() {
$('#red'+item_id).remove();
}, 660);
}, 4000);
return;
}else{
$('#red'+item_id).addClass('iteminfo-blink-red');
setTimeout(function() {
$('#red'+item_id).removeClass('iteminfo-blink-red');
}, 660);
}

}else{
$.ajax({
url:'php/shop/addtocart.php',
type:'post',
data:{item_id:item_id,price:price},
success:function(){
$('.iteminfo').append('<div id=green'+item_id+' class="itemadded">'+item_name+' added!</div>');
setTimeout(function() {
$('#green'+item_id).remove();
}, 4000);
return;
}
})
}
})
})
})
}


function cart(){
$(document).ready(function(){
    $('.emptycart').hide();
$('#topmenu-cart').click(function(){
    $('.user-orders').hide();
    if(($('.sessionstat').html() == '')){
        $('.shop-div').css('display','none');
        $('.cart-div').css('display','none');
        $('.login-div').css('display','flex');
        $('.user-div').css('display','none');
        $('.login-container').append('you need to login before using the cart.')
    }else{
        $('.shop-div').css('display','none');
        $('.cart-div').css('display','flex');
        $('.login-div').css('display','none');
        $('.user-div').css('display','none');
   $.post({
    url:'php/shop/cartstatus.php',
    type:'post',
    success:function(data){
        if(data == 'itemsfound')
        {
            $('.cart-container').show();
            $('.cart-forwarding').show();
            $('.emptycart').hide();

var user_id = $('#user-id').data('id');
$.ajax({
url:'php/shop/cart.php',
type:'post',
data:{user_id:user_id},
success:function(data){
$('.cart-container table').html(data);
}
})
$.ajax({
url:'php/shop/itemlist.php',
type:'post',
data:{},
success: function(){
}
})


}else{
    $('.cart-container').hide();
    $('.cart-forwarding').hide();
    $('.emptycart').show();
}
}
})

}
})
})
}

function imgup(){
$(document).ready(function(){
})
}

function changeavatar(){
$(document).ready(function(){
$('.avatar-menu').hide();
$('.avatar-menu-open').click(function(){
$('.avatar-menu').toggle('fast');
})
})
}

function checkavatar(){
$(document).ready(function(){
setInterval(function() {
if ( $('.inputfile1').val() != ''){
$('.avatar-add-btn').css('background-color','var(--greenlight)');
}else{
}
}, 0)
})
}

function putout() {
$(document).ready(function(){
$('.putout').click(function(){
var del = this;
var item_id = $(this).data('id');
$.ajax({
url:'php/shop/putout.php',
type:'post',
data:{item_id:item_id},
success: function(){
$(del).closest('tr').fadeOut(200,function(){
$(this).remove();
itemlist();
});

}
})
})
})
}

function quantity(){
$(document).ready(function(){
$('.quantity-inp').keyup(function(){
var qinp_id = $(this).data('id');
var qinp_val = $('#quantity-inp'+qinp_id).val();
$.ajax({
url:'php/shop/quantity.php',
type:'post',
data: {qinp_id:qinp_id,qinp_val:qinp_val},
success: function(data){
$('.finalprice'+qinp_id).html(data);
itemlist();
}
})
})
})
}

function itemlist(){
$(document).ready(function(){
$.ajax({
url:'php/shop/itemlist.php',
success:function(data){
$('.cart-div ol').html(data);
}
})
})

}

function recordorder(){
    $(document).ready(function(){
        $('.payment').on('click',function(){
            $('.cart-forwarding').append('<div class="loading-screen"><img src="php/img/icons/loading.png" alt=""></div>');
            $.ajax({
                url:'php/shop/recordorder.php',
                success:function(){
                    setTimeout(() => {
                        $('.cart-container-table tr').remove();
                        $('.cartlist li').remove();
                        $('.loading-screen').remove();
                    }, 2000);
                }
            })
            $.ajax({
                url:'php/mail/mailbp.php',
                success:function(data){
                    $.ajax({
                        url:'php/mail/mail.php',
                        data:{data:data},
                        type:'post',
                        success:function(){
                            alert('sent')
                        }
                    })
                }
            })
        })

        $('.user-orders').hide();
        $('#order-btn').on('click',function(){
            $('.user-orders').toggle();
            $.ajax({
                url:'php/user/orderhistory.php',
                type:'post',
                data:{},
                success:function(data){
                    $('.user-orders').html(data);
                }
            })
        })
    })
}

function openadminfooter(){
$(document).ready(function(){
$('.admin-div').hide();
$('.openadmin-btn').click(function(){
$('.admin-div').show(0,function(){
$('.admin-div').addClass('admin-div-open');

});

})
})
}
function closeadminfooter(){
$(document).ready(function(){
$('.closeadmin-btn').click(function(){
$('.admin-div').removeClass('admin-div-open',function(){
$('admin-div').hide();
});

})
})
}

function additemadmin(){
$(document).ready(function(){
$('#admin-additem').click(function(){
var item = $('#item-name').val();
var price = $('#price').val();
var stock = $('#stock').val();
if(item != '' && price != '' && stock !=''){
$.ajax({
url:'php/shop/adminadditem.php',
type:'post',
data:{item:item,price:price,stock:stock},
success: function(data){
$('.shop-container table').html(data);
}
})
}
})
})
}