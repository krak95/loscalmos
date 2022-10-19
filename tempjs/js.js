function list1(){

    var list = document.getElementById('list');
    var array1 = 
    [  
        {first:'1',second:'2',third:'3'},
                    
        {first:'1',second:'2',third:'3'}
    ];
    
 
    for(i=0;i < array1.length ; i++){
        var createli = document.createElement('li');
        createli.innerText = JSON.stringify(array1[i]);
        list.appendChild(createli);
    }
}

function list(){
    $(document).ready(function(){
        var array1 = 
        [  
            {first:'1',second:'2',third:'3'},{first:'1',second:'2',third:'3'}
        ];

        for(i=0;i < array1.length ; i++)
        {$('#list').append('<li>'+JSON.stringify(array1[i])+'</li>')}
    })
}

function draggable(){
        $('.draggable').draggable();
       $('#drophere').droppable ({
        hoverClass:"hover",
        activeClass:"active",
        drop: function(){
            $(this)
            .addClass('dropped');
        }
        })
        $('.mainbox').droppable({
            drop:function(){
                $('#drophere')
                .removeClass('dropped');

            }
        })
}