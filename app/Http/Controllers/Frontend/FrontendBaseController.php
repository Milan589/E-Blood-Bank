<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class FrontendBaseController extends Controller
{
    function __LoadDataToView($viewPath)
    {
        view()->composer($viewPath, function ($view) {
            $carts = Cart::content();
            $view->with('carts', $carts);
        });
        return $viewPath;
    }
}
