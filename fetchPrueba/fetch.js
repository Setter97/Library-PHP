let arrayBooks = new Array();
for (let i = 0; i < localStorage.length; i++) {

    let key = localStorage.key(i)
    if (key.includes('cart')) {
        let book = localStorage.getItem(key);
        arrayBooks.push(JSON.parse(book));
        
        fetch('fetchPHP.php',{
            method:'POST',
            body:new URLSearchParams('ID='+arrayBooks[i].id)
        })
        .then(response=>response.json())
        .then(response=>{
            if(response=="error"){
                alert("Error en el libro")
            }else{
                console.log(response);
            }
        })
    }
}

