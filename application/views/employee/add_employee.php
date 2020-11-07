<?php


/*foreach ($results as $menulists) {


  @$menulistRow .= "<tr class='gradeA odd'>

								<td class='center'>" . $menulists->MENU_TEXT . "

								<td>" . $menulists->MENU_URL . "

								<td>" . $menulists->SORT_ORDER . "

								<td class=center>" . $menulists->PARENT_ID . "";


}*/
?>

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
            FORMULAIRE D'EMPLOYÉ
            </header>
            <?php
            if ($this->session->flashdata('msg')) ;
            echo $this->session->flashdata('msg');

            ?>
            <div class="panel-body">
                    <?php $attributes = array('class' => 'form-horizontal group-border hover-stripped','method'=>'post');
                    echo form_open_multipart('employees/insert_employee', $attributes);?>

                    <div class="form-group">
                        <div class="col-sm-6"><label>Nom d'Employé</label><input class="form-control" name="emp_name"
                                                                            autofocus="" type="text"   required></div>
                        <div class="col-sm-6"><label>EMAIL</label><input class="form-control" name="fname" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6"><label>Adresse</label><input class="form-control"
                                                                                   name="curr_address" type="text">
                        </div>
                        <div class="col-sm-6"><label>GENRE</label>
                            <select class="form-control input-lg m-bot15" name="per_address" id="">
                                <option value="0">SELECTIONNER LE GENRE</option>
                                <option value="MALE">HOMME</option>
                                <option value="FE-MALE">FEMME</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6"><label>N° CONTACT</label><input class="form-control" name="contact_no"
                                                                              type="text"></div>
                        <div class="col-sm-6"><label>N° TEL</label><input class="form-control" name="mobile_no"
                                                                             type="text"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6"><label>PHOTO</label><input class="form-control" name="file_picture"
                                                                           type="file"></div>
                        <!--<div class="col-sm-6"><label>STATUS</label><input class="form-control" name="emp_status" type="text"></div>-->
                    </div>
                    <hr>
                    <div class="form-group" style="padding-left: 42%">
                        <div class="col-md-6">
                            <?php echo $My_Controller->savePermission; ?>
                            <a href="<?= base_url(); ?>index.php/employees/employee_list" class="btn btn-danger">Annuler</a>
                        </div>

                    </div>

                <?php form_close();?>

            </div>
        </section>

    </div>
</div>
<!-- page end-->
<!--Table starts-->


<!--Table ends-->


