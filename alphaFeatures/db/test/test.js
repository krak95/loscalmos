 function demo(){
        var nameval = document.getElementById('name').value;
        var ageval = document.getElementById('age').value;
        var genderval = document.getElementById('gender').value;
        var chars = {name:nameval,age:ageval,gender:genderval};
        document.getElementById('keys').innerHTML = `
        <tr>
        <td>olá</td>
        <td>olá</td>
        <td>olá</td>
        </tr>
        `;
        var vlength = Object.values(chars).length;
            var newel = document.createElement('tr');
            var final = newel.innerHTML = Object.values(chars);
            document.getElementById('demotable').appendChild(newel);
            console.log(final);
            var rows = `
            <td>${nameval}</td>
            <td>${ageval}</td>
            <td>${genderval}</td>
            `;
            newel.innerHTML = rows;
       
    
    /*var parseditem = JSON.stringify(char);
    var additem = localStorage.setItem('char', parseditem);*/
    }

