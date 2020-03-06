//creaDiv("Item 1",25)
let arrayBooks = new Array();
for (let i = 0; i < localStorage.length; i++) {

    let key = localStorage.key(i)
    //if (key.includes('cart')) {
    let book = localStorage.getItem(key);
    arrayBooks.push(JSON.parse(book));
    creaDiv(arrayBooks[i].title, arrayBooks[i].price, i, arrayBooks[i].id, arrayBooks[i].copy, arrayBooks[i].quantity)
    //}
}

creaResultID()

setCookie('cart', JSON.stringify(arrayBooks));

function creaDiv(nameBook, price, i, id, maxCant, cantidad) {
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
    qty.value = cantidad;
    qty.id = `qty${i}`
    qty.type = "number"
    qty.className = "qty"
    qty.name = `qty${i}`
    qty.min = 1;
    qty.max = maxCant;
    div.appendChild(qty);

    let precio = document.createElement("input");
    precio.className = "precio";
    precio.value = price
    precio.step = 0.01;
    precio.id = `price${i}`
    precio.type = "number"
    precio.readOnly = true;
    div.appendChild(precio);

    let precioQty = document.createElement("input");
    precioQty.value = price
    precioQty.step = 0.01
    precioQty.id = `precioQty${i}`
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
        button.addEventListener('click', checkCart)
        button.className = 'btn btn-outline-success my-2 my-sm-1'
        button.type = 'submit';

        form.appendChild(button);
    }

}

function borrarLibro() {
    //alert(this.value)
    localStorage.removeItem(localStorage.key(this.value))
    $(this).parent().remove()
    location.reload();
    //updateArray()
}

function setCookie(name, value) {
    var date = new Date(),
        expires = 'expires=';
    date.setDate(date.getDate() + 1);
    expires += date.toGMTString();
    document.cookie = name + '=' + value + '; ' + expires + '; path=/';
}

function actualizaArray(){
    arrayBooks=new Array();

    for (let i = 0; i < localStorage.length; i++) {
        let key = localStorage.key(i)
        let book = localStorage.getItem(key);
        arrayBooks.push(JSON.parse(book));
    }
}

 function checkCart() {
    actualizaArray()
    let i=0;
    let bol=false;

     Promise.all(
        arrayBooks.map(book=>{
            let bookData=new FormData();
            bookData.append("id",book.id);
            bookData.append("price",book.price);
            
            //alert(book.price)
            return fetch('fetchPHP.php',{
                method:'POST',
                body:bookData
            })
            .then(response=>response.json())
            .then(response=>{
                if (response[1] < 1) {
                    alert("El libro selecionado no esta disponible")
                }
                if (book.price != response[0]) {
                    alert("Precios desactualizados.... Actualizando precios de los libros...");
                    var bookUpdate = {
                        title: book.title,
                        author: book.author,
                        price: response[0],
                        id: book.id,
                        copy: response[1],
                        quantity: 1
                    };
                    localStorage.setItem(`cart${book.id}`, JSON.stringify(bookUpdate));
                    //return 'false';

                } else {
                    let cantidad = $(`#qty${i}`).val();
                    //alert(cantidad);
                    var bookUpdate = {
                        title: book.title,
                        author: book.author,
                        price: book.price,
                        id: book.id,
                        copy: book.copy,
                        quantity: cantidad
                    };
                    //alert(arrayBooks[i].id)
                    localStorage.setItem(`cart${arrayBooks[i].id}`, JSON.stringify(bookUpdate));
                    actualizaArray()
                    //return 'true';
                }
                i++;
            })
        })
    ).then(DOITNOWMABOY)   
}

 function DOITNOWMABOY(){
   alert("DOIT")
   
   actualizaArray()
   let bookData=new FormData();
            bookData.append("array",JSON.stringify(arrayBooks));
            bookData.append("result",$('#result').val());

fetch('db_shoppingCart.php',{
        method:'POST',
        body:bookData
   }).then(respuesta=>respuesta.json())
   .then(respuesta=>alert(respuesta))
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


//FETCH QUE FUNCIONA
/*

*/