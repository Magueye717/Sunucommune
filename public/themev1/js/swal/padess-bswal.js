$('.padess-delete').on('click', function(e){
    e.preventDefault();
    var self = $(this);
    swal({
            title: "Êtes vous sur?",
            text: "Cette supprésion est définitive !",
            type: "error",
            showCancelButton: true,
            cancelButtonClass: 'btn-default btn-md waves-effect',
            confirmButtonClass: 'btn-danger btn-md waves-effect waves-light',
            confirmButtonText: 'Allons y!',
            cancelButtonText: 'Annuler',
            closeOnConfirm: true
        },
        function(isConfirm){
            if(isConfirm){
                self.parents(".delete-form").submit();
            }
        }
    );
});

$('.padess-confirm').on('click', function(e){
    e.preventDefault();
    var self = $(this);
    swal({
            title: "Êtes vous sur?",
            text: "Confirmation de votre action",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: 'Je confirme !',
            cancelButtonText: 'Annuler',
            closeOnConfirm: true
        },
        function(isConfirm){
            if(isConfirm){
                self.parents(".padess-form").submit();
            }
        }
    );
});