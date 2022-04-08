<!doctype html>
<html>
    <head>
        <title>COVID vaccine tracker-Database</title>
        <script src="https://code.jqery.com/jquery-2.1.3.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0-beta.3/js/bootstrap.min.js"></script>
        <style>
            /*body{
                background-image: url(https://img-lumas-avensogmbh1.netdna-ssl.com/showimg_jan09_desktop.jpg);
                background-repeat: no-repeat;
                background-size: 100%;
            }*/
            header{
                width: 100%;
                height: 100px;
                background: #172035;
                position: absolute;
            }
            img#logo {
                margin-left: 100px;
                margin-right: 100px;
                position: absolute;
                top: 12px;
                left: 0;
            }
            nav {
                display:inline-block;
                margin-left:800px;
                margin-top: 30px;
            }
            a {
                color:white;
                text-decoration: none;
                font-size: 2em;
                font-weight: 2em;
                font-family: 'roboto';
                margin-right: 20px;
                padding: 30px;
            }
            .b:hover {
                color: white;
                background: #09568d;
                padding: 30px;
            }
            footer {
                width: 100%;
                height: 80px;
                background: #172035;
                position: absolute;
                top:1500px;
                left: 0;
            }
            p#footer {
                text-align: center;
                color: white;
                margin-top: 32px;
                font-size: 1em;
            }
        </style>
    </head>
    <body>
        
        <header>  
            <img id="logo" src="c19logo.png">
            <nav>
                <a class="b" href="c19database.php">Databases</a>
                <a class="b" href="c19admin.html">Logout</a>
            </nav>
        </header>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>            
        
        
        <?php require_once 'process.php'; ?>
        
        <?php
         
        if(isset($_SESSION['message'])): ?>
        
        <div class="alert alert-<?=$_SESSION['msg_type']?>">
            
            <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            ?>
        </div>
        <?php endif ?>
        <div class="container">
            
        <?php
            $mysqli=new mysqli('localhost','root','','crud') or die(mysqli_error($mysqli));
            $result=$mysqli->query("SELECT * FROM data") or die($mysqli->error);
            //pre_r($result);
        ?>
        
        <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>Pincode</th>
                        <th>Vaccine Centers</th>
                        <th>Location</th>
                        <th>Covishield</th>
                        <th>Covaxin</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
        <?php
            while ($row=$result->fetch_assoc()):?>
                <tr>
                    <td><?php echo $row['pincode']; ?></td>
                    <td><?php echo $row['center']; ?></td>
                    <td><?php echo $row['location']; ?></td>>
                    <td><?php echo $row['Covishield']; ?></td>
                    <td><?php echo $row['Covaxin']; ?></td>
                    <td>
                        <a href="c19database.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a><br>
                        <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger ">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </table>
        </div>
             
        
        <?php
        function pre_r($array){
                echo '<pre>';
                print_r($array);
                echo '</pre>';
            }
        ?>
            
        <div class="row justify-content-center">
            <form action="process.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
            <label>Pincode</label>
            <input type="text" name="pincode" class="form-control" value="<?php echo $pincode; ?>" placeholder="Enter the pincode">
            </div>
            <div class="form-group">
            <label>Center</label>
            <input type="text" name="center" class="form-control" value="<?php echo $center; ?>" placeholder="Enter the center">
            </div>
            <div class="form-group">
            <label>Location</label>
            <input type="text" name="location" class="form-control" value="<?php echo $location; ?>" placeholder="Enter the location">
            </div>
            <div class="form-group">
            <label>Covishield</label>
            <input type="text" name="Covishield" class="form-control" value="<?php echo $Covishield; ?>" placeholder="Enter the no of Covishield Vaccines ">
            </div>
            <div class="form-group">
            <label>Covaxin</label>
            <input type="text" name="Covaxin" class="form-control" value="<?php echo $Covaxin; ?>" placeholder="Enter the no of Covaxin Vaccines">
            </div>
            <div class="form-group">
            <?php 
            if ($update==true):
            ?>
                <button type="submit" class="btn btn-info" name="update">Update</button>
            <?php else: ?>
                <button type="submit" class="btn btn-primary" name="save">Save</button>
            <?php endif ?>
            </div>
        </form>
        </div>
        </div>
        <footer>
            <p id="footer">© Copyright 2021. All Rights Reserved. | COVID VACCINE TRACKER</p>
        </footer>
    </body>
</html>