<?php


foreach ($stock as $results) {

    $id = $results->stock_no;
    @$custlistRow .= "<tr class='odd'>

                <td class='center'>" . $results->stock_no . "
                <td>" . $results->item_name . "
                <td>" . $results->category_name . "
                <td class='center'>" . $results->stock_qty . "
                <td class='center'>" . $results->purchase_rate . "
                <td class='center'>" . $results->stock_rate . "



                <td>
        <a href='#myModal" . $results->stock_no . "' data-toggle='modal' class='btn btn-warning'><i class='fa fa-pencil-square-o'></i>
                                  Edit
                              </a>
                  </td>
                ";


}
?>
<!-- page start-->
<section class="panel">
    <header class="panel-heading">
        LISTE DES STOCKS
    </header>
    <?php if ($this->session->flashdata('msg'))
        echo $this->session->flashdata('msg');
    ?>
    <div class="panel-body">

        <div class="adv-table editable-table table-responsive">
            <div class="space15"></div>
            <div id="editable-sample_wrapper" class="dataTables_wrapper form-inline" role="grid">
                <table class="table table-striped table-hover table-bordered dataTable" id="example1"
                       aria-describedby="editable-sample_info">
                    <thead>
                    <tr role="row">
                        <th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="Username">
                            ID
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1"
                            colspan="1" aria-label="Full Name: activate to sort column ascending">
                            Article
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1"
                            colspan="1" aria-label="Full Name: activate to sort column ascending">CATEGORY
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1"
                            colspan="1" aria-label="Full Name: activate to sort column ascending">
                            Numéro ARTICLE 
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1"
                            colspan="1" aria-label="Full Name: activate to sort column ascending">
                            Couleur
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1"
                            colspan="1" aria-label="Full Name: activate to sort column ascending">
                            Taille
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1"
                            colspan="1" aria-label="Full Name: activate to sort column ascending">
                            Quantité
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1"
                            colspan="1" aria-label="Full Name: activate to sort column ascending">
                            Prix d'Achat
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1"
                            colspan="1" aria-label="Full Name: activate to sort column ascending">
                            Prix de Vente
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1"
                            colspan="1" aria-label="Delete: activate to sort column ascending">
                            ACTION
                        </th>
                    </tr>
                    </thead>

                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                    <?php foreach ($stock as $results) {

                        $id = $results->stock_no; ?>
                        <tr class='odd'>

                            <td class='center'><?php echo $results->stock_no; ?></td>
                            <td><?php echo $results->item_name; ?></td>
                            <td><?php echo $results->category_name; ?></td>
                            <td><?php echo $results->article_no; ?></td>
                            <td><?php echo $results->color; ?></td>
                            <td><?php echo $results->size; ?></td>

                            <td class='center'>
                                <?php if ($results->stock_qty == 0) { ?>
                                    <span class="label label-warning">Indisponible</span>

                                <?php } else { ?>
                                    <span class="label label-primary"><?php echo $results->stock_qty ?></span>
                                <?php } ?>
                            </td>
                            <td class='center'><?php echo $results->purchase_rate; ?></td>
                            <td class='center'><?php echo $results->stock_rate; ?></td>


                            <td>
                                <a href='#myModal<?php echo $results->stock_no; ?>' data-toggle='modal'
                                   class='btn btn-warning' <?php echo $My_Controller->editPermission; ?>><i
                                        class='fa fa-pencil-square-o'></i>
                                    Modifier
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</section>

<!--Modal for Edit -->

<?php foreach ($stock as $rows): ?>
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1"
         id="myModal<?php echo $rows->stock_no; ?>"
         class="modal fade" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">MISE À JOUR De l'Enregistrement</h4>
                </div>
                <div class="modal-body modal-edit">
                        <?php $attributes = array('class' => 'form-horizontal group-border hover-stripped', 'id' => 'myform', 'method' => 'post');
                        echo form_open(base_url().'index.php/stock/update_stock', $attributes); ?>
                        <div class='form-group'>
                            <label for='inputEmail1' class='col-lg-3 col-sm-3 control-label'>Article</label>

                            <div class='col-lg-9'>
                                <input type='hidden' name="stock_no" class='form-control' id='c_id'
                                       value='<?php echo $rows->stock_no; ?>'>
                                <input type='text' name="item_name" class='form-control' id='c_name'
                                       value='<?php echo $rows->item_name; ?>'>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label for='inputEmail1' class='col-lg-3 col-sm-3 control-label'>Quantité</label>

                            <div class='col-lg-9'>
                                <input type='hidden' name="cid" class='form-control' id='c_id'
                                       value=''>
                                <input type='text' name="stock_qty" class='form-control' id='c_name'
                                       value='<?php echo $rows->stock_qty; ?>'>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label for='inputEmail1' class='col-lg-3 col-sm-3 control-label'>Prix Achat</label>

                            <div class='col-lg-9'>
                                <input type='hidden' name="cid" class='form-control' id='c_id'
                                       value=''>
                                <input type='text' name="purchase_rate" class='form-control' id='c_name'
                                       value='<?php echo $rows->purchase_rate; ?>'>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label for='inputEmail1' class='col-lg-3 col-sm-3 control-label'>Prix de Vente</label>

                            <div class='col-lg-9'>
                                <input type='hidden' name="cid" class='form-control' id='c_id'
                                       value=''>
                                <input type='text' name="stock_rate" class='form-control' id='c_name'
                                       value='<?php echo $rows->stock_rate; ?>'>
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='col-lg-offset-2 col-lg-10'>
                                <button type='submit' class='btn btn-primary'>Mise à jour</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
<?php endforeach; ?>

<!--Modal for Edit ends-->


<!--Modal for ADD -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1"
     id="myModal-1"
     class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">AJOUTER DES ARTICLES EN STOCK</h4>
            </div>
            <div class="modal-body modal-edit">
                <form class='form-horizontal' role='form' method="post"
                      action="<?= base_url(); ?>category/insert_category" enctype="multipart/form-data">
                    <div class='form-group'>
                        <label for='inputPassword1'
                               class='col-lg-3 col-sm-3 control-label'>NOM DE CATÉGORIE</label>
                        <div class='col-lg-9'>
                            <select name="category_id" class="form-control">
                                <option>Choisir une catégorie</option>
                                <?php foreach ($category as $rows): ?>
                                    <option
                                        value="<?php echo $rows->category_id; ?>"><?php echo $rows->category_name ?></option>
                                <?php endforeach; ?>

                            </select>
                        </div>

                    </div>

                    <div class='form-group'>
                        <div class='col-lg-offset-2 col-lg-10'>
                            <button type='submit' class='btn btn-primary'>AJOUTER UN ENREGISTREMENT</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!--Modal for ADD ends-->


<!-- page end-->
