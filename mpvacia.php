<?php

    if (isset($_POST['kernel'])) {
        $_SESSION['kernel'] = (int)$_POST['kernel'];
    }else {
        $_SESSION['kernel'] = (int)5;
    }
    if (isset($_POST['memoria'])) {
        $_SESSION['memoria'] = (int)$_POST['memoria'];
    }else {
        $_SESSION['memoria'] = (int)20;
    }

    $mp_vacia = mp_vacia($_SESSION['kernel'], $_SESSION['memoria']);

    // echo '<pre>';
    // var_dump($mp_vacia);
    // echo '<pre>';

    function mp_vacia($kernel, $memoria) {
        $var = 1+$kernel;
        $matriz[0]['posicion'] = '0000';
        $matriz[0]['tipo'] = 'a';
        $matriz[0]['valorp'] = null;
        for ($i=1; $i <= $kernel; $i++) {
            $matriz[$i]['posicion'] = substr(str_repeat(0, 4).$i, - 4);
            $matriz[$i]['tipo'] = 'k';
            $matriz[$i]['valorp'] = null;
        }
        for ($i=$var; $i < $memoria; $i++) {
            $matriz[$i]['posicion'] = substr(str_repeat(0, 4).$i, - 4);
            $matriz[$i]['tipo'] = 'x';
            $matriz[$i]['valorp'] = null;
        }
        return $matriz;
    }

?>