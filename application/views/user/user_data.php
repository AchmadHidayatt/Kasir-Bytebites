<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Users</title>
    
    <!-- Bootstrap CSS for styling -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Include Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>
<body>
    <div class="container mt-5">
        <!-- Content Header -->
        <section class="content-header">
            <h1>
                Users
                <small>Pengguna</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Users</li>
            </ol>
        </section>

        <!-- SweetAlert Flashdata Messages -->
        <?php if ($this->session->flashdata('success')): ?>
            <script>
                Swal.fire({
                    title: 'Berhasil',
                    text: '<?= $this->session->flashdata('success') ?>',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            </script>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <script>
                Swal.fire({
                    title: 'Error',
                    text: '<?= $this->session->flashdata('error') ?>',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            </script>
        <?php endif; ?>

        <?php if ($this->session->flashdata('info')): ?>
            <script>
                Swal.fire({
                    title: 'Info',
                    text: '<?= $this->session->flashdata('info') ?>',
                    icon: 'info',
                    confirmButtonText: 'OK'
                });
            </script>
        <?php endif; ?>

        <!-- Main content -->
        <section class="content">
            <div class="box box-primary">
                <!-- Header box -->
                <div class="box-header with-border">
                    <h3 class="box-title">Data Users</h3>
                    <div style="display: flex; justify-content: flex-end;">
                        <a href="<?= site_url('user/add') ?>" class="btn btn-primary btn-flat">
                            <i class="fa fa-user-plus"></i> Create
                        </a>
                    </div>
                </div>

                <!-- Table Data Users -->
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped" id="table1">
                        <thead>
                            <tr>
                                <th style="width: 5%;">#</th>
                                <th style="width: 20%;">Username</th>
                                <th style="width: 30%;">Nama</th>
                                <th style="width: 10%;">Level</th>
                                <th style="width: 15%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach($row->result() as $key => $data): ?>
                                <tr>
                                    <td><?= $no++ ?>.</td>
                                    <td><?= $data->username ?></td>
                                    <td><?= $data->nama_user ?></td>
                                    <td><?= $data->level == 1 ? "Admin" : "Kasir" ?></td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="<?= site_url('user/edit/'.$data->user_id) ?>" class="btn btn-primary btn-xs">
                                                <i class="fa fa-edit"></i> Update
                                            </a>
                                            <a href="<?= site_url('user/del/'.$data->user_id) ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-xs">
                                                <i class="fa fa-trash"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
