<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'status',
        "category_id",
        'name',
        'quantity',
        'price',
        'description',
        'browser_title',
        'page_title',
        'seo_meta_title',
        'seo_meta_subject',
        'seo_meta_description',
        'seo_meta_keywords',
        'created_user_id',
        'updated_user_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
    ];

    function getCategoryName() {
        $category = Category::find($this->category_id);
        return $category->name;
    }

   function getShortDescription() {
        $words = explode(" ", $this->description);
        $html = "";
        $limit = min(20, count($words));
        foreach ($words as $key => $value) {
            $html .= $value . " ";
            $limit--;
            if ($limit == 0) {
                break;
            }
        }
        $html .= "...";
        return $html;
    }

    function hasFullDescription() {
        if (strlen($this->getShortDescription()) < strlen($this->description)) {
            return true;
        }
        return false;
    }

}
