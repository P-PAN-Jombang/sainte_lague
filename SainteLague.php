<?php

namespace App\Libraries;

class SainteLague
{
    /**
     * Menghitung jumlah kursi yang didapatkan oleh masing-masing partai peserta pemilu
     * 
     * @param array $votes <string, int> str PartyName and int total votes gained each party
     * @param int $total_seats Seats Available
     * @param float $pt Parliamentary Threshold
     * @return array <string, int> 
     */
    static function calculate($votes, $total_seats, $pt)
    {
        $total_votes = 0;
        foreach ($votes as $value => $key) {
            $total_votes += $key['votes'];
            $votes[$value]['seats_index'] = 1;
            $votes[$value]['seats_total'] = 0;
        }
        foreach ($votes as $key => $value) {
            if ($value['votes'] < $pt * $total_votes) {
                unset($votes[$key]);
            }
        }
        $i = 0;
        while ($i < $total_seats) {
            $temp[] = [];
            if ($i == 0) {

                foreach ($votes as $key => $value) {
                    $temp[$i][$key] = $value['votes'];
                }
            }
            $temp[$i]['max'] = max($temp[$i]);
            foreach ($votes as $key => $value) {

                if ($temp[$i][$key] == $temp[$i]['max']) {

                    $votes[$key]['seats_index'] += 2;
                    $votes[$key]['seats_total'] += 1;
                    $temp[$i + 1][$key] = $votes[$key]['votes'] / $votes[$key]['seats_index'];
                } else {
                    $temp[$i + 1][$key] = $temp[$i][$key];
                }
            }
            $i++;
        }
        return $votes;
    }
}
