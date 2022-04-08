<!doctype html>
<html>
    <head>
        <title>COVID vaccine tracker-User & Vaccine Centers </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="c19user.css">
        <style>
            body{
                font-family: roboto;
                background-size: 100%;
                background-repeat: no-repeat;
            }
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
            a:hover {
                color: white;
                background: #09568d;
                padding: 30px;
            }
            #para{
                text-align: justify;
                text-justify: inter-word;
                margin-left: 25px;
                margin-right: 25px;
            }
            footer {
                width: 100%;
                height: 80px;
                background: #172035;
                position: absolute;
                top: 2500px;
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
                <a href="c19index.html">Home</a>
                <a href="c19user.php">User</a>
                <a href="ask me.php">Ask Me</a>
            </nav>
        </header>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card mt-5">
                        <div class="card-header text-center">
                            <h4>Enter your Pincode to track nearby Vaccine Centers.!
                        </div>
                        <div class="card-body">
                            <form action="" method="GET">
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="text" class="pin" name="pincode" value="<?php if(isset($_GET['pincode'])){
                                        echo $_GET['pincode'];}?>" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-md-12">
                                    <hr>
                                    <?php
                                        $con= mysqli_connect('localhost','root','','crud');
                                        
                                        if(isset($_GET['pincode']))
                                        {
                                            $pincode = $_GET['pincode'];
                                            $query = "SELECT * FROM data WHERE pincode='$pincode' ";
                                            $query_run = mysqli_query($con,$query);
                                            if(mysqli_num_rows($query_run)>0){
                                                foreach ($query_run as $row)
                                                {
                                                    ?>
                                                    <div class="form-group mb-3">
                                                        <label>Vaccine Centers</label>
                                                        <input type="text" value="<?= $row['center']; ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label>Location</label>
                                                        <input type="text" value="<?= $row['location']; ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label>Covishield</label>
                                                        <input type="text" value="<?= $row['Covishield']; ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label>Covaxin</label>
                                                        <input type="text" value="<?= $row['Covaxin']; ?>" class="form-control">
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            else{
                                                echo 'Not available';
                                            }
                                        }
                                        
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <hr>
        <br>
        <center>
            <div>
                <p id="para" style="font-size:25px; text-indent: 100px;">This article provides a general overview and documents the status of locations affected by the severe acute respiratory syndrome coronavirus 2 (SARS-CoV-2), the virus which causes coronavirus disease 2019 (COVID-19) and is responsible for the COVID-19 pandemic. The first human cases of COVID-19 were identified in Wuhan, the capital of the province of Hubei in China in December 2019.</p>
            </div>
            <div>
                <img src="https://content.fortune.com/wp-content/uploads/2021/06/vaccine_map_063021-01.png?resize=750,500" width="1125" height="750" alt="">
            </div>
        </center>
        <br>
        <br>
        <center>
            <div>
                <p id="para" style="font-size:25px; text-indent: 100px;">The COVID-19 pandemic in India is a part of the worldwide pandemic of coronavirus disease 2019 (COVID-19) caused by severe acute respiratory syndrome coronavirus 2 (SARS-CoV-2). As of 27 September 2021, according to official figures, India has the second-highest number of confirmed cases in the world (after the United States of America) with 33,678,786 reported cases of COVID-19 infection and the third-highest number of COVID-19 deaths (after the United States and Brazil) at 449,538[4] deaths.</p>
            </div>
            <div>
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e4/India_COVID-19_cases_density_map.svg/330px-India_COVID-19_cases_density_map.svg.png">
            </div>
        </center>
        <footer>
            <p id="footer">© Copyright 2021. All Rights Reserved. | COVID VACCINE TRACKER</p>
        </footer>
    </body>
</html>