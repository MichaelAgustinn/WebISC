<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function lihat()
    {
        $data = Blog::with('user')->get();
        return view('dashboard.blog.blog-lihat', ['data' => $data]);
    }

    public function detail($slug)
    {
        // dd($slug);
        $blog = Blog::where('slug', $slug)->first();
        return view('detail-blog', ['data' => $blog]);
    }

    public function index()
    {
        $recent = Blog::with('user')->latest()->limit(5)->get();
        $blogs = Blog::with('user')->latest()->paginate(5);
        // dd($recent);
        return view('blog', ['recent' => $recent, 'blogs' => $blogs]);
    }

    public function create()
    {
        return view('dashboard.blog.editor');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required',
            ]);

            $description = $request->description;

            libxml_use_internal_errors(true);
            $dom = new \DOMDocument();
            $dom->loadHTML($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

            $images = $dom->getElementsByTagName('img');

            foreach ($images as $key => $img) {
                $src = $img->getAttribute('src');

                if (Str::startsWith($src, 'data:image')) {
                    if (preg_match('/^data:image\/(\w+);base64,/', $src, $type)) {
                        $data = substr($src, strpos($src, ',') + 1);
                        $data = base64_decode($data);

                        if ($data === false) {
                            throw new \Exception('Base64 decode failed');
                        }

                        $extension = strtolower($type[1]);
                        $imageName = 'blogs/' . time() . '_' . $key . '.' . $extension;

                        Storage::disk('public')->put($imageName, $data);

                        $img->setAttribute('src', asset('storage/' . $imageName));
                    }
                }
            }

            $description = $dom->saveHTML();

            $slug = Str::slug($request->title) . '-' . time();

            Blog::create([
                'user_id' => Auth::user()->id,
                'title' => $request->title,
                'slug' => $slug,
                'description' => $description,
            ]);

            return redirect()->back()->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            Log::error('Gagal menyimpan blog: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan.');
        }
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('dashboard.blog.blog-edit', ['data' => $blog]);
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required',
            ]);

            $blog = Blog::findOrFail($id);

            $description = $request->description;

            libxml_use_internal_errors(true);
            $dom = new \DOMDocument();
            $dom->loadHTML($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

            $images = $dom->getElementsByTagName('img');

            foreach ($images as $key => $img) {
                $src = $img->getAttribute('src');

                if (Str::startsWith($src, 'data:image')) {
                    if (preg_match('/^data:image\/(\w+);base64,/', $src, $type)) {
                        $data = substr($src, strpos($src, ',') + 1);
                        $data = base64_decode($data);
                        if ($data === false) {
                            throw new \Exception('Base64 decode failed');
                        }

                        $extension = strtolower($type[1]);
                        $imageName = 'blogs/' . time() . '_' . $key . '.' . $extension;

                        Storage::disk('public')->put($imageName, $data);
                        $img->setAttribute('src', asset('storage/' . $imageName));
                    }
                }
            }

            $description = $dom->saveHTML();

            $blog->update([
                'title' => $request->title,
                'description' => $description,
            ]);

            return redirect()->route('blog.lihat', $blog->id)->with('success', 'Blog berhasil diperbarui.');
        } catch (\Exception $e) {
            Log::error('Update gagal: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat update.');
        }
    }

    public function destroy($id)
    {
        $data = Blog::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }
}
