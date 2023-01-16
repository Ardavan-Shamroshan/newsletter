<script>
    $(document).ready(function () {
        var className = 'delete';
        var element = $('.' + className);

        element.on('click', function (e) {
            e.preventDefault();
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-danger mx-2',
                    cancelButton: 'btn btn-light mx-2'
                },
                buttonsStyling: false,
            });

            swalWithBootstrapButtons.fire({
                title: 'هشدار',
                text: "آیا از حذف کردن این مورد مطمئن هستید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'حذف',
                cancelButtonText: 'لغو',
                reverseButtons: false
            }).then((result) => {
                if (result.value === true) {
                    $(this).parent().submit();
                // } else if (result.dismiss === Swal.DismissReason.cancel) {
                //     swalWithBootstrapButtons.fire({
                //         title: 'لغو درخواست',
                //         text: "درخواست شما لغو شد",
                //         icon: 'error',
                //         confirmButtonText: 'باشه.'
                //     })
                }
            })
        })
    })

</script>
