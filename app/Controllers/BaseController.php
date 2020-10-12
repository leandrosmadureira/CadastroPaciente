<?php

namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */
use CodeIgniter\Controller;

class BaseController extends Controller {

  /**
   * An array of helpers to be loaded automatically upon
   * class instantiation. These helpers will be available
   * to all other controllers that extend BaseController.
   *
   * @var array
   */
  protected $helpers = [];

  /**
   * Constructor.
   */
  public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger) {
    // Do Not Edit This Line
    parent::initController($request, $response, $logger);

    //--------------------------------------------------------------------
    // Preload any models, libraries, etc, here.
    //--------------------------------------------------------------------
    // E.g.:
    // $this->session = \Config\Services::session();
  }

  protected function validaCPF($cpf) {
    $cpf = preg_replace('/[^0-9]/is', '', $cpf);

    if (strlen($cpf) != 11) {
      return false;
    }
    if (preg_match('/(\d)\1{10}/', $cpf)) {
      return false;
    }
    for ($t = 9; $t < 11; $t++) {
      for ($d = 0, $c = 0; $c < $t; $c++) {
        $d += $cpf[$c] * (($t + 1) - $c);
      }
      $d = ((10 * $d) % 11) % 10;
      if ($cpf[$c] != $d) {
        return false;
      }
    }
    return true;
  }

  protected function validaCns(String $cns) {
    $cns = preg_replace('/[^0-9]/is', '', $cns);

    if (strlen($cns) != 15) {
      return false;
    }
    if (($cns[0] == '1') or ( $cns[0] == '2')) {
      for ($t = 0, $c = 15, $soma = 0; $t < 11; $t++) {
        $soma += ($cns[$t] * $c);
        $c = $c - 1;
      }
      
      $resto = $soma % 11;
      $dv = 11 - $resto;

      if ($dv == 11) {
        $dv = 0;
      }

      if ($dv == 10) {
        for ($t = 0, $c = 15, $soma = 0; $t < 11; $t++) {
          $soma += ($cns[$t] * $c);
          $c = $c - 1;
        }
        $soma += 2;
        $resto = $soma % 11;
        $dv = 11 - $resto;
        $resultado = substr($cns, 0, 11) . "001" . $dv;
      } else {
        $resultado = substr($cns, 0, 11) . "000" . $dv;
      }
      if ($resultado != $cns) {
        return false;
      } else {
        return true;
      }
    } elseif (($cns[0] == '7') or ( $cns[0] == '8') or ( $cns[0] == '9')) {
      for ($t = 0, $c = 15, $soma = 0; $t < 15; $t++) {
        $soma += ($cns[$t] * $c);
        $c = $c - 1;
      }
      $resto = $soma % 11;
      
      if ($resto != 0) {
        return false;
      } else {
        return true;
      }
    }
  }

}
