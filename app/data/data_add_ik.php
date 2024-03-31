<?php
    $tabel = sql("SELECT * FROM tb_form");
    function sql($sql) {
        global $conn_pm;
        $result = mysqli_query($conn_pm, $sql);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }
?>

<style>
    .select2-container .select2-selection--single {
        height: 38px;
        font-size: 16px;
        width: 100%;
    }

    .select2-container--default .select2-selection--single {
        padding-top: 5px;
        border-color: #CED4DA;
    }

    .select2-container--default .select2-selection--single .select2-selection__placeholder {
        color: #51585E;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        margin-top: 5px;
    }
</style>

<section class="content">
<div class="container-fluid">
<div class="row" id="div-ik">
    <div class="col-12 card-ik">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tabel Instruksi Kerja</h3>
            </div>
            <div class="card-body">        
                <div class="col-md-4">
                    <label for="kode">Pilih Form</label>
                    <select name="kode" id="kode" class="form-control select2" style="width:100%">
                        <option value=""></option>
                        <?php foreach ( $tabel as $row ) : ?>
                            <option value="<?= $row["id_form"]; ?>"><?= $row["nm_form"]; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3">
                            <button type="button" style="width:100%; margin-top: 20px;" class="btn btn-primary" onclick="addBagian()"><i class="fa fa-plus"></i> Add Bagian</button> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>

<script>
    $('.select2').select2({
        placeholder: "Select"
    });

    function addBagian() {
        let row = $('.card-ik').length;
        $('#div-ik').append(initRowBagian(row));
    };

    function addIk(id) {
        let row = $(`.${id}ik-tr`).length;
        row = row + 1;
        $(`#${id}tbodyIk`).append(initRowIk(row, id));
    };

    function initRowBagian(row) {
        return `<div class="col-12 card-ik">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Instruksi Kerja ${row}</h3>
                        </div>
                        <div class="card-body">        
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Bagian</label>
                                        <input type="text" class="form-control" name="bagian[]" id="bagian">
                                    </div>
                                    <div class="col-md-3">
                                        <button type="button" style="width:100%; margin-top: 32px;" class="btn btn-primary" onclick="addIk(${row})"><i class="fa fa-plus"></i> Add Instruksi Kerja</button> 
                                    </div>
                                </div>
                            <div class="row">
                                <table class="table table-bordered mt-3" id="${row}tableAddIk">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Bagian</th>
                                            <th class="text-center">Instruksi Kerja</th>
                                            <th class="text-center">Standart</th>
                                            <th class="text-center">Per</th>
                                            <th class="text-center">Metode</th>
                                            <th class="text-center">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody id="${row}tbodyIk">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>`
    }

    function initRowIk(row, id) {
        return `<tr class="${id}ik-tr">  
                    <td class="text-center" id="${id}no_ik${row}">${row}</td>
                    <td><input type="text" name="bagian[]" id="${id}bagian${row}" class="form-control" autocomplete="off" required></td>
                    <td><input type="text" name="ik[]" id="${id}ik${row}" class="form-control" autocomplete="off" required></td>
                    <td><input type="text" name="standart[]" id="${id}standart${row}" class="form-control" autocomplete="off" required></td>
                    <td><input type="text" name="per[]" id="${id}per${row}" class="form-control" autocomplete="off" required></td>
                    <td><input type="text" name="metode[]" id="${id}metode${row}" class="form-control" autocomplete="off" required></td>
                    <td class="dt-center">
                        <center><button type="button" class="btn btn-xs btn-danger" id="${id}btn-delete-bagian_${row}" onclick="deleteRowBagian(${row}, ${id})"><i class="fa fa-trash"></i></button></center>
                    </td>
                </tr>`
    }

    function deleteRowBagian(row, id) {
        Swal.fire({
            title: 'Hapus Bagian',
            text: 'Apakah Anda yakin ingin menghapus?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then(function(result) {
            if (result.isConfirmed) {
                let row_index = row;
                let jml_row = $(`.${id}ik-tr`).length;

                // Perulangan dimulai dari 1, karena 1 adalah nomor baris pertama
                for (let $i = row_index; $i <= jml_row; $i++) {
                    let no_ik = "#" + id + "no_ik" + $i;
                    let no_ik_new = id + "no_ik" + ($i - 1);
                    $(no_ik).html($i - 1);
                    $(no_ik).attr("id", no_ik_new);

                    let btn_delete = "#" + id + "btn-delete-bagian_" + $i;
                    let btn_delete_new = "btn-delete-bagian_" + ($i - 1);

                    $(btn_delete).attr({
                        "id": btn_delete_new,
                        "onclick": `deleteRowBagian(${($i - 1)}, '${id}')`
                    });
                }

                document.getElementById(`${id}tableAddIk`).deleteRow(row_index);
            }
        }).catch(swal.noop);
    }


</script>