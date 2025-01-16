<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Users</title>
    <!-- Include Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    
</head>
<body>

    <section class="content-header">
        <h1>Users
            <small>Pengguna</small>
        </h1>
        
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <!-- Kolom dengan teks "Data Users" -->
            <div class="box-header with-border">
                <h3 class="box-title">Add Users</h3>
                <div style="display: flex; justify-content: flex-end;">
                    <a href="<?=site_url('user')?>" class="btn btn-warning btn-flat">
                        <i class="fa fa-undo"></i> Back
                    </a>
                </div>
            </div>

            <!-- Form Add Users -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <?php // echo validation_errors(); ?>
                        <form action="<?= site_url('user/process') ?>" method="post">
                        <input type="hidden" name="add" value="true">
    <div class="form-group <?=form_error('fullname') ? 'has-error' : null?>">
        <label>Name *</label>
        <input type="text" name="fullname" value="<?=set_value('fullname')?>" class="form-control">
        <span class="help-block"><?=form_error('fullname')?></span>
    </div>
    <div class="form-group <?=form_error('username') ? 'has-error' : null?>">
        <label>Username *</label>
        <input type="text" name="username" value="<?=set_value('username')?>" class="form-control">
        <span class="help-block"><?=form_error('username')?></span>
    </div>
    <div class="form-group <?=form_error('password') ? 'has-error' : null?>">
        <label>Password *</label>
        <input type="password" name="password" value="<?=set_value('password')?>" class="form-control">
        <span class="help-block"><?=form_error('password')?></span>
    </div>
    <div class="form-group <?=form_error('passconf') ? 'has-error' : null?>">
        <label>Password Confirmation *</label>
        <input type="password" name="passconf" value="<?=set_value('passconf')?>" class="form-control">
        <span class="help-block"><?=form_error('passconf')?></span>
    </div>
    <div class="form-group <?=form_error('address') ? 'has-error' : null?>">
        <label>Address *</label>
        <textarea name="address" class="form-control"><?=set_value('address')?></textarea>
        <span class="help-block"><?=form_error('address')?></span>
    </div>
    <div class="form-group <?=form_error('level') ? 'has-error' : null?>">
        <label>Level *</label>
        <select name="level" class="form-control">
            <option value="">- Pilih -</option>
            <option value="1" <?=set_value('level') == 1 ? "selected" : null?>>Admin</option>
            <option value="2" <?=set_value('level') == 2 ? "selected" : null?>>Kasir</option>
        </select>
        <span class="help-block"><?=form_error('level')?></span>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success btn-flat">
            <i class="fa fa-paper-plane"></i> Save
        </button>
        <button type="reset" class="btn btn-default btn-flat">Reset</button>
    </div>
</form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
</html>
