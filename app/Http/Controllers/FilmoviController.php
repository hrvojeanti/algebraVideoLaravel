<?php

namespace App\Http\Controllers;

use App\Film;
use App\Zanr;

use Illuminate\Http\Request;

class FilmoviController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $filmovi = Film::all();
        return view('filmovi.index', compact('filmovi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


        return view('filmovi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $input = $request->all();

        if($file = $request->file('slika')) {
            $name = $file->getClientOriginalName();

            $file->move('images', $name);

            $input['slika'] = $name;

            Film::create($input);
            return redirect('filmovi');


        }

        if($input['unos_zanr']) {
            $zanr = new Zanr;
            $arr = $zanr->all()->where('naziv', $input['unos_zanr'])->toArray();
            $arr = array_filter($arr);
            if(!empty($arr)){
                return redirect('filmovi');
            } else {

                $zanr->naziv = $input['unos_zanr'];
                $zanr->save();
                return redirect('filmovi');

            }


        }
        

        // return $request->all();
        // $file = $request->file('slika');
        // Film::create($request->all());

        // return redirect('filmovi'); // pokrece ovu index funkciju

        // $input = $request->all();

        // $input['naziv'] = $request->naziv;

        // Film::create($request->all());

/*        $film = new Film;
        $film->naziv = $request->naziv;
        $film->zanr_id = $request->zanr_id;
        $film->godina = $request->godina;
        $film->trajanje = $request->trajanje;
        $film->slika = $request->slika;
        $film->save();
*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $film = Film::where('naziv', 'LIKE', $id . '%')->get();



        return view('filmovi.show', compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $film = Film::where('naziv', $id)->delete();

        return redirect('/filmovi');
    }
}
