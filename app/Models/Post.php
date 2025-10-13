<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    // ... (protected $fillable, protected $casts は変更なし)

    /**
     * 一括代入（Mass Assignment）を許可するカラム
     */
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'date',
        'time_hour', 
        'time_min',
        'prefecture',
        'cost',
        'category_1',
        'category_2',
        'category_3',
    ];
    
    // Timeなどのカラムを自動でキャスト（型変換）
    protected $casts = [
        'date' => 'date',
        'time_hour' => 'integer',
        'time_min' => 'integer',
    ];


    /**
     * Userモデルとのリレーション定義
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * PostImageモデルとのリレーション定義
     * この投稿に紐づく全ての画像を取得する
     * @return HasMany
     */
    public function images(): HasMany
    {
        // images()リレーションは PostImages テーブルを参照（PostImageモデルが必要）
        return $this->hasMany(PostImage::class); 
    }

    /**
     * CategoryPost (中間テーブル) とのリレーション定義
     * コントローラーの categoryPost()->createMany() に対応
     * @return HasMany
     */
    public function categoryPost(): HasMany
    {
        // CategoryPostという中間テーブル/モデルが存在することを前提とします
        return $this->hasMany(CategoryPost::class); 
    }
}