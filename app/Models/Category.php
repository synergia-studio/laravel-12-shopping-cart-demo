<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Product;

class Category extends Authenticatable
{
     /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'status',
        'category_id',
        'name',
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

    function productsCount() {
        return Product::where("category_id", $this->id)->count();
    }

    function getShortDescription() {
        $words = explode(" ", strip_tags($this->description));
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
