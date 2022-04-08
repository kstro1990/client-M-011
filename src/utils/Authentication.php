<?php

//TODO: crear namespace para doto el proyecto

class Authentication
{
    /**
     * Autenticacion para pago en efectivo esta recibe dos parametros
     * @param string $login
     * @param string $trankey
     */
    public function setAuthM011($login, $trankey)
    {
        $rTrankey = $this->hasTrankey($trankey);
        $auth = [
            'login' => $login,
            'tranKey' => $rTrankey[0],
            'seed' => $rTrankey[1],
        ];
        return $auth;
    }

    //hasshea el trnakey
    public function hasTrankey($trankey)
    {
        $seed = $this->sedd();
        $respTrankey = sha1($seed . $trankey);
        return [$respTrankey, $seed];
    }

    //retorna la semilla
    public function sedd()
    {
        return date('c');
    }
}
