<?php


/**
 * Class that selects a random coded message.
 */
class Codes
{
    /**
     * Get a random coded message
     * @return array An array with keys 'plaintext', 'encoded', and 'decode', where
     *   $result['decode'] is an array of encoded letter to decoded letter.
     */
    public function getCode()
    {
        $r = rand() % count($this->codes);
        return $this->codes[$r];
    }

    private $codes = [
        [
            'plaintext' => 'EVERY DAY ABOVE GROUND IS A GOOD DAY.',
            'encoded' => 'XQXZM FKM KDLQX TZLPWF UA K TLLF FKM.',
            'decode' => ['A' => 'S', 'B' => 'P', 'C' => 'M', 'D' => 'B', 'E' => 'W', 'F' => 'D', 'G' => 'T', 'H' => 'F', 'I' => 'C', 'J' => 'L', 'K' => 'A', 'L' => 'O', 'M' => 'Y', 'N' => 'H', 'O' => 'K', 'P' => 'U', 'Q' => 'V', 'R' => 'Z', 'S' => 'X', 'T' => 'G', 'U' => 'I', 'V' => 'J', 'W' => 'N', 'X' => 'E', 'Y' => 'Q', 'Z' => 'R']
        ],
        [
            'plaintext' => 'SAY HELLO TO THE BAD GUY!',
            'encoded' => 'PVT ZWXXN IN IZW JVG HYT!',
            'decode' => ['A' => 'Z', 'B' => 'Q', 'C' => 'R', 'D' => 'X', 'E' => 'I', 'F' => 'P', 'G' => 'D', 'H' => 'G', 'I' => 'T', 'J' => 'B', 'K' => 'J', 'L' => 'M', 'M' => 'K', 'N' => 'O', 'O' => 'W', 'P' => 'S', 'Q' => 'C', 'R' => 'V', 'S' => 'F', 'T' => 'Y', 'U' => 'N', 'V' => 'A', 'W' => 'E', 'X' => 'L', 'Y' => 'U', 'Z' => 'H']
        ],
        [
            'plaintext' => 'HE\'S SUCH A GOOD LAWYER, THAT BY TOMORROW MORNING, YOU GONNA BE WORKING IN ALASKA.',
            'encoded' => 'TR\'A AGWT Q KCCV NQFDRH, MTQM OD MCYCHHCF YCHBEBK, DCG KCBBQ OR FCHJEBK EB QNQAJQ.',
            'decode' => ['A' => 'S', 'B' => 'N', 'C' => 'O', 'D' => 'Y', 'E' => 'I', 'F' => 'W', 'G' => 'U', 'H' => 'R', 'I' => 'Q', 'J' => 'K', 'K' => 'G', 'L' => 'F', 'M' => 'T', 'N' => 'L', 'O' => 'B', 'P' => 'Z', 'Q' => 'A', 'R' => 'E', 'S' => 'P', 'T' => 'H', 'U' => 'X', 'V' => 'D', 'W' => 'C', 'X' => 'J', 'Y' => 'M', 'Z' => 'V']
        ],
        [
            'plaintext' => 'THE WORLD IS YOURS!',
            'encoded' => 'ZHD EKROY SP JKURP!',
            'decode' => ['A' => 'Z', 'B' => 'Q', 'C' => 'V', 'D' => 'E', 'E' => 'W', 'F' => 'G', 'G' => 'C', 'H' => 'H', 'I' => 'F', 'J' => 'Y', 'K' => 'O', 'L' => 'J', 'M' => 'P', 'N' => 'X', 'O' => 'L', 'P' => 'S', 'Q' => 'B', 'R' => 'R', 'S' => 'I', 'T' => 'K', 'U' => 'U', 'V' => 'M', 'W' => 'A', 'X' => 'N', 'Y' => 'D', 'Z' => 'T']
        ],
        [
            'plaintext' => 'NOTHING EXCEEDS LIKE EXCESS. YOU SHOULD KNOW THAT, TONY.',
            'encoded' => 'BKHZSBT OEPOOCA RSIO OEPOAA. YKQ AZKQRC IBKU HZXH, HKBY.',
            'decode' => ['A' => 'S', 'B' => 'N', 'C' => 'D', 'D' => 'Q', 'E' => 'X', 'F' => 'M', 'G' => 'R', 'H' => 'T', 'I' => 'K', 'J' => 'V', 'K' => 'O', 'L' => 'J', 'M' => 'P', 'N' => 'B', 'O' => 'E', 'P' => 'C', 'Q' => 'U', 'R' => 'L', 'S' => 'I', 'T' => 'G', 'U' => 'W', 'V' => 'F', 'W' => 'Z', 'X' => 'A', 'Y' => 'Y', 'Z' => 'H']
        ]
    ];
}