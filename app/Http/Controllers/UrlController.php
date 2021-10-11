<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $urls = Url::orderBy('endereco')->paginate(5);
        return view('url/index', compact('urls'));
    }

    public function create($id)
    {
        $url = Url::findOrNew($id);
        return view('url/create', compact('url'));
    }

    public function save($id, Request $request)
    {
        $url = Url::findOrNew($id);
        $url->endereco = $request->endereco;
        $url->save();
        $request->session()->flash('status', 'Url salva com sucesso!');
        return redirect('/url');
    }   

    public function show($id)
    {
        $url = Url::findOrNew($id);
        return view('url/show', compact('url'));
    }
}
