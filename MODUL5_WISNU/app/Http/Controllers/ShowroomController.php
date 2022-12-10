<?php

namespace App\Http\Controllers;

use App\Models\Showroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShowroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carList = Showroom::where('user_id', auth()->user()->id)->get();

        if (count($carList) < 1) {
            return redirect('/showroom/create');
        }

        return view('showrooms.listcar-wisnu', [
            'title' => 'List Mobil',
            'carList' => $carList,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //add pages
    {
        return view('showrooms.add-wisnu', [
            'title' => 'Tambah Mobil',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imgName = $request->name . '-' . auth()->user()->name . '-' . time() . '.' . $request->image->extension();

        $request->image->move(public_path('img/uploaded'), $imgName);

        Showroom::create([
            'name' => $request->name,
            'owner' => $request->owner,
            'user_id' => $request->user_id,
            'brand' => $request->brand,
            'purchase_date' => $request->purchase_date,
            'description' => $request->description,
            'image' => $imgName,
            'status' => $request->status,
        ]);

        return redirect('/showroom')
            ->with('toast', 'Data berhasil ditambahkan.')
            ->with('color', 'text-primary');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Showroom  $showroom
     * @return \Illuminate\Http\Response
     */
    public function show($car_id)
    {
        $carList = Showroom::where('id', $car_id)->first();

        return view('showrooms.detail-wisnu', [
            'title' => 'Detail Mobil ' . $carList->name,
            'carList' => $carList,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Showroom  $showroom
     * @return \Illuminate\Http\Response
     */
    public function edit($car_id)
    {
        $carList = Showroom::where('id', $car_id)->first();

        return view('showrooms.edit-wisnu', [
            'title' => 'Edit Mobil ' . $carList->name,
            'carList' => $carList,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Showroom  $showroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $car_id)
    {
        $car = Showroom::find($car_id);

        if ($request->image) {
            @unlink(public_path('/img/uploaded/') . $car->image);
            $imgName = $request->name . '-' . auth()->user()->name . '-' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('img/uploaded'), $imgName);
        } else {
            $imgName = $car->image;
        }

        $car->update([
            'name' => $request->name,
            'owner' => $request->owner,
            'user_id' => auth()->user()->id,
            'brand' => $request->brand,
            'purchase_date' => $request->purchase_date,
            'description' => $request->description,
            'image' => $imgName,
            'status' => $request->status,
        ]);

        return redirect('/showroom')
            ->with('toast', 'Data berhasil diupdate.')
            ->with('color', 'text-warning');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Showroom  $showroom
     * @return \Illuminate\Http\Response
     */
    public function destroy($car_id)
    {
        $car = Showroom::find($car_id);

        @unlink(public_path('/img/uploaded/') . $car->image);

        $car->where('id', $car_id)->delete();

        return redirect('/showroom')
            ->with('toast', 'Data berhasil dihapus.')
            ->with('color', 'text-danger');
    }
}
