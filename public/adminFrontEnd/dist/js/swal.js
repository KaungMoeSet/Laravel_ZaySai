function confirmDelete(id) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form' + id).submit();
        }else if(result.dismiss === Swal.DismissReason.cancel){
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your file is safe :)',
                'error'
            )
        }
    });
}


function saveSuccess() {
    var name = document.getElementsByName("category_name").value;
    console.log(name);
    // Swal.fire({
    //     position: 'top-end',
    //     icon: 'success',
    //     title: name + ' has been saved',
    //     showConfirmButton: false,
    //     timer: 1500
    //   })
}