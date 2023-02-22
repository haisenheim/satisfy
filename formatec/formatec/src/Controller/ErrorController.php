<?php
/**
 * Created by PhpStorm.
 * User: Dev Pro
 * Date: 28/02/2017
 * Time: 10:15
 */

namespace App\Controller;


class ErrorController extends AppController
{
    public function index() {
        $this->response->statusCode(403);
    }

}