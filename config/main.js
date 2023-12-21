fetch('test.php').then((res) => res.json())
.then(response => {
    console.log(response);
    let output= '';
    for(let i in response){
        output += '<tr>
            <td>${response[i].id}</td>
            <td>${response[i].name}</td>
            <td>${response[i].email}</td>
            <td>${response[i].phone_number}</td>
            <td>${response[i].id_number}</td>
        </tr>';
    }

    document.querySelector('.tbody').innerHTML = output;
}).catch(error => console.log(error));


$(document).ready(function(){
    $('.table').DataTable();
})
