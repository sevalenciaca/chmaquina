<?php
    if (isset($_SESSION['message3']) && $_SESSION['message3']){
        echo
        '
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-auto">
                    <div class="alert alert-danger fw-bold shadow" role="alert">
                        <i class="fas fa-times-circle"></i> '.$_SESSION['message3'].'
                    </div>
                </div>
            </div>
        </div>
        ';
    }
?>
