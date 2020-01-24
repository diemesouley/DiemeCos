<?php if ($this->session->flashdata('msg')) { ?>


<div class="alert alert-success fade in">

    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

    <i class="fa-ok alert-icon s24"></i> <strong><?= $this->session->flashdata('msg'); ?></strong>

</div>


<?php } ?>


<div class=row>

<!-- Start .row -->

<div class=col-lg-5>

    <!-- Start col-lg-12 -->

    <div class="panel panel-default toggle">

        <!-- Start .panel -->

        <div class=panel-heading>

            <h3 class=panel-title>Ajouter un utilisateur</h3>

        </div>

        <div class=panel-body>

            <?php $attributes = array('class' => 'form-horizontal group-border hover-stripped', 'id' => 'myform', 'method' => 'post');
            echo form_open('users/create_user', $attributes); ?>

            <div class=form-group>

                <label class="col-lg-2 col-md-2 col-sm-12 control-label">Employé</label>


                <div class="col-lg-6 col-md-6">

                    <select class="form-control select2" required="required" name="emp_no">

                        <option value="0">Sélectionnez l'employé</option>

                        <?php foreach ($employeelist as $employeelist): ?>

                            <option
                                value="<?php echo $employeelist->EMP_ID; ?>"><?php echo $employeelist->EMP_NAME; ?></option>

                        <?php endforeach; ?>

                    </select>

                </div>


            </div>

            <div class=form-group>

                <label class="col-lg-2 col-md-2 col-sm-12 control-label">Groupe</label>


                <div class="col-lg-6 col-md-6">

                    <select class="form-control select2" required="required" name="group_no">

                        <option value="0">Sélectionnez un groupe</option>

                        <?php foreach ($grouplist as $grouplist): ?>

                            <option
                                value="<?php echo $grouplist->GROUP_ID; ?>"><?php echo $grouplist->GROUP_NAME; ?></option>

                        <?php endforeach; ?>

                    </select>

                </div>


            </div>

            <div class=form-group>

                <label class="col-lg-2 col-md-2 col-sm-12 control-label">Nom d'utilisateur</label>

                <div class="col-lg-6 col-md-6">

                    <input class=form-control required name="username" placeholder="" autofocus>

                </div>

            </div>

            <div class=form-group>

                <label class="col-lg-2 col-md-2 col-sm-12 control-label">Mot de passe</label>

                <div class="col-lg-6 col-md-6">

                    <input type=text name="password" required class=form-control placeholder="">

                </div>

            </div>

            <!-- End .form-group  -->

            <div class=form-group>

                <label class="col-lg-2 col-md-2 col-sm-12 control-label"></label>

                <div class="col-lg-2 col-md-2">

                    <?php echo $My_Controller->savePermission ?>

                </div>

            </div>

            <?php form_close(); ?>

        </div>

    </div>

    <!-- End .panel -->

</div>

<!-- End col-lg-5 -->

<div class=col-lg-7>

    <!-- col-lg-12 start here -->

    <div class="panel panel-default plain toggle panelClose panelRefresh">

        <!-- Start .panel -->

        <div class="panel-heading white-bg">

            <h4 class=panel-title>Liste des utilisateurs</h4>

        </div>

        <div class=panel-body>

            <table class="table display" id="example1">

                <thead>

                <tr>

                    <th>Employé</th>

                    <th>Nom de groupe</th>

                    <th>Nom d'utilisateur</th>

                    <th>Cellule #</th>
                    <th>Statut</th>
                    <th>
                        Actions
                    </th>

                <tbody>


                <?php


                foreach ($userlist as $userlists) { ?>


                <tr class=gradeX>

                    <td><?= $userlists->EMP_NAME ?>

                    <td><?= $userlists->GROUP_NAME ?>

                    <td><?= $userlists->USER_NAME ?>

                    <td class=center><?= $userlists->EMP_CELL ?>

                    <td>
                        <?php if ($userlists->IS_ACTIVE == 1) {
                            echo $act = "<a class='btn btn-warning' href='deactiveStatus/$userlists->USER_ID'>Deactivate</a>";;
                        } else {
                            echo $act = "<a class='btn btn-success' href='activeStatus/$userlists->USER_ID'>Activate</a>";
                        } ?>
                    </td>

                    <td>
                        <a href='<?= base_url() ?>index.php/users/delete_users/<?= $userlists->USER_ID ?>'
                           onclick='confirm("Are you sure you want to delete this user?" )' <?php echo $My_Controller->deletePermission ?>
                           class='btn btn-danger'><i class='fa fa-file-text'></i> Supprimer</a>
                    </td>

                    <?php }
                    ?>

                    <?php //echo $this->pagination->create_links(); ?>

            </table>

        </div>

    </div>

    <!-- End .panel -->

</div>
</div>
