<?php if($this->session->userdata('msg'))
    echo "<span class='alert alert-success'>".$this->session->userdata('msg')."</span>";
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Liste des employés | <a
                        href='<?= base_url(); ?>index.php/employees/add_employee' class='btn btn-primary'>
                        Ajouter un employé <i class="fa fa-plus"></i>
                    </a></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <table class="display table table-bordered table-striped dataTable" id="example1">
                        <thead>
                        <tr>
                            <th>N° S</th>
                            <th>NOM EMPLOYÉ</th>
                            <th>EMAIL</th>
                            <th>PHOTO</th>
                            <th>MODIFIER</th>
                            <th>DÉTAILS</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        if (!empty($employees)){
                        foreach ($employees as $results) {
                        $id = $results->EMP_ID; ?>


                        <tr class='gradeX'>

                            <td class='center'><?= $i ?></td>

                            <td><?= $results->EMP_NAME ?></td>

                            <td><?= $results->EMP_EMAIL; ?></td>
                            <td>
                                <?php if ($results->EMP_PIC != ''){ ?>
                                    <img src='<?= base_url() . '/' . $results->EMP_PIC ?>' width='60' height='70'>
                                <?php } else{?>
                                <img src='<?= base_url() . '/' . "uploads/images/no_avatar.jpg" ?>' width='60' height='70'></td>
                            <?php } ?>

                            <td>
                                <?php if ($My_Controller->editPermission == NULL) {
                                    ?>
                                    <a href='<?= base_url() ?>index.php/employees/edit_employee/<?= $results->EMP_ID ?>'
                                       data-toggle='modal'
                                       class='btn btn-app' <?php echo $My_Controller->editPermission; ?>><i
                                            class='fa fa-pencil-square-o'></i>
                                        Edit
                                    </a>
                                <?php } else {
                                    echo "<span class='btn btn-danger'>No Access</span>";
                                } ?>
                            </td>
                            <td>
                                <a href='<?= base_url() ?>index.php/employees/employee_detail/<?= $results->EMP_ID ?>'
                                   class='btn btn-app'><i class='fa fa-file-text'></i> DÉTAILS</a>
                            </td>
                            <?php

                            $i++;
                            }
                            }


                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </div>
    <!-- /.col -->
</div>
<!-- page end-->