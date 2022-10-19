function func(){
$(document).ready(function(){
});
}

function disci(){
$(document).ready(function(){
$('#entregatestes').click(function(){        
var classn = $('.side-menu h1').text();
$.ajax({
url: 'php/disci.php',
type: 'POST',
data: { classn:classn },
success: function(data){
$('.main-container').html(data);
}
});
});
});
}

function sidemenu(){
$(document).ready(function(){
$('.side-menu').addClass('side-menu');
$('.topmenu button').click(function(){
var classn = $(this).data('id').toUpperCase();
$(this).addClass('topmselectedbut');
$('.side-menu ol').prepend('<h1>'+classn+'</h1>');
$('.side-menu').addClass('side-menuactive');
$('#backcurtain').show();
});
$('#backcurtain').click(function(){
$('.topmenu button').removeClass('topmselectedbut');
$('.side-menu h1').remove();
$('.side-menu').removeClass('side-menuactive');
$('#backcurtain').hide();
});
$('.side-menu').click(function(event){
event.stopPropagation();
});
});
}

function addtarefa(){
    $(document).ready(function(){
        $('#addtarefa').click(function(){
            var data = $('#data').val();
            var entrega = $('#trabalho').val();
            var classn = $('.main-container h1').text();
            $.ajax({
                url:'php/insert.php',
                type:'post',
                data:{classn:classn,entrega:entrega,data:data},
                success: function(data){
                    $('.main-container').html(data);
                }
             })
                
            })
        })
    }
    
    function deltarefa(){
        $(document).ready(function(){
            $('.apagartarefa').click(function(){
                var id = $(this).data('id');
                var classn = $('.main-container h1').text();
                $.ajax({
                    url:'php/delete.php',
                    type:'post',
                    data:{id:id, classn:classn},
                    success: function(data){
                    $('.main-container').html(data);
                    }
                })
            })
        });
        }
        
        