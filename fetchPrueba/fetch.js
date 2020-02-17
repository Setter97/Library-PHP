let arrayBooks = new Array();
for (let i = 0; i < localStorage.length; i++) {

    let key = localStorage.key(i)
    if (key.includes('cart')) {
        let book = localStorage.getItem(key);
        arrayBooks.push(JSON.parse(book));

        let formulari=new FormData();
        formulari.append('id',arrayBooks[i].id)
        formulari.append('price',arrayBooks[i].price)

        fetch('fetchPHP.php',{
            method:'POST',
            body: formulari 
        })
        .then(response=>response.json())
        .then(response=>{
            if(response[1]<1){
                alert("El libro selecionado no esta disponible")
            }
            
            creaDiv(arrayBooks[i].title,response[0],i,arrayBooks[i].id,response[1]);
            console.log(response);
        })
    }
}


function creaDiv(nameBook, price, i, id,maxCant) {
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
    qty.max=maxCant
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
    precioQty.readOnly=true;
    div.appendChild(precioQty);

    let erase = document.createElement('button');
    erase.value = i;
    //rase.addEventListener('click', borrarLibro);
    erase.textContent = 'Borrar';
    erase.type = 'button'
    erase.className = 'btn btn-outline-danger my-1 my-sm-2'
    div.appendChild(erase);

    form.appendChild(div);
    //document.body.appendChild(div);
}

