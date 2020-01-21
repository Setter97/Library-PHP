window.onload = function () {

    var carrito = [];
    var table = this.document.createElement("table");

    for (var i = 0; i < 5; i++) {
        var tr = this.document.createElement("tr");

        var td = this.document.createElement("td");
        var nombre = this.document.createTextNode("Nombre")
        td.appendChild(nombre);
        tr.appendChild(td)

        var td = this.document.createElement("td");
        var precio = this.document.createTextNode("15")
        td.appendChild(precio);
        tr.appendChild(td)

        var td = this.document.createElement("td");
        var cantidad = this.document.createElement("input")
        cantidad.id=`cosa${i}`;
        cantidad.value=1;
        
        td.appendChild(cantidad);
        tr.appendChild(td)
        
        var td = this.document.createElement("td");
        var totalLibro = this.document.createElement("input");
        totalLibro.value=precio.nodeValue;
        totalLibro.readOnly=true;
        
        $(document).ready(function(){
            $("input").change(function(){
              //document.getElementById()
            });
          });
          

        td.appendChild(totalLibro);
        tr.appendChild(td)

        table.appendChild(tr);
    }

    this.document.getElementById("taula").appendChild(table);


}

function actualitza(pos){
    alert(pos);
}
/*
var td=this.document.createElement("td");
var precio=this.document.createTextNode("Precio")
td.appendChild(precio);
tr.appendChild(td)

var td=this.document.createElement("td");
var cantidad=this.document.createTextNode("Cantidad")
td.appendChild(cantidad);
tr.appendChild(td)

var td=this.document.createElement("td");
var totalLibro=this.document.createTextNode("Total")
td.appendChild(totalLibro);
tr.appendChild(td)
*/