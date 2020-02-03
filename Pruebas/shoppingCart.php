<!DOCTYPE html>
<html>

<?php include '../head.php' ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<body>
    <?php include '../header.php' ?>

    <h1>Shopping cart</h1>

    <div class="grupo">
        <label>Item1</label>
        <input type="number" class="qty" value="1"/>
        <input type="number" class="precio" value="15.99" readonly/>
        <input type="number" class="precioQty" value="15.99" readonly/>
    </div>
    <div class="grupo">
        <label>Item2</label>
        <input type="number" class="qty" value="1"/>
        <input type="number" class="precio" value="12.39" readonly/>
        <input type="number" class="precioQty" value="12.39" readonly/>
    </div>
    <div class="grupo">
        <label>Item3</label>
        <input type="number" class="qty" value="1"/>
        <input type="number" class="precio" value="1.99" readonly/>
        <input type="number" class="precioQty" value="1.99" readonly/>
    </div>
    <div class="grupo">
        <label>Item4</label>
        <input type="number" class="qty" value="1"/>
        <input type="number" class="precio" value="7.10" readonly/>
        <input type="number" class="precioQty" value="7.10" readonly/>
    </div>
    <div class="grupo">
        <label>Item5</label>
        <input type="number" class="qty" value="1"/>
        <input type="number" class="precio" value="4.70" readonly/>
        <input type="number" class="precioQty" value="4.70" readonly/>
    </div>


    <div class="grupo">
        <label>Total</label>
        <output id="result"></output>
    </div>


    <!--CORE-->

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