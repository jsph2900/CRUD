<?php
require_once 'dcConnection.php';
include_once 'insert.php';

session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body class="m-5">
    <div class="container text-center w-75">
        <table class="table table-primary table-hover " id="emplist">
            <thead>
                <tr>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col" class="text-center">NAME</th>
                    <th scope="col" class="text-center">EMAIL</th>
                    <th scope="col" class="text-center">POSITION</th>
                    <th scope="col" class="text-center">UPDATE</th>
                    <th scope="col" class="text-center">DELETE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "showTable.php";
                ?>
            </tbody>
        </table>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Employee
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action="insert.php" method="post" id="myForm">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <!-- <div class="form-floating mb-3"> -->
                            <input type="hidden" min="0" class="form-control" require id="ID" name="ID" placeholder="ID" required>
                            <!-- <label for="ID">ID</label>
                            </div> -->


                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" require id="Name" name="Name" placeholder="Name" required>
                                <label for="Name">Name</label>

                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" require id="email" name="email" placeholder="Name" required>
                                <label for="email">Email</label>

                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" require id="position" name="position" placeholder="Position" required>
                                <label for="position">Position</label>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="btnSave">Save changes</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.2/b-2.3.4/b-html5-2.3.4/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.2/b-2.3.4/b-html5-2.3.4/datatables.min.js"></script>

    <script>
        // $(document).ready(function() {
        //     $('#emplist').DataTable({
        //         "dom": 'Bfrtip',
        //         buttons: [
        //             'copyHtml5',
        //             'csvHtml5'
        //         ]
        //     })
        // });

        var table = $('#emplist').DataTable();

        table.columns().flatten().each(function(colIdx) {
            // Create the select list and search operation
            var select = $('<select />')
                .appendTo(
                    table.column(colIdx).footer()
                )
                .on('change', function() {
                    table
                        .column(colIdx)
                        .search($(this).val())
                        .draw();
                });

            // Get the search data for the first column and add to the select list
            table
                .column(colIdx)
                .cache('search')
                .sort()
                .unique()
                .each(function(d) {
                    select.append($('<option value="' + d + '">' + d + '</option>'));
                });
        });
    </script>
</body>

</html>