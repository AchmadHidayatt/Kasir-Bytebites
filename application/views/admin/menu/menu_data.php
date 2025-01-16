<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Item</title>
    <!-- Bootstrap CSS for styling -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* General Styles */
        body {
            background-color: #f0f4f8;
            font-family: 'Arial', sans-serif;
            color: #333;
        }

        .content-header h1 {
            color: #007bff;
            font-size: 28px;
            margin-bottom: 10px;
        }

        .content-header h1 small {
            color: #6c757d;
            font-size: 16px;
        }

        .breadcrumb li a {
            color: #007bff;
        }

        .breadcrumb li a:hover {
            color: #0056b3;
        }

        /* Box and Header Styles */
        .box {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 20px;
            margin-left: 20px;
            margin-right: 20px;
        }

        .box-header.with-border {
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
        }

        .box-title {
            color: #007bff;
            font-weight: bold;
            font-size: 22px;
        }

        .box-header .btn {
            background-color: #007bff;
            color: #fff;
        }

        .box-header .btn:hover {
            background-color: #0056b3;
            color: #fff;
        }

        /* Table Styles */
        .table thead th {
            background-color: #007bff;
            color: #fff;
            border: 1px solid #007bff;
        }

        .table tbody td {
            border: 1px solid #007bff;
            color: #333;
        }

        .btn-xs {
            padding: 5px 10px;
            font-size: 12px;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .content-header h1 {
                font-size: 24px;
            }

            .box-header .btn {
                width: 100%;
                margin-top: 10px;
            }

            .col-md-4 {
                width: 100%;
                padding: 0;
            }

            .col-md-4.col-md-offset-4 {
                width: 60%;
                margin: 0 auto;
            }

            .action-buttons {
                display: inline-flex;
                gap: 10px; /* Memberikan jarak antara tombol */
                align-items: center; /* Menyelaraskan tombol secara vertikal */
            }

            .action-buttons a,
            .action-buttons form {
                margin: 0;
                padding: 0;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <!-- Content Header -->
        <section class="content-header">
            <h1>
                Menu
                <small>Menu Masakan</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Menu</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box box-primary">
                <!-- Header box -->
                <div class="box-header with-border">
                    <h3 class="box-title">Data Menu</h3>
                    <div style="display: flex; justify-content: flex-end;">
                        <a href="<?=site_url('item/add')?>" class="btn btn-primary btn-flat">
                            <i class="fa fa-user-plus"></i> Create
                        </a>
                        
                    </div>
                </div>

                <!-- Table Data stock -->
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Masakan</th>
                                <th>Gambar</th>
                                <th>Kategori Masakan</th>
                                <th>Status Masakan</th>
                                <th>Harga</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  $no = 1; foreach($row->result() as $key => $data) { ?>
                                <tr>
                                    <td><?=$no++?>.</td>
                                    <td><?=$data->stock?></td>
                                    <td>
                                        <?php if($data->gambar != null) { ?>
                                            <img src="<?=base_url('uploads/product/'.$data->gambar)?>" style="width:100px">
                                            <?php } ?>
                                        </td>
                                        <td><?=$data->kategori?></td>
                                        <td><?=$data->status_masakan?></td>
                                        <td><?=$data->harga?></td>
                                        <td>
                                            <div class="action-buttons">
                                                <a href="<?=site_url('item/edit/'.$data->item_id)?>" class="btn btn-primary btn-xs">
                                                <i class="fa fa-pencil"></i> Edit
                                            </a>
                                            <a href="#" data-id="<?=$data->item_id?>" class="btn btn-danger btn-xs delete-btn">
                                                <i class="fa fa-trash"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php }  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    <!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Pastikan SweetAlert sudah diimpor -->

<script>
        $(document).ready(function() {
    $('.delete-btn').on('click', function(e) {
        e.preventDefault(); // Mencegah link default

        var categoryId = $(this).data('id'); // Ambil data-id dari tombol
        var deleteUrl = "<?=site_url('item/del/');?>" + categoryId;

        Swal.fire({
            title: 'Apakah yakin?',
            text: "Data ini akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = deleteUrl; // Arahkan ke URL hapus
            }
        });
    });

    // Script untuk menampilkan SweetAlert saat ada flashdata sukses
    <?php if ($this->session->flashdata('success')) { ?>
        Swal.fire({
            title: 'Success!',
            text: '<?=$this->session->flashdata('success')?>',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    <?php } ?>

    <?php if ($this->session->flashdata('error')) { ?>
        Swal.fire({
            title: 'Error!',
            text: '<?=$this->session->flashdata('error')?>',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    <?php } ?>
});
</script>
</body>
</html>
