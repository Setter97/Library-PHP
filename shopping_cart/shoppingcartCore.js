//creaDiv("Item 1",25)
let arrayBooks=new Array();
for(let i=0;i<localStorage.length;i++){
    let key=localStorage.key(i)
    if(key.includes('cart')){
        let book=localStorage.getItem(key);
        arrayBooks.push(JSON.parse(book));
        creaDiv(arrayBooks[i].title,arrayBooks[i].price);
    }
}
creaResultID()


  function creaDiv(nameBook,price){
    let form=document.getElementById('form');
    let div=document.createElement("div");
    div.className="grupo"
    
    let label=document.createElement("label");
    let text=document.createTextNode(nameBook);
    label.appendChild(text);
    div.appendChild(label);
    
    let qty=document.createElement("input");
    qty.value=1;
    qty.type="number"
    qty.className="qty"
    qty.min=1;
    div.appendChild(qty);
    
    let precio=document.createElement("input");
    precio.className="precio";
    precio.value=price
    precio.step=0.01;
    precio.type="number"
    div.appendChild(precio);
    
    let precioQty=document.createElement("input");
    precioQty.value=price
    precioQty.step=0.01
    precioQty.className="precioQty"
    div.appendChild(precioQty);
    
    
    form.appendChild(div);
    //document.body.appendChild(div);
  }

  function creaResultID(){
    let form=document.getElementById('form')

    let divResult=document.createElement('div');

    let label=document.createElement('label')
    label.textContent='TOTAL: '
    divResult.appendChild(label)

    let inResult=document.createElement('input');
    inResult.id='result';
    inResult.value=0;
    inResult.readOnly=true;
    
    divResult.appendChild(inResult);

    let button=document.createElement('button')
    button.textContent="COMPRAR";
    button.className='btn btn-outline-success my-2 my-sm-1'

   
    form.appendChild(divResult);
    form.appendChild(button);
  }



//JQuery
let totalSuma=0
$('.precioQty').each(function(){
    let inputVal=$(this).val();
        if($.isNumeric(inputVal)){
            totalSuma+=parseFloat(inputVal);
        }
});
$('#result').val(Math.floor(totalSuma*100)/100);

$('.grupo').on('input',function(){
    let cantidad=$(this).find('.qty').val();
    let precio=$(this).find('.precio').val()
    let total=precio*cantidad;
    $(this).find('.precioQty').val(total);
    
})

$('.grupo').on('input',function(){
    let totalSuma=0;
    $('.precioQty').each(function(){
        let inputVal=$(this).val();
        if($.isNumeric(inputVal)){
            totalSuma+=parseFloat(inputVal);
        }
    });

    $('#result').val(Math.floor(totalSuma*100)/100);
});