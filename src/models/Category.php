<?php

namespace Anjalicct\Category\models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use \Illuminate\Database\Eloquent\Model as Eloquent;

class Category extends Eloquent
{
    use HasFactory;

    use SoftDeletes;

    protected $table = "tbl_package_category" ;

    protected $fillable = ['category_id', 'category_name', 'parent_category_id', 'category_status'];
    
    /**
     * Get Parent name by parent ID
     *
     * @param  mixed $parent_id
     * @return void || string || stdClass
     */
    public static function getParentName($parent_id){
        
        return is_null($parent_id) ? 'N/A' : self::where('category_id', $parent_id)->value('category_name');

    }
    
    /**
     * Get Primary id by category unique id
     *
     * @param  mixed $category_id
     * @return void
     */
    public static function findCategoryPrimaryID($category_id){
         return self::where('category_id', $category_id)->value('id');
    }
    
    /**
     * Relationship with self to find sub category
     */
    public function subcategories(){
        return $this->hasMany(Category::class, 'parent_category_id', 'category_id');
    }
}
