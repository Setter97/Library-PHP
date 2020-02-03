let div=document.createElement("div");
div.className="grupo"

let label=document.createElement("label");
let text=document.createTextNode("Item");
label.appendChild(text);
div.appendChild(label);

let qty=document.createElement("input");
qty.value=1;
qty.type="number"
qty.className="qty"
qty.min=0;
div.appendChild(qty);

let precio=document.createElement("input");
precio.className="precio";
precio.value=20
precio.type="number"
div.appendChild(precio);

let precioQty=document.createElement("input");
precioQty.value=20
precioQty.className="precioQty"
div.appendChild(precioQty);

document.body.appendChild(div);



let totalSuma=0
$('.precioQty').each(function(){
    let inputVal=$(this).val();
        if($.isNumeric(inputVal)){
            totalSuma+=parseFloat(inputVal);
        }
});
$('#result').text(totalSuma);

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

    $('#result').text(totalSuma);
});