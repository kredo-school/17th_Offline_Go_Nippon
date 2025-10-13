<php?

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

// 中間テーブルなので、Pivotクラスを継承するのが一般的です
class CategoryPost extends Pivot 
{
    // テーブル名が category_post であることをLaravelに明示
    protected $table = 'category_post'; 
    
    protected $fillable = ['category_id', 'post_id'];

    // PostControllerのロジックが期待するリレーションを定義 (CategoryモデルとPostモデルへのリレーション)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}