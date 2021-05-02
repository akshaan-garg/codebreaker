<?php


class CodebreakController
{
    public function __construct(Codebreakers $cb, $post)
    {
        if(isset($post["exit"]))
        {
            $this->setPage("..");
        }
        else if (isset($post["newgame"]))
        {
            $this->setPage("../post/newgame.php");
        }
        else if (isset($post["giveup"]))
        {
            $cb->setGiveup(true);
            $this->setPage("../codebreaker.php");
        }
        else if (isset($post["shuffle"]))
        {
            $toShuffle = array();
            foreach (range('A','Z') as $i)
            {
                if (isset($post[$i]))
                {
                    array_push($toShuffle,$i);
                }
            }
            $cb->shuffle($toShuffle);
            $check1 = $cb->getCurrentDecoding();
            $check2 = $cb->getCodes()["plaintext"];
            if ($check1 == $check2)
            {
                $cb->setWin(true);
            }
            $this->setPage("../codebreaker.php");
        }

    }

    /**
     * @return mixed
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param mixed $page
     */
    public function setPage($page)
    {
        $this->page = $page;
    }

    private $page;
}