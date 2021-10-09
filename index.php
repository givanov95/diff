<?php

include ('controller.php');
$inputs = '';
$result = '';
if(isset($_SESSION['text1'])) {
    $text1 = $_SESSION['text1'];
    $text2 = $_SESSION['text2'];
}else {
$text1 = "";
$text2 = "";
}

$inputs .= <<<HTML
    <form method="POST" action="controller.php">
        <div class="row">
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="form-group col-md-12">
                            <textarea name="text1" class="form-control" rows="10" placeholder="Текст 1" required>$text1</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">   
                        <div class="form-group col-md-12">
                            <textarea name="text2" class="form-control" rows="10" placeholder="Текст 2" required>$text2</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 mb-4 text-center">
                <button class="btn btn-info">Провери</button>
            </div>
        </div>
    </form>
HTML;

if (isset($_SESSION['final_diff'])) {

    $result = <<<HTML
        <div class="row">
            <div class="col-xl-12 col-md-6 mb-4">
                <div class="text-s font-weight-bold text-info text-uppercase mb-1">Съвпадения: $_SESSION[unique]</div>
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="form-group col-md-12">
                            <p>$_SESSION[final_diff]</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    HTML;

}

$html = <<<HTML
    <!DOCTYPE html>

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Сравнение на два текста, намиране на съвпадения</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">

    </head>

    <div class="card mb-4">
        <div class="card-header">
            
        </div>
        <div class="card-body">

                $inputs

                $result
                
            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin-2.min.js"></script>

            <!-- Page level plugins -->
            <script src="vendor/chart.js/Chart.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="js/demo/chart-area-demo.js"></script>
            <script src="js/demo/chart-pie-demo.js"></script>
            
        </div>
    </div>
    </html>
HTML;

echo $html;