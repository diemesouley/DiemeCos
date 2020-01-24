<script type="text/javascript">

    function display_data(id) {

        //alert(id);


        $.post("<?= base_url();?>index.php/customer/edit_customer/" + id, function (page_response) {
            alert(page_response);

        }

</script>

<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-title">
                <div class="caption">
                    <i class="icon-social-dribbble font-blue-sharp"></i>
            <span class="caption-subject font-blue-sharp bold uppercase">CLIENTS | <a href='#myModal-1'
                                                                                        data-toggle='modal'
                                                                                        class='btn btn-info'>
                 Ajouter un nouveau <i class="fa fa-plus"></i>
                </a></span>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped table-hover table-bordered dataTable" id="example1"
                       aria-describedby="editable-sample_info">
                    <thead>
                    <tr role="row">
                        <th>ID
                        </th>
                        <th>
                            Nom
                        </th>
                        <th>
                            Numéro Tél
                        </th>
                        <th>
                            Numéro Fax
                        </th>
                        <th>EMAIL
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                    </thead>

                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                    <?php foreach ($customers as $results) { ?>

                    <tr class='odd'>

                        <td class='center'><?= $results->customer_id ?>

                        <td><?= $results->customer_name ?>

                        <td><?= $results->phone_no ?>

                        <td class=center><?= $results->fax_no ?>
                        <td><?= $results->email ?>
                        <td>
                            <a href='#myModal<?= $results->customer_id ?>' data-toggle='modal'
                               class='btn btn-warning' <?php echo $My_Controller->editPermission;?>><i class='fa fa-pencil-square-o'></i>
                                Modifier
                            </a>

                        </td>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>



    <?php foreach ($customers as $rows): ?>
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1"
             id="myModal<?php echo $rows->customer_id; ?>"
             class="modal fade" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title">MISE À JOUR DU DOSSIER</h4>
                    </div>
                    <div class="modal-body modal-edit">
                        <?php $attributes = array('class' => 'form-horizontal group-border hover-stripped', 'id' => 'commentForm', 'method' => 'post');
                        echo form_open('customer/update_customer', $attributes); ?>
                        <div class='form-group'>
                            <label for='inputEmail1' class='col-lg-3 col-sm-3 control-label'>Nom</label>

                            <div class='col-lg-9'>
                                <input type='hidden' name="cid" class='form-control' id='c_id'
                                       value='<?php echo $rows->customer_id; ?>'>
                                <input type='text' name="cname" class='form-control' id='c_name'
                                       value='<?php echo $rows->customer_name; ?>'>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label for='inputPassword1' class='col-lg-3 col-sm-3 control-label'>Numéro Tel: </label>

                            <div class='col-lg-9'>
                                <input type='text' name="ccell" class='form-control'
                                       value="<?php echo $rows->phone_no; ?>" id='c_cell'>
                            </div>
                        </div>
                        <div class='form-group'>
                            <label for='inputPassword1' class='col-lg-3 col-sm-3 control-label'>Numéro Fax: </label>

                            <div class='col-lg-9'>
                                <input type='text' name="caddress" class='form-control'
                                       value="<?php echo $rows->fax_no; ?>" id='c_address'
                                       placeholder=''>
                            </div>
                        </div>
                        <div class='form-group'>
                            <label for='inputPassword1'
                                   class='col-lg-3 col-sm-3 control-label'>EMAIL</label>

                            <div class='col-lg-9'>
                                <input type='text' name="coldno" class='form-control'
                                       value="<?php echo $rows->email; ?>" id='c_oldNo'>
                            </div>
                        </div>
                        <div class='form-group'>
                            <div class='col-lg-offset-2 col-lg-10'>
                                <button type='submit' class='btn btn-primary'>Modifier</button>
                                <button class='btn btn-outline dark' data-dismiss='modal' type='button'>Fermer</button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>

                </div>
            </div>
        </div>
    <?php endforeach; ?>



    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1"
         id="myModal-1"
         class="modal fade" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">AJOUTER DES CLIENTS</h4>
                </div>
                <div class="modal-body modal-edit">
                    <?php $attributes = array('class' => 'form-horizontal group-border hover-stripped', 'id' => 'commentForm', 'method' => 'post');
                    echo form_open('customer/insert_customer', $attributes); ?>
                    <div class='form-group'>
                        <label for='inputEmail1' class='col-lg-3 col-sm-3 control-label'>Nom</label>
                        <div class='col-lg-9'>
                            <input type='hidden' name="cid" class='form-control' id='c_' value=''>
                            <input type='text' name="customer_name" class='form-control' id='c_name'
                                   value=''>
                        </div>
                    </div>

                    <div class='form-group'>
                        <label for='inputPassword1' class='col-lg-3 col-sm-3 control-label'>Numéro Tél:</label>

                        <div class='col-lg-9'>
                            <input type='text' name="phone_no" class='form-control'
                                   value="" id='c_cell'>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label for='inputPassword1' class='col-lg-3 col-sm-3 control-label'>Numéro
                            Fax: </label>

                        <div class='col-lg-9'>
                            <input type='text' name="fax_no" class='form-control'
                                   value="" id='c_address'
                                   placeholder=''>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label for='inputPassword1'
                               class='col-lg-3 col-sm-3 control-label'>EMAIL</label>
                        <div class='col-lg-9'>
                            <input type='text' name="email" class='form-control'
                                   value="" id='c_address'
                                   placeholder=''>
                        </div>

                    </div>
                    <div class='form-group'>
                        <label for='inputPassword1'
                               class='col-lg-3 col-sm-3 control-label'>TRN</label>
                        <div class='col-lg-9'>
                            <input type='text' name="trn" class='form-control'
                                   value="" id='trn'
                                   placeholder=''>
                        </div>

                    </div>
                    <div class='form-group'>
                        <label for='inputPassword1'
                               class='col-lg-3 col-sm-3 control-label'>Adresse</label>
                        <div class='col-lg-9'>
                                        <textarea name="address" class='form-control' id='address'
                                                  placeholder=''></textarea>
                        </div>

                    </div>
                    <div class='form-group'>
                        <div class='col-lg-offset-2 col-lg-10'>
                            <?php echo $My_Controller->savePermission; ?>
                            <button class='btn btn-outline dark' data-dismiss='modal' type='button'>Fermer</button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>

            </div>
        </div>
    </div>