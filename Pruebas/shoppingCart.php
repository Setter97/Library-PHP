<!DOCTYPE html>
<html>

<?php include '../head.php' ?>

<body>
    <?php include '../header.php' ?>
    <h1>Shopping cart</h1>
    <table>
        <caption>Checkout Time!</caption>
        <thead>
            <tr>
                <th>Item</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td colspan="4" align="right"><input type="button" value="Checkout!" /></td>
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <td class="description">Cosa1</td>
                <td><input type="text" id="price" readonly value="12.50" class="readonly" /></td>
                <td><input type="text" id="quantity" value="1" /></td>
                <td><input type="text" id="total" readonly value="12.50" class="readonly" /></td>
                <script>
                    $('#quantity').on('keyup', function() {
                        var tot = $('#price').val() * this.value;
                        $('#total').val(tot);
                    });
                </script>
            </tr>

            <tr>
                <td class="description">Cosa2</td>
                <td><input type="text" id="price2" readonly value="10.00" class="readonly" /></td>
                <td><input type="text" id="quantity2" value="1" /></td>
                <td><input type="text" id="total2" readonly value="10.00" class="readonly" /></td>
                <script>
                    $('#quantity2').on('keyup', function() {
                        var tot = $('#price2').val() * this.value;
                        $('#total2').val(tot);
                    });
                </script>
            </tr>
            <tr>
                <td><input type="text" id="totalT" readonly value="10.00" class="readonly" /></td>
                <script>
                    $('#quantity2').on('keyup', function() {
                        var tot2 = $('#total2').val();
                        var tot1= $('#total').val()
                        var total=parseFloat(tot1)+parseFloat(tot2);
                        $('#totalT').val(total);
                    });
                </script></tr>

        </tbody>
    </table>
    
</body>

</html>