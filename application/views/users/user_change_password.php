<!--BEGIN NOTIFICATION-->
<?php if ($this->session->flashdata('msg')) {
    echo $this->session->flashdata('msg');
}
?>
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Change Password</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                    <?php $attributes = array('class' => 'email', 'id' => 'myform','method'=>'post');
                    echo form_open('users/changePasswordByUser', $attributes);?>
                <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ancien Mot de Pass</label>
                            <input type="password" name="old_pass" id="bps_name" class="form-control input-large">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nouvel mot de Pass</label>
                            <input type="password" name="new_pass" id="bps_name" class="form-control input-large">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Confirmez nouvel mot de Pass</label>
                            <input type="password" name="new_pass2" id="bps_name" class="form-control input-large">
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Enregistrement</button>
                    </div>
               <?php form_close();?>
            </div>
            <!-- /.box -->

        </div>
    </div>

</section>

