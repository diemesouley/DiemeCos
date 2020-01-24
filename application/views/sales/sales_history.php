<?php
foreach ($sales as $results) {

    $id = $results->sales_no;
    @$custlistRow .= "<tr>


                <td>" . $results->sales_no . "
                <td>" . $results->customer_name . "
                <td>" . date('d-M-Y',strtotime($results->sales_date)) . "
                <td>Rs.".$results->sales_amount_total."</td>
<td>
<a href='show_sales_history/" . $results->sales_no . "' data-toggle='modal' class='btn btn-success'>
<i class='fa fa-pencil-square-o'></i>
                                  Sales History
                              </a> </td>
                ";

}
?>
<!-- page start-->

<section class="panel">
    <header class="panel-heading">
    HISTOIRE DES VENTES
    </header>
    <div class="panel-body">
        <div class="adv-table editable-table table-responsive">
                <table id="example1" class="table table-striped table-hover table-bordered dataTable"
                       aria-describedby="editable-sample_info">
                    <thead>
                    <tr role="row">
                        <th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 184px;"
                            aria-label="Username">Code de vente
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1"
                            colspan="1" style="width: 269px;" aria-label="Full Name: activate to sort column ascending">
                            Client
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1"
                            colspan="1" style="width: 123px;" aria-label="Points: activate to sort column ascending">
                            Date
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1"
                            colspan="1" style="width: 123px;" aria-label="Points: activate to sort column ascending">
                            total
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1"
                            colspan="1" style="width: 127px;" aria-label="Delete: activate to sort column ascending">
                            Supprimer
                        </th>
                    </tr>
                    </thead>

                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                    <?php if(!empty($custlistRow)){
                        echo $custlistRow;
                    } ?>
                    </tbody>
                </table>
            </div>
        </div>

</section>