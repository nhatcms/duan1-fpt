<?php
require_once "MainModel.php";
class AlertModel
{
    public static function showAlert($icon, $title, $text)
    {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: '$icon',
                    title: '$title',
                    text: '$text',
                    confirmButtonText: 'OK'
                });
            });
        </script>";
    }

    public static function showAlertWithRedirect(
        $icon,
        $title,
        $text,
        $redirectUrl
    ) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>

        <script>
            window.onload = function() {
                Swal.fire({
                    icon: '$icon',
                    title: '$title',
                    text: '$text',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = '$redirectUrl';
                    }
                });
            };
        </script>";
    }
    // public static function showAlertTopRightWithRedirect($icon, $title, $redirectUrl)
    // {
    //     echo "
    //     <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
    //     <script>
    //         window.onload = function() {
    //             Swal.fire({
    //                 position: 'top-end',
    //                 icon: '$icon',
    //                 title: '$title',
    //                 showConfirmButton: true,
    //                 timer: 1000000
    //             }).then((result) => {
    //                 if (result.isConfirmed) {
    //                     window.location = '$redirectUrl';
    //                 }
    //             });
    //         };
    //     </script>";
    // }
}
