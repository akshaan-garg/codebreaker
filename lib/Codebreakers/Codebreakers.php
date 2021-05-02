<?php


class Codebreakers
{
    public function __construct($codes)
    {
        $this->codes = $codes;
    }

    public function getCurrentDecoding()
    {
        $encoded = $this->getCodes()["encoded"];
        $decoded = "";
        $len = strlen($encoded);
        for ($i = 0; $i < $len; $i++)
        {
            if (isset($this->currentEncryption[$encoded[$i]]))
            {
                $decoded .= $this->currentEncryption[$encoded[$i]];
            }
            else{
                $decoded .= $encoded[$i];
            }
        }
        return $decoded;
    }

    public function shuffle($toShuffle)
    {
        $sz = sizeof($toShuffle);
        if ($sz == 2)
        {
            $temp = $this->currentEncryption[$toShuffle[0]];
            $this->currentEncryption[$toShuffle[0]] = $this->currentEncryption[$toShuffle[1]];
            $this->currentEncryption[$toShuffle[1]] = $temp;
        }
        else if ($sz > 2) {
            $actualVals = array();
            for($i = 0; $i < $sz; $i++)
            {
                array_push($actualVals,$this->currentEncryption[$toShuffle[$i]]);
            }
            shuffle($actualVals);
            for($i = 0; $i < $sz; $i++)
            {
                $this->currentEncryption[$toShuffle[$i]] = $actualVals[$i];
            }
        }
        else {
            $this->error = "Select at least 2 letters";
        }
    }

    public function getHTML()
    {
        $html = <<<HTML

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link href="codebreaker.css" type="text/css" rel="stylesheet"/>
  <title>Codebreaker</title>
</head>
<body>
<form id="gameform" method="post" action="post/codebreaker.php">
  <fieldset>
    <h1>{$this->getName()}'s Codebreaker</h1>
    <h2>Encoded:</h2>
    <p class="code">{$this->getCodes()["encoded"]}</p>
    <h2>Decoded:</h2>
    <p class="code">{$this->getCurrentDecoding()}</p>
HTML;
        if (!$this->giveup and !$this->win) {
            $html .= <<<HTML
    <table class="game">
      <tr>
        <td>A:{$this->currentEncryption['A']} <input type="checkbox" name="A"></td>
        <td>F:{$this->currentEncryption['F']} <input type="checkbox" name="F"></td>
        <td>K:{$this->currentEncryption['K']} <input type="checkbox" name="K"></td>
        <td>P:{$this->currentEncryption['P']} <input type="checkbox" name="P"></td>
        <td>U:{$this->currentEncryption['U']} <input type="checkbox" name="U"></td>
        <td>Z:{$this->currentEncryption['Z']} <input type="checkbox" name="Z"></td>
      </tr>
      <tr>
        <td>B:{$this->currentEncryption['B']} <input type="checkbox" name="B"></td>
        <td>G:{$this->currentEncryption['G']} <input type="checkbox" name="G"></td>
        <td>L:{$this->currentEncryption['L']} <input type="checkbox" name="L"></td>
        <td>Q:{$this->currentEncryption['Q']} <input type="checkbox" name="Q"></td>
        <td>V:{$this->currentEncryption['V']} <input type="checkbox" name="V"></td>
      </tr>
      <tr>
        <td>C:{$this->currentEncryption['C']} <input type="checkbox" name="C"></td>
        <td>H:{$this->currentEncryption['H']} <input type="checkbox" name="H"></td>
        <td>M:{$this->currentEncryption['M']} <input type="checkbox" name="M"></td>
        <td>R:{$this->currentEncryption['R']} <input type="checkbox" name="R"></td>
        <td>W:{$this->currentEncryption['W']} <input type="checkbox" name="W"></td>
      </tr>
      <tr>
        <td>D:{$this->currentEncryption['D']} <input type="checkbox" name="D"></td>
        <td>I:{$this->currentEncryption['I']} <input type="checkbox" name="I"></td>
        <td>N:{$this->currentEncryption['N']} <input type="checkbox" name="N"></td>
        <td>S:{$this->currentEncryption['S']} <input type="checkbox" name="S"></td>
        <td>X:{$this->currentEncryption['X']} <input type="checkbox" name="X"></td>
      </tr>
      <tr>
        <td>E:{$this->currentEncryption['E']} <input type="checkbox" name="E"></td>
        <td>J:{$this->currentEncryption['J']} <input type="checkbox" name="J"></td>
        <td>O:{$this->currentEncryption['O']} <input type="checkbox" name="O"></td>
        <td>T:{$this->currentEncryption['T']} <input type="checkbox" name="T"></td>
        <td>Y:{$this->currentEncryption['Y']} <input type="checkbox" name="Y"></td>
      </tr>
    </table>
    <p><input type="submit" name="shuffle" value="Swap/Shuffle">
      <input type="submit" name="giveup" value="Give Up!">
      <input type="submit" name="newgame" value="New Game">
    </p>

    <p><input type="submit" name="exit" value="Exit"></p>
HTML;
        } else if ($this->giveup) {
            $html .= <<<HTML
    <p class="end">You gave up!</p>
    <p><input type="submit" name="newgame"  value="New Game"></p>
HTML;

        } else {
            $html .= <<<HTML
    <p class="end">You decoded the secret message!</p>
    <p><input type="submit" name="newgame"  value="New Game"></p>
HTML;
        }
        if ($this->error != "")
        {
            $html .= <<<HTML
    <p>Error! {$this->error}</p>
HTML;
            $this->error = "";
        }
        $html .= <<<HTML
  </fieldset>
</form>
<p class="solution">{$this->getCodes()["plaintext"]}</p></body>
</html>
HTML;
    return $html;
    }

    public function setError($error)
    {
        $this->error = $error;
    }



    public function getCodes()
    {
        return $this->codes;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param bool $giveup
     */
    public function setGiveup($giveup)
    {
        $this->giveup = $giveup;
        if ($giveup)
        {
            $this->currentEncryption = $this->codes["decode"];
        }
    }

    /**
     * @return string[]
     */
    public function getCurrentEncryption()
    {
        return $this->currentEncryption;
    }

    /**
     * @param bool $win
     */
    public function setWin($win)
    {
        $this->win = $win;
    }


    private $currentEncryption = [
        'A' => 'A', 'B' => 'B', 'C' => 'C',
        'D' => 'D', 'E' => 'E', 'F' => 'F',
        'G' => 'G', 'H' => 'H', 'I' => 'I',
        'J' => 'J', 'K' => 'K', 'L' => 'L',
        'M' => 'M', 'N' => 'N', 'O' => 'O',
        'P' => 'P', 'Q' => 'Q', 'R' => 'R',
        'S' => 'S', 'T' => 'T', 'U' => 'U',
        'V' => 'V', 'W' => 'W', 'X' => 'X',
        'Y' => 'Y', 'Z' => 'Z'
    ];
    private $codes = array();
    private $name;
    private $giveup = false;
    private $win = false;
    private $error = "";
}