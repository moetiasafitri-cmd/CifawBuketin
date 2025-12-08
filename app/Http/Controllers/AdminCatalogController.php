namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCatalogController extends Controller
{
    public function index()
    {
        return view('admin.catalog.index', [
            'products' => Product::all()
        ]);
    }

    public function create()
    {
        return view('admin.catalog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'price' => 'required',
            'image' => 'required|image'
        ]);

        $path = $request->file('image')->store('products', 'public');

        Product::create([
            'name'  => $request->name,
            'price' => $request->price,
            'image' => $path
        ]);

        return redirect()->route('admin.catalog.index')->with('success', 'Produk ditambahkan');
    }

    public function edit($id)
    {
        return view('admin.catalog.edit', [
            'product' => Product::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $path = $product->image;

        if ($request->hasFile('image')) {
            Storage::delete("public/" . $path);
            $path = $request->file('image')->store('products', 'public');
        }

        $product->update([
            'name'  => $request->name,
            'price' => $request->price,
            'image' => $path
        ]);

        return redirect()->route('admin.catalog.index')->with('success', 'Produk diupdate');
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);

        Storage::delete("public/" . $product->image);

        $product->delete();

        return redirect()->route('admin.catalog.index')->with('success', 'Produk dihapus');
    }
}
