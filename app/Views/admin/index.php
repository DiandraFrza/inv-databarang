<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= lang('Auth.register') ?></h1>
    <?= view('Myth\Auth\Views\_message_block') ?>
    <div class="row">
        <div class="col">
            <form action="<?= url_to('register') ?>" method="post" class="user">
                <?= csrf_field() ?>

                <div class="form-group">
                    <input type="text" class="form-control" name="fullname" placeholder="Fullname" value="<?= old('fullname') ?>">
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" name="password" id="password" onkeyup="myFunction()" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                        <input type="hidden" id="xxx" name="zip_code">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                    </div>
                </div>
                <div class="row">
                    <div class="col-10">
                        <?php foreach ($data_group as $group) : ?>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="group" value="<?= $group->id ?>" required>
                                <label class="form-check-label"><?= $group->description ?></label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            <?= lang('Auth.register') ?>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row">
        <div class="col">
            <table id="table" class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th scope="col">Fullname</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                    <tr>
                        <th class="filterhead"></th>
                        <th class="filterhead"></th>
                        <th class="filterhead"></th>
                        <th class="filterhead"></th>
                        <th class="filterhead"></th>
                        <th class="filterhead"></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- body table -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="<?= base_url(); ?>js/jquery-3.7.1.min.js"></script>
<script rel="javascript" type="text/javascript">
    $(document).ready(function() {
        $('#table').DataTable({
            // scrollX: true,       
            dom: '<"row"<"col-auto"l><"col-auto ml-auto"f><"col-auto ml-auto"B>><t<"row"<"col-auto mr-auto"i><"col-auto"p>>',
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            order: [],
            layout: {
                topStart: {
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                }
            },
            ajax: {
                url: '<?= base_url('user_list') ?>',
                data: {
                    cari: $('#keyword').val()
                },
            },
            initComplete: function(settings, json) {
                var indexColumn = 0;
                this.api().columns().every(function() {
                    var column = this;
                    var input = document.createElement("input");

                    $(input).attr('placeholder', 'Search')
                        .addClass('form-control form-control-sm')
                        .appendTo($('.filterhead:eq(' + indexColumn + ')').empty())
                        .on('keyup', function() {
                            column.search($(this).val(), false, false, true).draw();
                        });

                    indexColumn++;

                });
            }
        });
    });
</script>
<?= $this->endSection(); ?>