<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email', 'unique:users,email,' . Auth::user()->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();

        if ($request->hasFile('image')) {

            //Verifica se existe uma imagem no diretório e deleta
            if (File::exists(public_path($user->image))) {
                File::delete(public_path($user->image));
            }


            $image = $request->image;
            $imageName = rand() . '-megastore-' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);

            //caminho da pasta da imagem
            $path = '/uploads/' . $imageName;

            $user->image = $path;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('success', 'Perfil atualizado com sucesso!');
    }

}
