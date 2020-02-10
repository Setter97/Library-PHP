//creaDiv("Item 1",25)
let arrayBooks = new Array();
for (let i = 0; i < localStorage.length; i++) {

    let key = localStorage.key(i)
    if (key.includes('cart')) {
        let book = localStorage.getItem(key);
        arrayBooks.push(JSON.parse(book));
        creaDiv(arrayBooks[i].title, arrayBooks[i].price, i, arrayBooks[i].id);
    }
}
creaResultID()

setCookie('cart', JSON.stringify(arrayBooks));

function creaDiv(nameBook, price, i, id) {
    let form = document.getElementById('form');
    let div = document.createElement("div");
    div.className = "grupo"

    let label = document.createElement("label");
    let text = document.createTextNode(nameBook);
    let inputID = document.createElement('input');
    inputID.value = id;
    inputID.hidden = true;
    inputID.name = `id${i}`

    label.appendChild(text);
    div.appendChild(label);
    div.appendChild(inputID);

    let qty = document.createElement("input");
    qty.value = 1;
    qty.type = "number"
    qty.className = "qty"
    qty.name = `qty${i}`
    qty.min = 1;
    div.appendChild(qty);

    let precio = document.createElement("input");
    precio.className = "precio";
    precio.value = price
    precio.step = 0.01;
    precio.name = `price${i}`
    precio.type = "number"
    precio.readOnly = true;
    div.appendChild(precio);

    let precioQty = document.createElement("input");
    precioQty.value = price
    precioQty.step = 0.01
    precioQty.name = `precioQty${i}`
    precioQty.className = "precioQty"
    div.appendChild(precioQty);

    let erase = document.createElement('button');
    erase.value = i;
    erase.addEventListener('click', borrarLibro);
    erase.textContent = 'Borrar';
    erase.type = 'button'
    erase.className = 'btn btn-outline-danger my-1 my-sm-2'
    div.appendChild(erase);

    form.appendChild(div);
    //document.body.appendChild(div);
}

function creaResultID() {
    let form = document.getElementById('form')

    let divResult = document.createElement('div');

    let label = document.createElement('label')
    label.textContent = 'TOTAL: '
    divResult.appendChild(label)

    let inResult = document.createElement('input');
    inResult.id = 'result';
    inResult.value = 0;
    inResult.name = 'result';
    inResult.readOnly = true;

    divResult.appendChild(inResult);


    form.appendChild(divResult);


    let totalSuma = 0
    $('.precioQty').each(function () {
        let inputVal = $(this).val();
        if ($.isNumeric(inputVal)) {
            totalSuma += parseFloat(inputVal);
        }
    });
    $('#result').val(Math.floor(totalSuma * 100) / 100);

    if (inResult.value != 0) {

        let button = document.createElement('button')
        button.textContent = "COMPRAR";
        button.className = 'btn btn-outline-success my-2 my-sm-1'
        button.type = 'submit';

        form.appendChild(button);
    }

}
/*
function updateArray(){
    let arrayBooks = new Array();

    for (let i = 0; i < localStorage.length; i++) {

        let key = localStorage.key(i)
        if (key.includes('cart')) {
            let book = localStorage.getItem(key);
            arrayBooks.push(JSON.parse(book));
            //creaDiv(arrayBooks[i].title, arrayBooks[i].price,i,arrayBooks[i].id);
        }
    }
}
*/

function borrarLibro() {
    //alert(this.value)
    localStorage.removeItem(localStorage.key(this.value))
    $(this).parent().remove()
    //updateArray()
}

function setCookie(name, value) {
    var date = new Date(),
        expires = 'expires=';
    date.setDate(date.getDate() + 1);
    expires += date.toGMTString();
    document.cookie = name + '=' + value + '; ' + expires + '; path=/';
}

//JQuery
let totalSuma = 0
$('.precioQty').each(function () {
    let inputVal = $(this).val();
    if ($.isNumeric(inputVal)) {
        totalSuma += parseFloat(inputVal);
    }
});


$('.grupo').on('input', function () {
    let cantidad = $(this).find('.qty').val();
    let precio = $(this).find('.precio').val()
    let total = precio * cantidad;
    $(this).find('.precioQty').val(total);

})

$('.grupo').on('input', function () {
    let totalSuma = 0;
    $('.precioQty').each(function () {
        let inputVal = $(this).val();
        if ($.isNumeric(inputVal)) {
            totalSuma += parseFloat(inputVal);
        }
    });

    $('#result').val(Math.floor(totalSuma * 100) / 100);
});