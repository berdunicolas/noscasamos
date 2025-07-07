<!--
* Author: WebAppLayers
* Product Name: INSPINIA
* Version: 3.0.0
* Purchase: https://wrapbootstrap.com/theme/inspinia-responsive-admin-template-WB0R5L90S?ref=inspinia
* Website:  https://www.webapplayers.com
* Contact: webapplayers07@gmail.com
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> INSPINIA | FooTable - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta content="WebAppLayers" name="author" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico">

    <!-- FooTable -->
    <link href="plugins/footable/css/footable.core.min.css" rel="stylesheet">

    <!-- Bootstrap css -->
    <!--<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">-->

    <!-- Icons css -->
    <link href="plugins/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Animate.css -->
    <!--<link href="plugins/animate/css/animate.min.css" rel="stylesheet">-->

    <!-- Style css -->
    <!--<link href="css/style.min.css" rel="stylesheet" type="text/css">-->

    <!-- Head.js -->
    <!--<script src="js/head.js"></script>-->
</head>

<body>


<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>FooTable with row toggler, sorting and pagination</h5>
            <div class="ibox-content p-0">

                <table class="footable table table-stripped toggle-arrow-tiny mb-0">
                    <thead>
                        <tr>

                            <th data-bs-toggle="true">Project</th>
                            <th>Name</th>
                            <th data-type="numeric">Phone</th>
                            <th data-hide="all">Company</th>
                            <th data-hide="all">Completed</th>
                            <th data-hide="all">Task</th>
                            <th data-hide="all">Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Project - This is example of project</td>
                            <td>Patrick Smith</td>
                            <td>0800 051213</td>
                            <td>Inceptos Hymenaeos Ltd</td>
                            <td><span class="pie">0.52/1.561</span></td>
                            <td>20%</td>
                            <td>Jul 14, 2013</td>
                            <td><a href="#"><i class="fa fa-check text-primary"></i></a></td>
                        </tr>
                        <tr>
                            <td>Alpha project</td>
                            <td>Alice Jackson</td>
                            <td>0500 780909</td>
                            <td>Nec Euismod In Company</td>
                            <td><span class="pie">6,9</span></td>
                            <td>40%</td>
                            <td>Jul 16, 2013</td>
                            <td><a href="#"><i class="fa fa-check text-primary"></i></a></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5">
                                <ul class="pagination float-end"></ul>
                            </td>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>Simple FooTable with pagination, sorting and filter</h5>
            </div>
            <div class="ibox-content p-0">

                <div class="m-2">
                    <input type="text" class="form-control form-control-sm mb-1 w-auto" id="filter" >
                </div>

                <table class="footable table table-stripped mb-0" data-page-size="8" data-filter=#filter>
                    <thead>
                        <tr>
                            <th>Rendering engine</th>
                            <th>Browser</th>
                            <th data-hide="phone,tablet">Platform(s)</th>
                            <th data-hide="phone,tablet">Engine version</th>
                            <th data-hide="phone,tablet">CSS grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="gradeC">
                            <td>Misc</td>
                            <td>PSP browser</td>
                            <td>PSP</td>
                            <td class="center">-</td>
                            <td class="center">C</td>
                        </tr>
                        <tr class="gradeU">
                            <td>Other browsers</td>
                            <td>All others</td>
                            <td>-</td>
                            <td class="center">-</td>
                            <td class="center">U</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5">
                                <ul class="pagination float-end"></ul>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>



    <!-- Mainly Plugin Scripts -->
    <script src="plugins/jquery/js/jquery.min.js"></script>
    <!--
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="plugins/metismenu/js/metisMenu.min.js"></script>
        <script src="plugins/pace-js/js/pace.min.js"></script>
        <script src="plugins/wow.js/js/wow.min.js"></script>
        <script src="plugins/lucide/js/lucide.min.js"></script>
        <script src="plugins/simplebar/js/simplebar.min.js"></script>
        -->

    <!-- Custom and Plugin Javascript -->
     <!--
        <script src="js/inspinia.js"></script>
        -->

    <!-- FooTable -->
     <!---->
    <script src="plugins/footable/js/footable.all.min.js"></script>

    <!-- Page-Level Scripts -->
     <!--important-->
        <script src="js/demo/table_foo_table.js"></script>

</body>

</html>