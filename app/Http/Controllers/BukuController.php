<?php 
namespace App\Http\Controllers; 
use App\Models\Buku; 
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;

class BukuController extends Controller
{
    public function index()
    {
        return Buku::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'tahun_terbit' => 'required|integer',
        ]);
        return Buku::create($request->all());
    }

    public function show($id)
    {
        return Buku::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);
        $buku->update($request->all());
        return $buku;
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();
        return response(null, 204);
    }
}
