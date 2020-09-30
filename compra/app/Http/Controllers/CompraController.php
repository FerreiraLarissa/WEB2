<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = Compra::where('user_id', Auth::id())
                      ->orderBy('created_at', 'desc')
                      ->paginate(3);
        

        return view('compras.index',compact('compras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('compras.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $compra = new Compra($request->all());

        $compra->user_id = Auth::id();

        $compra->save();

        return redirect('compras')->with('sucess', 'Lista de compra criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show(Compra $compra)
    {
        return view('compras.show',compact('compra'));    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit(Compra $compra)
    {
        if($compra->user_id === Auth::id()){
        return view('compras.edit',compact('compra'));
      }else{
        return redirect()->route('compras.index')
                         ->with('error',"Você não pode editar porque não é o autor!")
                         ->withInput();
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compra $compra)
    {
      if($compra->user_id === Auth::id()){
        return redirect()->route('compras.index')->with('sucess', 'Lista de compras atualizada com sucesso!');
        }else{
            return redirect()->route('compras.index')
                         ->with('error',"Você não pode editar porque não é o autor!")
                         ->withInput();
        }   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compra $compra)
    {
          if ($compra->user_id === Auth::id()) {
            $compra->delete();
            return redirect()->route('compras.index')
                             ->with('sucess', 'Lista de compras apagada com sucesso!');
        }else{
            return redirect()->route('compras.index')
                             -> with('error', "Você não pode apagar a lista porque não é o autor!")
                             ->withInput();
        }
    }
}
