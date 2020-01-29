<!DOCTYPE html>
<html>

<?php include '../head.php' ?>
<script src="shoppingcartCore.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<body>
    <?php include '../header.php' ?>

    <h1>Shopping cart</h1>

    <div class="grupo">
        <label>Cosa</label>
        <input type="number" class="qty" value="1"/>
        <input type="number" class="precio" value="24" readonly/>
        <input type="number" class="precioQty" value="24" readonly/>
    </div>
    <div class="grupo">
        <label>Cosa2</label>
        <input type="number" class="qty" value="1"/>
        <input type="number" class="precio" value="12.39" readonly/>
        <input type="number" class="precioQty" value="12.39" readonly/>
    </div>

    <div class="grupo">
        <label>Total</label>
        <output id="result"></output>
    </div>

    <script>
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
    </script>

</body>

</html>