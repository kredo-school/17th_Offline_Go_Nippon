<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Prefecture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function create()
    {
        $all_categories = Category::all();
        $prefectures = Prefecture::all();

        return view('users.posts.create', compact('all_categories', 'prefectures'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'date' => 'required|date',
            'time_hour' => 'required|integer|min:0|max:23',
            'time_min' => 'required|integer|min:0|max:59',
            'category' => 'required|array|max:3',
            'category.*' => 'nullable|integer|exists:categories,id',
            'prefecture_id' => 'required|integer|exists:prefectures,id',
            'cost' => 'nullable|integer|min:0|max:10000',
            'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePaths = [];
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                if ($file->isValid()) {
                    $path = $file->store('image', 'public');
                    $imagePaths[] = $path;
                }
            }
        }
        
         $visitedAt = $validated['date'] . ' ' . str_pad($validated['time_hour'], 2, '0', STR_PAD_LEFT) . ':' . str_pad($validated['time_min'], 2, '0', STR_PAD_LEFT) . ':00';

        $post = new Post();
        $post->title = $validated['title'];
        $post->content = $validated['content'];
        $post->prefecture_id = $validated['prefecture_id'];
        $post->visited_at = $visitedAt;
        $post->cost = $validated['cost'] ?? 0;
        $post->user_id = Auth::id();
        $post->image = json_encode($imagePaths);
        $post->save();

        if (!empty($validated['category'])) {
        $post->categories()->sync(array_filter($validated['category']));
    }


        return redirect()->route('posts.index')->with('success', '投稿を作成しました！');
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePaths = json_decode($post->images, true) ?? [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                if ($file->isValid()) {
                    $path = $file->store('images', 'public');
                    $imagePaths[] = $path;
                }
            }

            $imagePaths = array_slice($imagePaths, 0, 3);
        }

        $post->title = $validated['title'];
        $post->images = json_encode($imagePaths);
        $post->save();

        return redirect()->route('posts.show', $post->id)->with('success', '投稿を更新しました！');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if ($post->images) {
            foreach (json_decode($post->images, true) as $path) {
                Storage::disk('public')->delete($path);
            }
        }

        $post->delete();

        return redirect()->route('posts.show')->with('success', '投稿を削除しました！');
    }

    public function index()
    {
        $posts = Post::with('categories', 'user')->latest()->get();
        return view('users.posts.show', compact('posts'));
    }
}
