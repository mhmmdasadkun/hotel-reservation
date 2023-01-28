<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthGuard implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(!session()->get('isLogin')) {
            return redirect()->route('auth.login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
     
    }
}
