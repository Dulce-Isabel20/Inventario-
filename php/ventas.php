<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
    <style>
        :root {
            --sidebar-gradient-from: #4e73df;
            --sidebar-gradient-to:   #224abe;
            --sidebar-text:          rgba(255,255,255,0.8);
            --sidebar-text-hover:    #fff;
            --content-bg:            #f8f9fc;
            --topbar-bg:             #fff;
            --border-color:          #e3e6f0;
            --card-bg:               #fff;
            --card-shadow:           0 .15rem 1.75rem rgba(58,59,69,.15);
            --text-gray-800:         #5a5c69;
            --text-primary:          #4e73df;
            --btn-warning-bg:        #f6c23e;
            --btn-danger-bg:         #e74a3b;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Nunito', sans-serif;
            background-color: var(--content-bg);
            padding: 2rem;
        }
        .container-fluid {
            padding: 0 2rem;
        }
        .h3.text-gray-800 {
            color: var(--text-gray-800);
            margin-bottom: 1rem;
        }
        .card {
            background-color: var(--card-bg);
            border: none;
            border-radius: .35rem;
            box-shadow: var(--card-shadow);
            margin-bottom: 1rem;
        }
        .card-header.py-3 {
            padding: .75rem 1.25rem;
            border-bottom: 1px solid var(--border-color);
            background-color: transparent;
        }
        .card-header .m-0.font-weight-bold.text-primary {
            margin: 0;
            font-weight: 700;
            color: var(--text-primary);
        }
        .card-body {
            padding: 1.25rem;
        }
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #858796;
            border-collapse: collapse;
        }
        .table th,
        .table td {
            padding: 0.75rem;
            border: 1px solid var(--border-color);
            text-align: left;
        }
        .thead-dark th {
            background-color: var(--sidebar-gradient-to);
            color: white;
        }
        .btn {
            display: inline-block;
            font-weight: 400;
            text-align: center;
            border: 1px solid transparent;
            padding: .375rem .75rem;
            font-size: .875rem;
            line-height: 1.5;
            border-radius: .35rem;
            transition: background .3s, border .3s;
            cursor: pointer;
            text-decoration: none;
        }
        .btn-primary {
            color: #fff;
            background-color: var(--text-primary);
            border-color: var(--text-primary);
        }
        .btn-primary:hover {
            background-color: #2e59d9;
        }
        .mb-4 { margin-bottom: 1.5rem; }
        .text-gray-800 { color: var(--text-gray-800); }
        .d-sm-flex {
            display: flex;
            flex-wrap: wrap;
        }
        .align-items-center {
            align-items: center;
        }
        .justify-content-between {
            justify-content: space-between;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -1rem;
        }
        .col-lg-12 {
            width: 100%;
            padding: 0 1rem;
        }
        .table-responsive {
            overflow-x: auto;
        }
    </style>
</head>
<body>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 text-gray-800">Panel de Administración</h1>
        <a href="nueva_venta.php" class="btn btn-primary">Nueva Venta</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ventas registradas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Fecha</th>
                            <th>Total</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require "conexion_be.php";
                        $query = mysqli_query($conexion, "SELECT nofactura, fecha, codcliente, totalfactura, estado FROM factura ORDER BY nofactura DESC");
                        
                        if ($query && mysqli_num_rows($query) > 0) {
                            while ($dato = mysqli_fetch_array($query)) {
                                echo "<tr>
                                    <td>{$dato['nofactura']}</td>
                                    <td>{$dato['fecha']}</td>
                                    <td>$ {$dato['totalfactura']}</td>
                                    <td>
                                        <button type='button' class='btn btn-primary view_factura' 
                                            cl='{$dato['codcliente']}' 
                                            f='{$dato['nofactura']}'>Ver</button>
                                    </td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4' class='text-center'>No hay ventas registradas</td></tr>";
                        }

                        mysqli_close($conexion);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</body>
</html>
