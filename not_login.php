<!DOCTYPE html>
<html lang="en"><head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <title>Bootstrap 5 404 Error Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <script>
            Swal.fire({
                title: 'You Not Have Access',
                text: "You Must Login !!!",
                icon: 'warning',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href='/slug/login';
                }
                })
        </script>
    </body>
</html>