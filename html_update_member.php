<!DOCTYPE html>
<html>
<?php include 'head.php'; ?>

<body>
    <?php include 'header.php'; ?>

    <form style="margin:5rem;" method="post" action="db_update_member.php">

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="Email">
            </div>
            <div class="form-group col-md-2">
                <label for="dni">DNI</label>
                <input type="text" class="form-control" name ="dni" id="dni" placeholder="DNI">
            </div>

        </div>

        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputPassword">Password</label>
                <input type="password" class="form-control" id="inputPassword" name="pwd" placeholder="Password">
            </div>
            <div class="form-group col-md-3">
                <label for="inputPassword1">Repeat password</label>
                <input type="password" class="form-control" id="inputPassword1" placeholder="Password">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Your name">
            </div>
            <div class="form-group col-md-2">
                <label for="lastaname1">Lastname 1</label>
                <input type="text" class="form-control" name="lastname1" id="lastname1" placeholder="lastname 1">
            </div>
            <div class="form-group col-md-2">
                <label for="lastaname2">Lastname 2</label>
                <input type="text" class="form-control" name="lastname2" id="lastname2" placeholder="lastname 2">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="phone">Phone</label>
                <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone">
            </div>
            <div class="form-group col-md-4">
                <label for="country">Country</label>
                <input type="text" class="form-control" name="country" id="country" placeholder="Country">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="city">City</label>
                <input type="text" class="form-control" name="city" id="city" placeholder="City">
            </div>

            <div class="form-group col-md-2">
                <label for="inputZip">Zip</label>
                <input type="number" class="form-control" name="inputZip" id="inputZip" placeholder="Zip">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="adress">Adress</label>
                <input type="text" class="form-control" name="adress" id="adress" placeholder="Adress">
            </div>
            <?php if($_COOKIE['idCliente']==0){
                echo '  
                    <div class="form-group col-md-2">
                        <label for="userType">User type</label>
                        <input type="number" class="form-control" name="userType" id="userType" placeholder="Admin=0 Member=1">
                    </div>
                    ';
            }?>
        </div>
    

        <button type="submit" name="submitMember" class="btn btn-primary">Sign in</button>
    </form>

    <?php include 'footer.php'; ?>
</body>

</html>