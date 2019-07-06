<?php
header("Content-Type: application/json; charset=UTF-8");
$suara = array(0 => array('nama_partai' => 'gaul', 'jumlah_suara' => 30000),
                1 => array('nama_partai' => 'kece', 'jumlah_suara' => 5000),
                2 => array('nama_partai' => 'ganteng', 'jumlah_suara' => 15000),
                3 => array('nama_partai' => 'keren', 'jumlah_suara' => 20000),
                4 => array('nama_partai' => 'syantiq', 'jumlah_suara' => 7500) );

$jumlah_kursi = 7;
function sainte_lague($suara,$jumlah_kursi)
{
    # code...
    $jumlah_suara = 0;
    foreach ($suara as $value => $key) {
        # code...
        $jumlah_suara += $key['jumlah_suara'];
        $suara[$value]['indeks_kursi'] = 1;
        $suara[$value]['jumlah_kursi'] = 0;

    }
    foreach ($suara as $key => $value) {
        # code...
        if ($value['jumlah_suara'] < 0.04*$jumlah_suara) {
            # code...
            unset($suara[$value]);
        }
    }
    $i = 0;
    while ($i < $jumlah_kursi) {
        # code...
        $temp[] = [];
        if ($i == 0) {
                # code...
            foreach ($suara as $key => $value) {
                    $temp[$i][$key] = $value['jumlah_suara'];
            }
        }
        $temp[$i]['max'] = max($temp[$i]);
        foreach ($suara as $key => $value) {
            # code...
            if ($temp[$i][$key] == $temp[$i]['max']) {
                # code...
                $suara[$key]['indeks_kursi'] += 2;
                $suara[$key]['jumlah_kursi'] += 1;
                $temp[$i+1][$key] = $suara[$key]['jumlah_suara']/$suara[$key]['indeks_kursi'];
            }else{
                $temp[$i+1][$key] = $temp[$i][$key];
            }
        }
        $i++;
    }
    $suara = json_decode(json_encode(json_encode($suara)));
     return $suara;
}


echo sainte_lague($suara,$jumlah_kursi);

?>