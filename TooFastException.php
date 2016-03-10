<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TooFastException
 *
 * @author kraftla
 */
class TooFastException extends Exception {
    public function getDevString()
    {
        if(ENV === "development") {
            return $this->getMessage();
        }
        return;
    }
}
