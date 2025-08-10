<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;   

class ProductController extends Controller
{
    public static $products = [
        ["id"=>"1", "name"=>"TV", "description"=>"Best TV", "price"=>1000],
        ["id"=>"2", "name"=>"iPhone", "description"=>"Best iPhone", "price"=>1200],
        ["id"=>"3", "name"=>"Chromecast", "description"=>"Best Chromecast", "price"=>50],
        ["id"=>"4", "name"=>"Glasses", "description"=>"Best Glasses", "price"=>100]
    ];

    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Products - Online Store";
        $viewData["subtitle"] = "List of products";
        $viewData["products"] = ProductController::$products;
        return view('product.index')->with("viewData", $viewData);

    }


    public function show(string $id) : View | RedirectResponse
    {
        $viewData = [];
        $found = false;

        foreach (ProductController::$products as $prd) {
            if ($prd["id"] == $id) {
                    $product = $prd;
                    $found = true;
            }
        }

        if (!$found) {
            return redirect()->route("home.index");
        }

        $viewData["title"] = $product["name"]." - Online Store";
        $viewData["subtitle"] = $product["name"]." - Product information";
        $viewData["product"] = $product;
        return view('product.show')->with("viewData", $viewData);
    }

    public function create(): View
    {
        $viewData = []; //to be sent to the view
        $viewData["title"] = "Create product";
        return view('product.create')->with("viewData",$viewData);
    }


    public function save(Request $request)
    {
        $request->validate([
            "name" => "required",
            "price" => "required|numeric|gt:0",
        ]);

        dd($request->all());
        //here will be the code to call the model and save it to the database

    }

    public function created(Request $request): View
    {
        $request->validate([
            "name" => "required",
            "price" => "required|numeric|gt:0",
        ]);

        $viewData = []; //to be sent to the view
        $viewData["title"] = "Product created successfully";
        $viewData["subtitle"] = "Product created";
        return view('product.created')->with("viewData",$viewData);
    }

}

