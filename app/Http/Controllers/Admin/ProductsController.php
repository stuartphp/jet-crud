<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Gate;

class ProductsController extends Controller
{
    public function categories()
    {
        abort_if(Gate::denies('categories_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('products.categories');
    }

    public function units()
    {
        abort_if(Gate::denies('units_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('products.units');
    }
    public function index()
    {
        abort_if(Gate::denies('products_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('products.index');
    }
}
