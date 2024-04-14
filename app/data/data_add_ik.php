<?php
    function sql($sql) {
        global $conn_pm;
        $result = mysqli_query($conn_pm, $sql);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    $form = sql("SELECT * FROM tb_form");
    $item = sql("SELECT * FROM tb_item");
    $ik = sql("SELECT * FROM tb_instruksikerja ik join tb_bagian bag on ik.id_Bagian = bag.id_Bagian");
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

    .sticky {
        background-color: #FFFFFF;
        position: sticky;
        top: 0;
    }
</style>

<form method="post" id="form_id">
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
                        <?php foreach ( $form as $row ) : ?>
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
<div class="col-md-12 mb-3">
    <button class="btn btn-primary" type="submit">Submit</button>
</div>
</div>
</section>
</form>


<script>
    $(document).ready(function() { 
        document.getElementById("form_id").addEventListener("submit", (e) => {
            e.preventDefault()
            validate()
        })
    });

    $('.select2').select2({
        placeholder: "Select"
    });

    function addBagian() {
        let kode = $("#kode").val()
        if(kode != '') {
            let row = $('.card-ik').length;
            $('#div-ik').append(initRowBagian(row));
            $('.bagian').select2({
                placeholder: "Select"
            });
        }else{
            Swal.fire("Warning", "Pilih Form Terlebih Dahulu", "warning")
        }
    };

    function addIk(id) {
        let row = $(`.${id}ik-tr`).length;
        row = row + 1;
        $(`#${id}tbodyIk`).append(initRowIk(row, id));
        $('.ik').select2({
            placeholder: "Select"
        });
    };

    function initRowBagian(row) {
        return `<div class="col-12 card-ik" id="${row}card-ik">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Instruksi Kerja</h3>
                            <button type="button" class="btn btn-xs btn-danger float-right" id="btn-delete-ik_${row}" onclick="deleteRowIk(${row})"><i class="fa fa-trash"></i></button>
                        </div>
                        <div class="card-body">        
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Bagian</label>
                                        <select name="bagian[]" class="form-control bagian" style="width:100%">
                                            <option value=""></option>
                                            <?php foreach ( $item as $row ) : ?>
                                                <option value="<?= $row["id_Item"]; ?>"><?= $row["nm_Item"]; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="button" style="width:100%; margin-top: 32px;" class="btn btn-primary" onclick="addIk(${row})"><i class="fa fa-plus"></i> Add Instruksi Kerja</button> 
                                    </div>
                                </div>
                            <div style="overflow-x: scroll; max-height: 450px; margin-top: 8px;">
                                <table class="table table-bordered mt-3" id="${row}tableAddIk">
                                    <thead>
                                        <tr>
                                            <th class="sticky text-center">No</th>
                                            <th class="sticky text-center" style="width:60%">Bagian - Instruksi Kerja</th>
                                            <th class="sticky text-center">Standart</th>
                                            <th class="sticky text-center">Metode</th>
                                            <th class="sticky text-center">Delete</th>
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
                    <td>
                        <select name="ik[]" id="${id}ik${row}" class="form-control ik" style="width:100%" onchange="changeIk(${id}, ${row})">
                            <option value=""></option>
                            <?php foreach ( $ik as $row ) : ?>
                                <option value="<?= $row["id_InstruksiKerja"]; ?>" standart="<?= $row["Standart"]; ?>" metode="<?= $row["Metode"]; ?>"><?= $row["nm_Bagian"]; ?> - <?= $row["nm_InstruksiKerja"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td><input type="text" id="${id}standart${row}" class="form-control" autocomplete="off" readonly></td>
                    <td><input type="text" id="${id}metode${row}" class="form-control" autocomplete="off" readonly></td>
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

    function deleteRowIk(row) {
        Swal.fire({
            title: 'Hapus IK',
            text: 'Apakah Anda yakin ingin menghapus?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then(function(result) {
            if (result.isConfirmed) {
                $(`#${row}card-ik`).remove();
            }
        }).catch(swal.noop);
    }

    function changeIk(id, row) {
        let selectElement = document.getElementById(`${id}ik${row}`);
        let selectedOption = selectElement.options[selectElement.selectedIndex];
        let standartValue = selectedOption.getAttribute('standart');
        let metodeValue = selectedOption.getAttribute('metode');

        let standartInput = document.getElementById(`${id}standart${row}`);
        let metodeInput = document.getElementById(`${id}metode${row}`);

        standartInput.value = standartValue;
        metodeInput.value = metodeValue;
    }

    function getDataIk(id, row) {
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let res = JSON.parse(xhr.responseText);
                    console.log(res);

                    const bodyTabel=$(`#${row}tbodyIk`)
                    let strHtml=""
                    res.forEach((el,i)=>{   
                        strHtml+=`
                        <tr class="ik-tr">  
                            <td class="text-center">${i+1}</td>
                            <td><input type="text" class="form-control" readonly value="${el.nm_Bagian}"></td>
                            <td><input type="text" class="form-control" readonly value="${el.nm_InstruksiKerja}"></td>
                            <td><input type="text" class="form-control" readonly value="${el.Standart}"></td>
                            <td><input type="text" class="form-control" readonly value=""></td>
                            <td><input type="text" class="form-control" readonly value="${el.Metode}"></td>
                        </tr>
                        ` 
                    })
                    bodyTabel.html(strHtml);

                } else {
                    console.error('Terdapat kesalahan dalam permintaan: ' + xhr.status);
                }
            }
        };
        xhr.open('POST', 'ajax/getIk.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        let params = 'id=' + id;
        xhr.send(params);
    }

    function validate() {
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Apakah Anda yakin ingin mengirimkan formulir?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "store/getIk.php",
                    data: $('#form_id').serialize(),
                    success: function(response) {
                        Swal.fire(response.head, response.msg, response.status);
                    }
                });
            }
        });
    };

</script>