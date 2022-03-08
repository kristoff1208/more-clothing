@extends('layouts.user')

{{-- タイトル・メタディスクリプション --}}
@section('title', '保管荷物 中身一覧 | モアクロ')
@section('description', '保管荷物 中身一覧')

{{-- CSS --}}
@push('css')
@endpush

{{-- 本文 --}}
@section('content')
<user-header-component
    title="保管荷物 中身一覧"
    back="/custody/box/"
    :csrf="{{json_encode(csrf_token())}}"
>
</user-header-component>
<section class="user__content">
    <div class="user__content__headline">
        <div class="user__content__headline__inner l-flex l-center l-v__center">
            <div class="headline__item__img">
                <img src="/img/icon_cardboard.png">
            </div>
            <div class="headline__item__info">
                <span class="item__date">{{ $box->created_at->format('Y-m-d') }}</span>
                <span class="item__date">{{ $box->received_at }}</span>
                <span class="item__number">{{ $box->number }}</span>
            </div>
        </div>
    </div>
    <div class="user__content__box">
        <div class="user__content__box__inner">
            <div class="user__content__box__list l-flex l-start">
                @if(count($items) > 0)
                    @foreach($items as $item)
                    @foreach($item_images as $item_image)
                    {{--  @if($item->status == 0)
                    <div class="user__content__box__item">
                    @elseif($item->status == 1)
                    <div class="user__content__box__item item-status item-status-sell">
                    @elseif($item->status == 2)
                    <div class="user__content__box__item item-status item-status-rental">
                    @elseif($item->status == 3)
                    <div class="user__content__box__item item-status item-status-rent">
                    @elseif($item->status == 7)
                    <div class="user__content__box__item item-status item-status-donate">
                    @elseif($item->status == 8)
                    <div class="user__content__box__item item-status item-status-sold">
                    @elseif($item->status == 9)
                    <div class="user__content__box__item item-status item-status-return">
                    @endif  --}}
                    <div class="user__content__box__item">
                        @if($item->status == 0 && $item->request == 1)<span class="item-label pink">リクエスト：販売出品</span>
                        @elseif($item->status == 0 && $item->request == 3)<span class="item-label pink">リクエスト：レンタル出品</span>
                        @elseif($item->status == 0 && $item->request == 5)<span class="item-label pink">リクエスト：返却</span>
                        @elseif($item->status == 1 && $item->request == 0)<span class="item-label blue">販売出品中</span>
                        @elseif($item->status == 1 && $item->request == 2)<span class="item-label pink">リクエスト：販売停止</span>
                        @elseif($item->status == 2 && $item->request == 0)<span class="item-label blue">レンタル出品中</span>
                        @elseif($item->status == 2 && $item->request == 4)<span class="item-label pink">リクエスト：レンタル停止</span>
                        @elseif($item->status == 3)<span class="item-label blue">レンタル貸出中</span>
                        @elseif($item->status == 7)<span class="item-label black">寄付済み</span>
                        @elseif($item->status == 8)<span class="item-label black">売却済み</span>
                        @elseif($item->status == 9)<span class="item-label black">返却済み</span>
                        @endif
                        <a href="{{ route('custody.item.detail', $item->id) }}">
                            <div class="item__img">
                                <div class="item__img__inner">
                                    <img src="{{ $item_image->url }}">
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                    @endforeach
                @else
                    <div class="user__content__box__item">
                        荷物の登録がありません。
                    </div>
                @endif
                 <!-- <div class="user__content__box__item item-status item-status-rental">
                    <a href="">
                        <div class="item__inner">
                            <img src="/img/home-service-three_3.png">
                        </div>
                    </a>
                </div>
                <div class="user__content__box__item">
                    <a href="">
                        <div class="item__inner">
                            <img src="/img/home-service-three_2.png">
                        </div>
                    </a>
                </div>
                <div class="user__content__box__item">
                    <a href="">
                        <div class="item__inner">
                            <img src="/img/home-service-three.jpg">
                        </div>
                    </a>
                </div>  -->
            </div>
        </div>
    </div>
</section>
@endsection
