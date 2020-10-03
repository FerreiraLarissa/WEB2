<?php

namespace App\Http\Controllers;

use App\Models\Frase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class FraseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $frases = Frase::where('user_id', Auth::id())
                    ->orderBy('created_at', 'desc')
                      ->paginate(3);

        return view('frases.index',compact('frases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frases.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'unique:frases', 'max:255'],
            'body' => ['required'],
          ]);

       $frase = new Frase($validatedData);

        $frase->user_id = Auth::id();

        $frase->save();

        return redirect('frases')->with('sucess', "Frase criada com sucesso!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Frase  $frase
     * @return \Illuminate\Http\Response
     */
    public function show(Frase $frase)
    {
        return view('frases.show',compact('frase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frase  $frase
     * @return \Illuminate\Http\Response
     */
    public function edit(Frase $frase)
    {
        if($frase->user_id === Auth::id()){
        return view('frases.edit',compact('frase'));
      }else{
        return redirect()->route('frases.index')
                         ->with('error',"Você não pode editar a frase porque não é o autor!")
                         ->withInput();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Frase  $frase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Frase $frase)
    {
         $validatedData = $request->validate([
            'title' => ['required', Rule::unique('frases')->ignore($frase), 'max:255'],
            'body' => ['required'],
          ]);

         if($frase->user_id === Auth::id()){
            $frase->update($request->all());   
        return redirect()->route('frases.index')->with('sucess', 'Frase editada com sucesso');
        }else{
            return redirect()->route('frases.index')
                         ->with('error',"Você não pode editar a frase porque não é o autor!")
                         ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Frase  $frase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Frase $frase)
    {
         if ($frase->user_id === Auth::id()) {
            $frase->delete();
            return redirect()->route('frases.index')
                             ->with('sucess', 'Frase apagada com sucesso');
        }else{
            return redirect()->route('frases.index')
                             -> with('error', "Você não pode apagar a frase porque não é o autor!")
                             ->withInput();
        }
    }
}
