<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
// PostImageモデル（画像を保存する中間テーブルに対応するモデル）をここでuseします
use App\Models\PostImage; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Log; // エラーログ用にインポート

class PostController extends Controller
{
    private $post;
    private $category;
    // PostImageモデルも注入またはインスタンス化が必要ですが、簡単のため直接呼び出します

    public function __construct(Post $post, Category $category)
    {
        $this->post = $post;
        $this->category = $category;
    }

    public function create(){
        $all_categories = $this->category->all();
        // ★本来、Categoryの選択肢はここで渡すのが正しいです★
        return view('users.posts.create')->with('all_categories' , $all_categories);
    }

    public function store(Request $request){
        // ★★★ 複数画像と全フィールドに対応したバリデーション ★★★
        $request->validate([
            'title' => 'required|string|max:150',
            'description' => 'required|min:1|max:1000',
            'date' => 'required|date',
            'time_hour' => 'nullable|integer|min:0|max:23',
            'time_min' => 'nullable|integer|min:0|max:59',
            'prefecture' => 'required|string|max:50',
            'cost' => 'required|integer|min:0|max:30000', // max値を30000に修正
            'category' => 'required|array|between:1,3',
            
            'image' => 'required|array|between:1,3', // 画像の総数が1～3枚であること
            'image.*' => 'mimes:jpeg,jpg,png,gif|max:1024' // 各画像ファイルの最大サイズを1024KB
        ]);

        try {
            DB::beginTransaction();

            // 1. Postデータの保存（すべてのフォームフィールドを含む）
            $post = $this->post->newInstance(); 
            $post->user_id = Auth::user()->id;
            $post->title = $request->title;
            $post->description = $request->description;
            $post->date = $request->date;
            $post->time_hour = $request->time_hour;
            $post->time_min = $request->time_min;
            $post->prefecture = $request->prefecture;
            $post->cost = $request->cost; // costを保存
            $post->save(); 

            // 2. 複数の画像の保存（PostImageモデルとリレーションが必要）
            $image_data_array = [];
            $order = 1;
            
            // $request->file('image') はアップロードされたファイルの配列です
            foreach($request->file('image') as $image_file) {
                if ($image_file) {
                    // 画像をBase64形式にエンコード
                    $base64_image = 'data:image/' . $image_file->extension() . ';base64,' .
                        base64_encode(file_get_contents($image_file));
                    
                    // PostImageモデルに保存するための配列を構築
                    $image_data_array[] = [
                        'path' => $base64_image, // Base64データをpathカラムに保存
                        'order' => $order++,
                        // 'post_id' は createMany によって自動で紐づけられます
                    ];
                }
            }
            
            // images()リレーションを使用して画像を保存 (Postモデルにリレーションimages()が必要です)
            // $post->images()->createMany($image_data_array); 
            // NOTE: ここではimages()リレーションの存在が前提です。
            
            // 3. カテゴリの保存
            $category_post = [];
            foreach($request->category as $category_id) {
                // $category_id が空でないことを確認
                if ($category_id) {
                    $category_post[] = ['category_id' => $category_id];
                }
            }
            $post->categoryPost()->createMany($category_post);

            DB::commit();
            return redirect()->route('index')->with('success', '投稿を作成しました。');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Post Store Failed: ' . $e->getMessage() . ' | User ID: ' . Auth::id());
            return redirect()->back()->with('error', '投稿の作成に失敗しました。詳細: ' . $e->getMessage())->withInput();
        }
    }
    
    public function show($id)
    {
        $post = $this->post->findOrFail($id);
        return view('users.posts.show')->with('post',$post);
    }

    public function edit($id)
    {
        $post = $this->post->findOrFail($id);

        if (Auth::user()->id != $post->user_id) { 
            return redirect()->route('index');
        }

        $all_categories = $this->category->all();

        // categoryPostリレーションを介して選択済みのカテゴリIDを取得
        $selected_categories = $post->categoryPost->pluck('category_id')->toArray();

        return view('users.posts.edit')
            ->with('post', $post)
            ->with('all_categories', $all_categories)
            ->with('selected_categories', $selected_categories);
    }

    public function update(Request $request, $id)
    {
        // ★★★ 複数画像と全フィールドに対応したバリデーション ★★★
        $request->validate([
            'title' => 'required|string|max:150',
            'description' => 'required|min:1|max:1000',
            'date' => 'required|date',
            'time_hour' => 'nullable|integer|min:0|max:23',
            'time_min' => 'nullable|integer|min:0|max:59',
            'prefecture' => 'required|string|max:50',
            'cost' => 'required|integer|min:0|max:30000',
            'category' => 'required|array|between:1,3', 
            // 更新時は画像が必須ではない
            'image' => 'nullable|array|max:3',
            'image.*' => 'nullable|mimes:jpeg,jpg,png,gif|max:1024', 
        ]);

        try {
            DB::beginTransaction();
            $post = $this->post->findOrFail($id);

            // 1. Postデータの更新
            $post->title = $request->title;
            $post->description = $request->description;
            $post->date = $request->date;
            $post->time_hour = $request->time_hour;
            $post->time_min = $request->time_min;
            $post->prefecture = $request->prefecture;
            $post->cost = $request->cost;
            
            // 2. 新しい画像が送られた場合の処理
            if ($request->hasFile('image')) {
                // 既存の画像を削除するロジックをここに追加
                // $post->images()->delete(); 

                $image_data_array = [];
                $order = 1;
                foreach($request->file('image') as $image_file) {
                     if ($image_file) {
                        $base64_image = 'data:image/' . $image_file->extension() . ';base64,' .
                            base64_encode(file_get_contents($image_file));
                        $image_data_array[] = [
                            'path' => $base64_image,
                            'order' => $order++,
                        ];
                    }
                }
                // $post->images()->createMany($image_data_array); // 新しい画像を保存
            }

            $post->save();

            // 3. カテゴリの更新
            $post->categoryPost()->delete();
            $category_post = [];
            foreach($request->category as $category_id) {
                 if ($category_id) {
                    $category_post[] = ['category_id' => $category_id];
                }
            }
            $post->categoryPost()->createMany($category_post);
            
            DB::commit();
            return redirect()->route('post.show', $id)->with('success', '投稿が正常に更新されました。');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Post Update Failed: ' . $e->getMessage() . ' | Post ID: ' . $id);
            return redirect()->back()->with('error', '投稿の更新に失敗しました: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $this->post->destroy($id);
        return redirect()->route('index');
    }

    public function index()
    {
        $all_posts = Post::with('user')->latest()->get();
        return view('admin.posts.index', compact('all_posts'));
    }
}