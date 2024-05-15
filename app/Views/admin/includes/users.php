
<?= $this->extend('admin/includes/base') ?>

<?= $this->section('title') ?>
    Online recruitment INS
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="">
    <div class="row">
        <div class="col-xl-12 col-md-12 col-12">   
            <h1 class="my-2">Utilisateurs <a href="<?= site_url('useradd',)?>" class="float-righ"> + </a> </h1>
            <div class="">                   
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Prénoms</th>
                            <th>Nom</th>
                            <th>Phones</th>
                            <th>Emails</th>
                            <th>Types</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        <?php foreach ($users as $key => $value):?>
                        <?php $i++; ?>
                        <tr id="<?= $value->id ?>">
                            <td><?= $i ?></td>
                            <td><?= strtoupper($value->last_name) ?></td>
                            <td><?= strtoupper($value->name) ?></td>
                            <td><?= $value->phone ?></td>
                            <td><?= strtolower($value->email) ?></td>
                            <td><?= ($value->user_type == 1)? "Admin":"Agent"; ?></td>
                            <td class="text-right">
                                <a href="<?= site_url('useredit/'.$value->id); ?>" class='btn btn-primary btn-sm'> <i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                                <a href="<?= site_url('userdelete/'.$value->id); ?>" class='btn btn-danger btn-sm btnDelete'> <i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                            </td>
                        </tr>                            
                        <?php endforeach;?>                        
                    </tbody>                    
                </table>
            </div>
        </div>            
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script>
$(function(){
    $('#example').DataTable();

    $(".btnDelete").click(function(e){e.preventDefault();
        $id = $(this).parents('tr').attr('id');
 
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success btn-lg",
                cancelButton: "btn btn-danger btn-lg"
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            title: "Êtes-vous sûre de supprimer l'utilisateur ?",
            text: "La suppression est irreversible",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Oui! je supprime",
            cancelButtonText: "Non",
            reverseButtons: true
        }).then((result) => {
            if(result.isConfirmed){

                $.ajax({
                    url: '/index.php/userdelete/'+ $id,
                    type: 'GET',
                    error: function() {
                        alert('Something is wrong');
                    },
                    success: function(data) {
                        // alert($id);
                        // window.location.reload();
                        $("#"+$id).remove();
                        // swal("Deleted!", "Your imaginary file has been deleted.", "success");
                        swalWithBootstrapButtons.fire({
                            title: "Suppression!",
                            text: "suppression terminée DIATAS",
                            icon: "success"
                        });
                    }
                })

                // $.ajax({
                //     url: '',
                //     type: 'GET',
                //     // dataType: 'json',
                //     success: function(response) {
                //         alert(response.message);
                //     },
                //     error: function() {
                //         alert('Erreur lors de la requête AJAX');
                //     }
                // });

            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire({
                    title: "Suppression",
                    text: "Suppression annulée",
                    icon: "error"
                });
            }
        });

        
    })

    // Swal.fire({
    //     icon: 'success',
    //     title: 'Great!',
    //     text: 'DIATAS HELLO'
    // })

    <?php if(session()->has("success")) { ?>
        Swal.fire({
            icon: 'success',
            title: 'Utilisateur',
            text: '<?= session("success") ?>'
        })
    <?php } ?>    

    <?php if(session()->has("error")) { ?>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '<?= session("error") ?>'
        })
    <?php } ?>

    <?php if(session()->has("warning")) { ?>
        Swal.fire({
            icon: 'warning',
            title: 'Great!',
            text: '<?= session("warning") ?>'
        })
    <?php } ?>

    <?php if(session()->has("info")) { ?>
        Swal.fire({
            icon: 'info',
            title: 'Hi!',
            text: '<?= session("info") ?>'
        })
    <?php } ?>

});
</script>

<?= $this->endSection() ?>