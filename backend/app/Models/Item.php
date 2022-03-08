<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'staff_id',
        'user_id',
        'number',
        'received_on',
        'detail',
    ];

    public function infoSales() {
        return $this->belongsToMany(infoSale::class);
    }

    /**
     * ユーザーに紐づく箱一覧
     *
     * @param [array] $params
     * @return App\Models\Box
     */
    public static function boxListOfUser($user_id)
    {
        return Box::query()
            ->where('user_id', '=', $user_id)
            ->orderBy('id', 'DESC')
            ->get();
    }

    public function boxItemList($box_id)
    {
        return self::query()
            ->where('box_id', '=', $box_id)
            ->orderBy('id', 'DESC')
            ->get();
    }

    public function boxItemImageList($box_id)
    {
        return Item::select([
            'item_images.image_url as url',
        ])
        ->leftJoin('item_images', 'item_images.id', '=', 'items.id')
        ->where('box_id', $box_id)
        ->get();
    }
    

    public static function getBoxesByRental($item_id) {
        return self::query()
                ->where('id', $item_id)
                ->where('', )
                ->orderBy('id', 'DESC')
                ->get();
    }

    public static function findByIDWithInfoSale($item_id) {
        return self::query()
                ->with(['infosales'])
                ->where('id', $item_id)
                ->get();
    }

    public static function findsById($item_id){
        return self::query()
                ->where('id', $item_id)
                ->get();
    }

    public static function findById($item_id){
        return self::query()
                ->where('id', $item_id)
                ->whereNull('deleted_at')
                ->first();
    }
    /**
     * [販売一覧] 荷物 / 荷物の販売情報 / 荷物の画像 を取得する
     *
     * @param [array] $params
     * @return App\Models\Box
     */
    public function itemListSell()
    {
        return Item::select([
                        'items.*',
                        'info_sales.item_id as sell_id',
                        'info_sales.start_on as selling_day',
                        'info_sales.sale_price as selling_price',
                        'info_sales.sale_url as selling_url',
                        'item_images.image_url as url',
                        'shops.name as branch_name',
                        'staff.last_name as charge_name1',
                        'staff.first_name as charge_name2',
                    ])
                    ->where('items.status', 'ready_sale')
                    // ->leftJoin('sells', function($join) {
                    //     $join->on('sells.item_id', '=', 'items.id')
                    //         ->where('sells.stop_request_id', null);
                    // })
                    ->leftJoin('info_sales', function($join) {
                        $join->on('info_sales.item_id', '=', 'items.id');
                    })
                    ->leftJoin('item_images', 'item_images.id', '=', 'items.id')
                    ->leftJoin('shops', 'items.box_id', '=', 'shops.id')
                    ->leftJoin('staff', 'items.id', '=', 'staff.id')
                    ->get();
    }

    /**
     * [レンタル一覧] 荷物 / 荷物の販売情報 / 荷物の画像 を取得する
     *
     * @param [array] $params
     * @return App\Models\Box
     */
    public function itemListRental()
    {
        return Item::select([
                        'items.*',
                        'info_rentals.price as price',
                        'info_rentals.created_at as date',
                        'item_images.image_url as url',
                        'shops.name as branch_name',
                        'staff.last_name as charge_name1',
                        'staff.first_name as charge_name2',
                    ])
            ->where('items.status', 'now_store')
            ->orWhere('items.status', 'now_rental')
            ->leftJoin('info_rentals', function($join) {
                $join->on('info_rentals.item_id', '=', 'items.id')
                        ->where('info_rentals.deleted_at', null);
            })
            ->leftJoin('staff', 'items.id', '=', 'staff.id')
            ->leftJoin('shops', 'items.box_id', '=', 'shops.id')
            ->leftJoin('item_images', 'item_images.id', '=', 'items.id')
            ->get();
    }

    /**
     * [寄付済み一覧] 荷物 / 荷物の販売情報 / 荷物の画像 を取得する
     *
     * @param [array] $params
     * @return App\Models\Box
     */
    public function itemListDonate()
    {
        return Item::select([
                        'items.*',
                        'rentals.price as price',
                        'rentals.created_at as date',
                        'item_images.url as url',
                        'branches.name as branch_name',
                        'charges.name1 as charge_name1',
                        'charges.name2 as charge_name2',
                    ])
            ->where('items.status', '7')
            ->leftJoin('rentals', function($join) {
                $join->on('rentals.item_id', '=', 'items.id')
                        ->where('rentals.stop_request_id', null);
            })
            ->leftJoin('branches', 'items.branch_id', '=', 'branches.id')
            ->leftJoin('charges', 'items.branch_id', '=', 'charges.id')
            ->leftJoin('item_images', 'item_images.id', '=', 'items.item_image_id')
            ->get();
    }

    /**
     * 荷物 / 情報をIDではなく日本語に変換した状態
     *
     * @param [array] $params
     * @return App\Models\Box
     */
    public function itemWithJapaneseAll()
    {
        return Item::select([
                'items.*',
                'item_images.url as item_url',
                'branches.name as branch_name',
                'charges.name1 as charge_name1',
                'charges.name2 as charge_name2',
            ])
            ->leftJoin('item_images', 'items.item_image_id', '=', 'item_images.id')
            ->leftJoin('branches', 'items.branch_id', '=', 'branches.id')
            ->leftJoin('charges', 'items.branch_id', '=', 'charges.id')
            ->get();
    }

    /**
     * [箱依存] 荷物 / 情報をIDではなく日本語に変換した状態
     *
     * @param [array] $params
     * @return App\Models\Box
     */
    public function itemWithJapanese($id)
    {
        return Item::where('items.box_id', $id)
            ->select([
                'items.*',
                'item_images.url as item_url',
                'branches.name as branch_name',
                'charges.name1 as charge_name1',
                'charges.name2 as charge_name2',
            ])
            ->leftJoin('item_images', 'items.item_image_id', '=', 'item_images.id')
            ->leftJoin('branches', 'items.branch_id', '=', 'branches.id')
            ->leftJoin('charges', 'items.charge_id', '=', 'charges.id')
            ->get();
    }

    /**
     * 荷物 / 荷物のステータスと紐づく情報 を取得する
     *
     * @param [array] $params
     * @return App\Models\Box
     */
    public function itemWithStatus($id)
    {
        // １．荷物、荷物のステータスを取得
        $item = $this->find($id);
        $status = $item->status;
        if (isset($status)) {
            switch($status) {
                case 'now_store':
                    return [$item];
                    break;
                case 'request_sale':
                case 'ready_sale':
                    $detail = RequestReturns::findByItemID($id);
                    return [$item, $detail];
                    break;
                case 'now_sale':
                    $detail = InfoSale::findByItemId($id);
                    return [$item, $detail];
                    break;
                case 'now_rental':
                case 'negotiate_rental':                    
                case 'lend_rental':
                    $detail = InfoRental::findByItemID($id);
                    return [$item, $detail];
                    break;
                
                // case 'negotiate_rental':
                    // $rental_id = Rental::where('item_id', $id)->first()->id;
                    // $detail = RentalTrade::where('rental_id', $rental_id)
                    //     ->select([
                    //         'rentals.url',
                    //         'rental_trades.start_at',
                    //         'rental_trades.finish_at',
                    //     ])
                    //     ->leftJoin('rentals', 'rental_trades.rental_id', '=', 'rentals.id')
                    //     ->first();
                    // return [$item, $detail];
                    // break;
                case 'done_donate':
                    $detail = HistoryDonation::findByItemId($id);
                    return [$item, $detail];
                    break;

                case 'ready_return':
                    $detail = RequestReturns::findByItemId($id);
                    return [$item, $detail];
                    break;
                case 'done_sale':
                    $detail = HistorySale::findByItemID($id);
                    $detail->profit = $detail->price - $detail->platform_fee - $detail->moreclo_fee - $detail->postage;
                    return [$item, $detail];
                    break;
                case 'done_return':
                    // 返却情報
                    $detail = HistoryReturn::findByItemID($id);
                    // dd($detail);
                    return [$item, $detail];
                    break;
            }
        }
    }

    /**
     * 荷物 / ユーザー情報を取得
     *
     * @param [array] $params
     * @return App\Models\Item
     */
    public function itemShowWithUser($id)
    {
        return $this
            ->select([
                'items.*',
                'users.id as user_id',
            ])
            ->where('items.id', $id)
            ->leftJoin('boxes', 'boxes.id', '=', 'items.box_id')
            ->leftJoin('users', 'users.id', '=', 'boxes.user_id')
            ->first();
    }

    /**
     * 変更：荷物のステータスを引数に合わせて変更
     *
     * @param [array] $params
     * @return App\Models\Item
     */
    public function changeItemStatus($id, $key)
    {
        $item = Item::where('id', $id)->first();
        // ステータスを寄付（7）に変更
        $item->status = $key;
        $item->save();
        // self::query()
        //     ->where('id', $id)
        //     ->update([
        //         'status' => 7
        //     ]);
    }

    /**
     * 変更：荷物をリクエストを引数に合わせて変更
     *
     * @param [array] $params
     * @return App\Models\Item
     */
    public function changeItemRequest($id, $key)
    {
        $item = Item::where('id', $id)->first();
        // ステータスを変更
        $item->status = $key;
        $item->save();
        // self::query()
        //     ->where('id', $id)
        //     ->update([
        //         'status' => 7
        //     ]);
    }
}
