<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductsController extends Controller
{
    public function index() {
        return Products::all();
    }

    public function store(Request $request) {
        $data = $request->all();
        Products::create($data);
        return response("")->setStatusCode(Response::HTTP_CREATED);
    }

    public function update(Request $request, Products $products) {
        $data = $request->all();
        $products->update($data);
        return \response("")->setStatusCode(Response::HTTP_NO_CONTENT);
    }

    public function destroy(Products $products) {
        $products->delete();
        return \response("")->setStatusCode(Response::HTTP_NO_CONTENT);
    }
}
