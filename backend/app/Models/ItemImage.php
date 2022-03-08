<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemImage extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'item_id',
        'image_url',
    ];

    public static function findByID($item_id) {
        return self::query()
            ->where('id', $item_id)
            ->whereNull('deleted_at')
            ->first();
    }

    public static function findByItemID($item_id) {
        return self::query()
            ->where('item_id', $item_id)
            ->whereNull('deleted_at')
            ->all();
    }

    public function delete(){
        if(file_exists('file_path')){
            @unlink('file_path');
        }
        parent::delete();
    }

    /**
     * 荷物画像 追加
     *
     * @param [array] $params
     * @return App\Models\Item
     */
    public function itemImageStore($requests, $id)
    {
        $requests['img1']->store('/public/img/items');
        $paths[] = '/storage/img/items/' . $requests['img1']->hashName();
        if(isset($requests['img2'])) {
            $requests['img2']->store('/public/img/items');
            $paths[] = '/storage/img/items/' . $requests['img2']->hashName();
        };
        if(isset($requests['img3'])) {
            $requests['img3']->store('/public/img/items');
            $paths[] = '/storage/img/items/' . $requests['img3']->hashName();
        };
        if(isset($requests['img4'])) {
            $requests['img4']->store('/public/img/items');
            $paths[] = '/storage/img/items/' . $requests['img4']->hashName();
        };
        if(isset($requests['img5'])) {
            $requests['img5']->store('/public/img/items');
            $paths[] = '/storage/img/items/' . $requests['img5']->hashName();
        };
        foreach($paths as $index => $path) {
            $params['item_id']     = $id;
            $params['url']         = $path;
            ItemImage::create($params);
            if($index == 0) {
                $lastID = DB::getPdo()->lastInsertId();
                $item = Item::where('id', $id)->first();
                $item->item_image_id = $lastID;
                $item->save();
            };
        };
    }
}
