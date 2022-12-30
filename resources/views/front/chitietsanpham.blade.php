@extends('front.master')

<style>
    /*****************globals*************/
    body {
        font-family: 'open sans';
        overflow-x: hidden;
    }

    img {
        max-width: 100%;
    }

    .preview {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
    }

    @media screen and (max-width: 996px) {
        .preview {
            margin-bottom: 20px;
        }
    }

    .preview-pic {
        -webkit-box-flex: 1;
        -webkit-flex-grow: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
    }

    .preview-thumbnail.nav-tabs {
        border: none;
        margin-top: 15px;
    }

    .preview-thumbnail.nav-tabs li {
        width: 18%;
        margin-right: 2.5%;
    }

    .preview-thumbnail.nav-tabs li img {
        max-width: 100%;
        display: block;
    }

    .preview-thumbnail.nav-tabs li a {
        padding: 0;
        margin: 0;
    }

    .preview-thumbnail.nav-tabs li:last-of-type {
        margin-right: 0;
    }

    .tab-content {
        overflow: hidden;
    }

    .tab-content img {
        width: 100%;
        -webkit-animation-name: opacity;
        animation-name: opacity;
        -webkit-animation-duration: .3s;
        animation-duration: .3s;
    }

    .card {
        margin-top: 50px;
        background: #eee;
        padding: 3em;
        line-height: 1.5em;
    }

    @media screen and (min-width: 997px) {
        .wrapper {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
        }
    }

    .details {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
    }

    .colors {
        -webkit-box-flex: 1;
        -webkit-flex-grow: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
    }

    .product-title,
    .price,
    .sizes,
    .colors {
        text-transform: UPPERCASE;
        font-weight: bold;
    }

    .checked,
    .price span {
        color: #ff9f1a;
    }

    .product-title,
    .rating,
    .product-description,
    .price,
    .vote,
    .sizes {
        margin-bottom: 15px;
    }

    .product-title {
        margin-top: 0;
    }

    .size {
        margin-right: 10px;
    }

    .size:first-of-type {
        margin-left: 40px;
    }

    .color {
        display: inline-block;
        vertical-align: middle;
        margin-right: 10px;
        height: 2em;
        width: 2em;
        border-radius: 2px;
    }

    .color:first-of-type {
        margin-left: 20px;
    }

    .add-to-cart,
    .like {
        background: #ff9f1a;
        padding: 1.2em 1.5em;
        border: none;
        text-transform: UPPERCASE;
        font-weight: bold;
        color: #fff;
        -webkit-transition: background .3s ease;
        transition: background .3s ease;
    }

    .add-to-cart:hover,
    .like:hover {
        background: #b36800;
        color: #fff;
    }

    .not-available {
        text-align: center;
        line-height: 2em;
    }

    .not-available:before {
        font-family: fontawesome;
        content: "\f00d";
        color: #fff;
    }

    .orange {
        background: #ff9f1a;
    }

    .green {
        background: #85ad00;
    }

    .blue {
        background: #0076ad;
    }

    .tooltip-inner {
        padding: 1.3em;
    }

    @-webkit-keyframes opacity {
        0% {
            opacity: 0;
            -webkit-transform: scale(3);
            transform: scale(3);
        }

        100% {
            opacity: 1;
            -webkit-transform: scale(1);
            transform: scale(1);
        }
    }

    @keyframes opacity {
        0% {
            opacity: 0;
            -webkit-transform: scale(3);
            transform: scale(3);
        }

        100% {
            opacity: 1;
            -webkit-transform: scale(1);
            transform: scale(1);
        }
    }

    /*# sourceMappingURL=style.css.map */

    /* css form bình luần đánh giá*/
    body {
        margin-top: 20px;
        background: #eee;
    }

    .review-list ul li .left span {
        width: 32px;
        height: 32px;
        display: inline-block;
    }

    .review-list ul li .left {
        flex: none;
        max-width: none;
        margin: 0 10px 0 0;
    }

    .review-list ul li .left span img {
        border-radius: 50%;
    }

    .review-list ul li .right h4 {
        font-size: 16px;
        margin: 0;
        display: flex;
    }

    .review-list ul li .right h4 .gig-rating {
        display: flex;
        align-items: center;
        margin-left: 10px;
        color: #ffbf00;
    }

    .review-list ul li .right h4 .gig-rating svg {
        margin: 0 4px 0 0px;
    }

    .country .country-flag {
        width: 16px;
        height: 16px;
        vertical-align: text-bottom;
        margin: 0 7px 0 0px;
        border: 1px solid #fff;
        border-radius: 50px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
    }

    .country .country-name {
        color: #95979d;
        font-size: 13px;
        font-weight: 600;
    }

    .review-list ul li {
        border-bottom: 1px solid #dadbdd;
        padding: 0 0 30px;
        margin: 0 0 30px;
    }

    .review-list ul li .right {
        flex: auto;
    }

    .review-list ul li .review-description {
        margin: 20px 0 0;
    }

    .review-list ul li .review-description p {
        font-size: 14px;
        margin: 0;
    }

    .review-list ul li .publish {
        font-size: 13px;
        color: #95979d;
    }

    .review-section h4 {
        font-size: 20px;
        color: #222325;
        font-weight: 700;
    }

    .review-section .stars-counters tr .stars-filter.fit-button {
        padding: 6px;
        border: none;
        color: #4a73e8;
        text-align: left;
    }

    .review-section .fit-progressbar-bar .fit-progressbar-background {
        position: relative;
        height: 8px;
        background: #efeff0;
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        background-color: #ffffff;
        ;
        border-radius: 999px;
    }

    .review-section .stars-counters tr .star-progress-bar .progress-fill {
        background-color: #ffb33e;
    }

    .review-section .fit-progressbar-bar .progress-fill {
        background: #2cdd9b;
        background-color: rgb(29, 191, 115);
        height: 100%;
        position: absolute;
        left: 0;
        z-index: 1;
        border-radius: 999px;
    }

    .review-section .fit-progressbar-bar {
        display: flex;
        align-items: center;
    }

    .review-section .stars-counters td {
        white-space: nowrap;
    }

    .review-section .stars-counters tr .progress-bar-container {
        width: 100%;
        padding: 0 10px 0 6px;
        margin: auto;
    }

    .ranking h6 {
        font-weight: 600;
        padding-bottom: 16px;
    }

    .ranking li {
        display: flex;
        justify-content: space-between;
        color: #95979d;
        padding-bottom: 8px;
    }

    .review-section .stars-counters td.star-num {
        color: #4a73e8;
    }

    .ranking li>span {
        color: #62646a;
        white-space: nowrap;
        margin-left: 12px;
    }

    .review-section {
        border-bottom: 1px solid #dadbdd;
        padding-bottom: 24px;
        margin-bottom: 34px;
        padding-top: 64px;
    }

    .review-section select,
    .review-section .select2-container {
        width: 188px !important;
        border-radius: 3px;
    }

    ul,
    ul li {
        list-style: none;
        margin: 0px;
    }

    .helpful-thumbs,
    .helpful-thumb {
        display: flex;
        align-items: center;
        font-weight: 700;
    }

    /* Đánh giá sản phẩm */

    .animated {
        -webkit-transition: height 0.2s;
        -moz-transition: height 0.2s;
        transition: height 0.2s;
    }

    .stars {
        margin: 20px 0;
        font-size: 24px;
        color: #d17581;
    }

    .starrating>input {
        display: none;
    }

    /* Remove radio buttons */

    .starrating>label:before {
        content: "\f005";
        /* Star */
        margin: 2px;
        font-size: 2em;
        font-family: FontAwesome;
        display: inline-block;
    }

    .starrating>label {
        color: #222222;
        /* Start color when not clicked */
    }

    .starrating>input:checked~label {
        color: #ffca08;
    }

    /* Set yellow color when star checked */

    .starrating>input:hover~label {
        color: #ffca08;
    }

    /* Set yellow color when star hover */
</style>
@section('content')
    <div class="container">
        <div class="card">
            <form action="{{ route('muasanpham',['id' => $sanpham[0]->idsp]) }}" method="GET">
                <div class="container-fliud">
                    <div class="wrapper row">
                        @include('error.error')
                        <div class="preview col-md-6">
                            <div class="preview-pic tab-content">
                                <div class="tab-pane active" id="pic-1"><img src="{{ asset($sanpham[0]->anh) }}" /></div>
                                <div class="tab-pane" id="pic-2"><img src="" /></div>
                                <div class="tab-pane" id="pic-3"><img src="{{ asset($sanpham[0]->anh) }}" /></div>
                                <div class="tab-pane" id="pic-4"><img src="{{ asset($sanpham[0]->anh) }}" /></div>
                                <div class="tab-pane" id="pic-5"><img src="{{ asset($sanpham[0]->anh) }}" /></div>
                            </div>
                            <ul class="preview-thumbnail nav nav-tabs">
                                <li class="active"><a data-target="#pic-1" data-toggle="tab"><img style="height: 100px"
                                            src="https://i.imgur.com/oM1HOBx.png" /></a></li>
                                <li><a data-target="#pic-2" data-toggle="tab"><img style="height: 100px"
                                            src="https://file.hstatic.net/200000053174/file/bang-quy-doi-cua-biluxury-de-chon-size-sao-cho-phu-hop-voi-co-the-1_0ac415feee384c1bad58c38ea8ce654b.png" /></a>
                                </li>
                                <li><a data-target="#pic-3" data-toggle="tab"><img style="height: 100px"
                                            src="https://minsu.com.vn/wp-content/uploads/2020/05/Huong-dan-chon-size-giay.png" /></a>
                                </li>
                                <li><a data-target="#pic-4" data-toggle="tab"><img style="height: 100px"
                                            src="https://www.dongphucthienphuoc.vn/wp-content/uploads/2021/03/bang-size-ao-so-mi-theo-so-do-3-vong.jpg" /></a>
                                </li>
                                <li><a data-target="#pic-5" data-toggle="tab"><img
                                            style="height: 100px"src="https://file.hstatic.net/200000053174/file/bang-quy-doi-size-quan-nam-danh-cho-quan-short-kaki-jeans-1_9f005a7a8c114524bc58806ddcfd083f.png" /></a>
                                </li>
                            </ul>

                        </div>
                        <div class="details col-md-6">
                            <h3 class="product-title">{{ $sanpham[0]->tensp }}</h3>
                            <div class="rating">
                                <div class="stars">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                                <span class="review-no">{{ $sodanhgia }} reviews</span>
                            </div>
                            <p class="product-description">{!! $sanpham[0]->mota !!}</p>
                            <h4 class="price">current price: <span>{{ number_format($sanpham[0]->gia) }}</span> VNĐ</h4>
                            <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87
                                    votes)</strong>
                            </p>
                            <h5 class="">color:
                                <select name="color" id="" class="form-control-sm" style="width: 20%">
                                    @foreach ($color as $id => $value)
                                        <option value="{{ $value }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </h5>
                            <h5 class="">Size :
                                <select name="size" id="" class="form-control-sm" style="width: 20%">
                                    @foreach ($size as $id => $value)
                                        <option value="{{ $value }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </h5>
                            <h5>
                            </h5>
                            <h5>Số lượng:
                                <input type="number" name="soluong" min="1" value="1" class="form-control-lg"
                                    style="width: 20%">
                            </h5>
                            <div class="action">
                                <button class="add-to-cart btn btn-outline-secondary" type="submit">Mua ngay</button>
                                {{-- <a class="add-to-cart btn  btn btn-default"
                                    href="{{ route('addToCart', ['id' => $sanpham[0]->idsp]) }}" >Thêm vào giỏ hàng</a> --}}
                                <input type="submit" class="add-to-cart btn btn btn-default" name="giohang" value="Thêm vào giỏ hàng" >
                                <a class="like btn btn-default" href="{{ route('like', ['id' => $sanpham[0]->idsp]) }}"><span class="fa fa-heart" ></span></a>
                            </div>
                            <br>
                            <h5>Thông tin sản phẩm</h5>
                            <li>Sản phẩm các nhiều size phù hợp với phù hợp hầu hết các chiều cao cân nặng của mọi người</li>
                            <li>Sản phẩm có chất vải đẹp giá rẻ phù với học sinh sinh viên</li>
                        </div>
                        
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="container">
        <div id="reviews" class="review-section">
            {{-- <div class="d-flex align-items-center justify-content-between mb-4">
                <h4 class="m-0">37 Reviews</h4>
                <select class="custom-select custom-select-sm border-0 shadow-sm ml-2 select2-hidden-accessible"
                    data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option data-select2-id="3">Most Relevant</option>
                    <option>Most Recent</option>
                </select>
                <span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="2"
                    style="width: 188px;">
                    <span class="selection">
                        <span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true"
                            aria-expanded="false" tabindex="0" aria-labelledby="select2-qd66-container">
                            <span class="select2-selection__rendered" id="select2-qd66-container" role="textbox"
                                aria-readonly="true" title="Most Relevant">Most Relevant</span>
                            <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span>
                        </span>
                    </span>
                    <span class="dropdown-wrapper" aria-hidden="true"></span>
                </span>
            </div> --}}
            {{-- 
      form đánh giá sản phẩm --}}



            <div class="row">
                <div class="col-md-6">
                    <div class="container">
                        <h3>Đánh giá chất lượng sản phẩm</h3>
                        <form action="{{ route('adminreview.update', ['review' => $sanpham[0]->masp]) }}" method="POST">
                            @method('PUt')
                            @csrf
                            <div class="starrating risingstar d-flex justify-content-end flex-row-reverse">
                                <input type="radio" id="star5" name="rating" value="5" /><label for="star5"
                                    title="5 star">5</label>
                                <input type="radio" id="star4" name="rating" value="4" /><label
                                    for="star4" title="4 star">4</label>
                                <input type="radio" id="star3" name="rating" value="3" /><label
                                    for="star3" title="3 star">3</label>
                                <input type="radio" id="star2" name="rating" value="2" /><label
                                    for="star2" title="2 star">2</label>
                                <input type="radio" id="star1" name="rating" value="1" /><label
                                    for="star1" title="1 star">1</label>
                            </div>
                            <textarea name="review" style="width: 50%" id="" placeholder="Đanh giá sản phẩm"> </textarea><br><br>
                            <div style="margin-left: 15.2%">
                                <input type="reset" name="reset" class="btn btn-outline-warning"
                                    value="Xóa đánh giá">
                                <button type="submit" class="btn btn-outline-secondary">Đánh giá</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <table class="stars-counters">
                        <tbody>
                            <tr class="">
                                <td>
                                    <span>
                                        <button
                                            class="fit-button fit-button-color-blue fit-button-fill-ghost fit-button-size-medium stars-filter">5
                                            Stars</button>
                                    </span>
                                </td>
                                @php
                                    $one = 0; $rate1 = 0;
                                    $two = 0;   $rate2 = 0;
                                    $three = 0; $rate3 = 0;
                                    $four = 0;  $rate4 = 0;
                                    $five = 0;  $rate5 = 0;
                                    foreach ($reviews as $review) {
                                        switch ($review->danhgia) {
                                            case '1':
                                                $one++;
                                                $rate1 += $review->danhgia;
                                                break;
                                            case '2':
                                                $two++;
                                                $rate2 += $review->danhgia;
                                                break;
                                            case '3':
                                                $three++;
                                                $rate3 += $review->danhgia;
                                                break;
                                            case '4':
                                               $four++;
                                               $rate4 += $review->danhgia;
                                                break;
                                            case '5':
                                                $five++;
                                                $rate5 += $review->danhgia;
                                                break;
                                        }
                                    }
                                @endphp
                                <td class="progress-bar-container">
                                    <div class="fit-progressbar fit-progressbar-bar star-progress-bar">
                                        <div class="fit-progressbar-background">
                                            <span class="progress-fill" style="width: {{($five*100)/$total}}%;"></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="star-num">({{$five}})</td>
                            </tr>
                            <tr class="">
                                <td>
                                    <span>
                                        <button
                                            class="fit-button fit-button-color-blue fit-button-fill-ghost fit-button-size-medium stars-filter">4
                                            Stars</button>
                                    </span>
                                </td>
                                <td class="progress-bar-container">
                                    <div class="fit-progressbar fit-progressbar-bar star-progress-bar">
                                        <div class="fit-progressbar-background">
                                            <span class="progress-fill" style="width: {{($four*100)/$total}}%;"></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="star-num">({{$four}})</td>
                            </tr>
                            <tr class="">
                                <td>
                                    <span>
                                        <button
                                            class="fit-button fit-button-color-blue fit-button-fill-ghost fit-button-size-medium stars-filter">3
                                            Stars</button>
                                    </span>
                                </td>
                                <td class="progress-bar-container">
                                    <div class="fit-progressbar fit-progressbar-bar star-progress-bar">
                                        <div class="fit-progressbar-background">
                                            <span class="progress-fill" style="width:  {{($three*100)/$total}}%;"></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="star-num">({{$three}})</td>
                            </tr>
                            <tr class="">
                                <td>
                                    <span>
                                        <button
                                            class="fit-button fit-button-color-blue fit-button-fill-ghost fit-button-size-medium stars-filter">2
                                            Stars</button>
                                    </span>
                                </td>
                                <td class="progress-bar-container">
                                    <div class="fit-progressbar fit-progressbar-bar star-progress-bar">
                                        <div class="fit-progressbar-background">
                                            <span class="progress-fill" style="width:  {{($two*100)/$total}}%;"></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="star-num">({{$two}})</td>
                            </tr>
                            <tr class="">
                                <td>
                                    <span>
                                        <button
                                            class="fit-button fit-button-color-blue fit-button-fill-ghost fit-button-size-medium stars-filter">1
                                            Stars</button>
                                    </span>
                                </td>
                                <td class="progress-bar-container">
                                    <div class="fit-progressbar fit-progressbar-bar star-progress-bar">
                                        <div class="fit-progressbar-background">
                                            <span class="progress-fill" style="width:  {{($one*100)/$total}}%;"></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="star-num">({{$one}})</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="review-list" style="margin-left: 5% ">
        <ul>
            <li>
                <h3>Các đánh giá của khách hàng</h3>
                @foreach ($reviews as $id => $review)
                    <div class="d-flex">
                        <div class="left">
                            <span>
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                    class="profile-pict-img img-fluid" alt="" />
                            </span>
                        </div>
                        <div class="right">
                            <h4>
                                {{ $ten[$review->user_id] }}
                                <span class="gig-rating text-body-2">
                                    {{ $review->danhgia . '.0' }}
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15"
                                        height="15">

                                        @for ($i = 1; $i <= $review->danhgia; $i++)
                                            <span class="fa fa-star checked"></span>
                                        @endfor
                                        @for ($i = $review->danhgia; $i < 5; $i++)
                                            <span class="fa-regular fa-star"></span>
                                        @endfor
                                    </svg>

                                </span>
                            </h4>
                            {{-- <div class="country d-flex align-items-center">
                            <span>
                                <img class="country-flag img-fluid"
                                    src="https://bootdey.com/img/Content/avatar/avatar6.png" />
                            </span>
                            <div class="country-name font-accent">India</div>
                        </div>  --}}
                            <div class="review-description">
                                <p>
                                    {{ $review->binhluan == null ? 'Khách hàng không có phản hồi' : $review->binhluan }}
                                </p>

                            </div>
                            <span
                                class="publish py-3 d-inline-block w-100">{{ $review->updated_at != null ? $review->updated_at : $review->created_at }}</span>
                            {{-- <div class="helpful-thumbs">
                            <div class="helpful-thumb text-body-2">
                                <span class="fit-icon thumbs-icon">
                                    <svg width="14" height="14" viewBox="0 0 14 14"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.5804 7.81165C13.8519 7.45962 14 7 14 6.43858C14 5.40843 13.123 4.45422 12.0114 4.45422H10.0932C10.3316 3.97931 10.6591 3.39024 10.6591 2.54516C10.6591 0.948063 10.022 0 8.39207 0C7.57189 0 7.26753 1.03682 7.11159 1.83827C7.01843 2.31708 6.93041 2.76938 6.65973 3.04005C6.01524 3.68457 5.03125 5.25 4.44013 5.56787C4.38028 5.59308 4.3038 5.61293 4.22051 5.62866C4.06265 5.39995 3.79889 5.25 3.5 5.25H0.875C0.391754 5.25 0 5.64175 0 6.125V13.125C0 13.6082 0.391754 14 0.875 14H3.5C3.98325 14 4.375 13.6082 4.375 13.125V12.886C5.26354 12.886 7.12816 14.0002 9.22728 13.9996C9.37781 13.9997 10.2568 14.0004 10.3487 13.9996C11.9697 14 12.8713 13.0183 12.8188 11.5443C13.2325 11.0596 13.4351 10.3593 13.3172 9.70944C13.6578 9.17552 13.7308 8.42237 13.5804 7.81165ZM0.875 13.125V6.125H3.5V13.125H0.875ZM12.4692 7.5565C12.9062 7.875 12.9062 9.1875 12.3159 9.48875C12.6856 10.1111 12.3529 10.9439 11.9053 11.1839C12.1321 12.6206 11.3869 13.1146 10.3409 13.1246C10.2504 13.1255 9.32247 13.1246 9.22731 13.1246C7.23316 13.1246 5.54296 12.011 4.37503 12.011V6.44287C5.40611 6.44287 6.35212 4.58516 7.27847 3.65879C8.11368 2.82357 7.83527 1.43153 8.3921 0.874727C9.78414 0.874727 9.78414 1.84589 9.78414 2.54518C9.78414 3.69879 8.94893 4.21561 8.94893 5.32924H12.0114C12.6329 5.32924 13.1223 5.88607 13.125 6.44287C13.1277 6.99967 12.9062 7.4375 12.4692 7.5565ZM2.84375 11.8125C2.84375 12.1749 2.54994 12.4688 2.1875 12.4688C1.82506 12.4688 1.53125 12.1749 1.53125 11.8125C1.53125 11.4501 1.82506 11.1562 2.1875 11.1562C2.54994 11.1562 2.84375 11.4501 2.84375 11.8125Z">
                                        </path>
                                    </svg>
                                </span>
                                <span class="thumb-title">Helpful</span>
                            </div>
                            <div class="helpful-thumb text-body-2 ml-3">
                                <span class="fit-icon thumbs-icon">
                                    <svg width="14" height="14" viewBox="0 0 14 14"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0.419563 6.18835C0.148122 6.54038 6.11959e-07 7 5.62878e-07 7.56142C2.81294e-05 8.59157 0.876996 9.54578 1.98863 9.54578L3.90679 9.54578C3.66836 10.0207 3.34091 10.6098 3.34091 11.4548C3.34089 13.0519 3.97802 14 5.60793 14C6.42811 14 6.73247 12.9632 6.88841 12.1617C6.98157 11.6829 7.06959 11.2306 7.34027 10.9599C7.98476 10.3154 8.96875 8.75 9.55987 8.43213C9.61972 8.40692 9.6962 8.38707 9.77949 8.37134C9.93735 8.60005 10.2011 8.75 10.5 8.75L13.125 8.75C13.6082 8.75 14 8.35825 14 7.875L14 0.875C14 0.391754 13.6082 -3.42482e-08 13.125 -7.64949e-08L10.5 -3.0598e-07C10.0168 -3.48226e-07 9.625 0.391754 9.625 0.875L9.625 1.11398C8.73647 1.11398 6.87184 -0.000191358 4.77272 0.00038257C4.62219 0.000300541 3.74322 -0.000438633 3.65127 0.000382472C2.03027 -1.04643e-06 1.12867 0.981667 1.18117 2.45566C0.76754 2.94038 0.564868 3.64065 0.682829 4.29056C0.342234 4.82448 0.269227 5.57763 0.419563 6.18835ZM13.125 0.875L13.125 7.875L10.5 7.875L10.5 0.875L13.125 0.875ZM1.53079 6.4435C1.09375 6.125 1.09375 4.8125 1.6841 4.51125C1.31436 3.88891 1.64713 3.05613 2.09467 2.81605C1.86791 1.37941 2.61313 0.885417 3.65906 0.875355C3.74962 0.874535 4.67753 0.875355 4.77269 0.875355C6.76684 0.875355 8.45704 1.98898 9.62497 1.98898L9.62497 7.55713C8.5939 7.55713 7.64788 9.41484 6.72153 10.3412C5.88632 11.1764 6.16473 12.5685 5.6079 13.1253C4.21586 13.1253 4.21586 12.1541 4.21586 11.4548C4.21586 10.3012 5.05107 9.78439 5.05107 8.67076L1.9886 8.67076C1.36708 8.67076 0.877707 8.11393 0.874973 7.55713C0.872266 7.00033 1.09375 6.5625 1.53079 6.4435ZM11.1563 2.1875C11.1563 1.82506 11.4501 1.53125 11.8125 1.53125C12.1749 1.53125 12.4688 1.82506 12.4688 2.1875C12.4688 2.54994 12.1749 2.84375 11.8125 2.84375C11.4501 2.84375 11.1563 2.54994 11.1563 2.1875Z">
                                        </path>
                                    </svg>
                                </span>
                                <span class="thumb-title">Not Helpful</span>
                            </div>
                        </div> --}}
                            {{-- <div class="response-item mt-4 d-flex">
                            <div class="left">
                                <span>
                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                        class="profile-pict-img img-fluid" alt="" />
                                </span>
                            </div>
                            <div class="right">
                                <h4>
                                    Gurdeep Osahan
                                    <span class="gig-rating text-body-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15"
                                            height="15">
                                            <path fill="currentColor"
                                                d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                                            </path>
                                        </svg>
                                        5.0
                                    </span>
                                </h4>
                                <div class="country d-flex align-items-center">
                                    <span>
                                        <img class="country-flag img-fluid"
                                            src="https://bootdey.com/img/Content/avatar/avatar3.png" />
                                    </span>
                                    <div class="country-name font-accent">India</div>
                                </div>
                                <div class="review-description">
                                    <p>
                                        The process was smooth, after providing the required info, Pragyesh sent me an
                                        outstanding packet of wireframes. Thank you a lot!
                                    </p>
                                </div>
                                <span class="publish py-3 d-inline-block w-100">Published 4 weeks ago</span>
                            </div>
                        </div> --}}
                        </div>
                    </div>
                @endforeach
            </li>
        </ul>
    </div>
    </div>

    <script>
        (function(e) {
            var t, o = {
                    className: "autosizejs",
                    append: "",
                    callback: !1,
                    resizeDelay: 10
                },
                i =
                '<textarea tabindex="-1" style="position:absolute; top:-999px; left:0; right:auto; bottom:auto; border:0; padding: 0; -moz-box-sizing:content-box; -webkit-box-sizing:content-box; box-sizing:content-box; word-wrap:break-word; height:0 !important; min-height:0 !important; overflow:hidden; transition:none; -webkit-transition:none; -moz-transition:none;"/>',
                n = ["fontFamily", "fontSize", "fontWeight", "fontStyle", "letterSpacing", "textTransform",
                    "wordSpacing", "textIndent"
                ],
                s = e(i).data("autosize", !0)[0];
            s.style.lineHeight = "99px", "99px" === e(s).css("lineHeight") && n.push("lineHeight"), s.style.lineHeight =
                "", e.fn.autosize = function(i) {
                    return this.length ? (i = e.extend({}, o, i || {}), s.parentNode !== document.body && e(document
                        .body).append(s), this.each(function() {
                        function o() {
                            var t, o;
                            "getComputedStyle" in window ? (t = window.getComputedStyle(u, null), o = u
                                    .getBoundingClientRect().width, e.each(["paddingLeft", "paddingRight",
                                        "borderLeftWidth", "borderRightWidth"
                                    ], function(e, i) {
                                        o -= parseInt(t[i], 10)
                                    }), s.style.width = o + "px") : s.style.width = Math.max(p.width(), 0) +
                                "px"
                        }

                        function a() {
                            var a = {};
                            if (t = u, s.className = i.className, d = parseInt(p.css("maxHeight"), 10), e
                                .each(n, function(e, t) {
                                    a[t] = p.css(t)
                                }), e(s).css(a), o(), window.chrome) {
                                var r = u.style.width;
                                u.style.width = "0px", u.offsetWidth, u.style.width = r
                            }
                        }

                        function r() {
                            var e, n;
                            t !== u ? a() : o(), s.value = u.value + i.append, s.style.overflowY = u.style
                                .overflowY, n = parseInt(u.style.height, 10), s.scrollTop = 0, s.scrollTop =
                                9e4, e = s.scrollTop, d && e > d ? (u.style.overflowY = "scroll", e = d) : (
                                    u.style.overflowY = "hidden", c > e && (e = c)), e += w, n !== e && (u
                                    .style.height = e + "px", f && i.callback.call(u, u))
                        }

                        function l() {
                            clearTimeout(h), h = setTimeout(function() {
                                var e = p.width();
                                e !== g && (g = e, r())
                            }, parseInt(i.resizeDelay, 10))
                        }
                        var d, c, h, u = this,
                            p = e(u),
                            w = 0,
                            f = e.isFunction(i.callback),
                            z = {
                                height: u.style.height,
                                overflow: u.style.overflow,
                                overflowY: u.style.overflowY,
                                wordWrap: u.style.wordWrap,
                                resize: u.style.resize
                            },
                            g = p.width();
                        p.data("autosize") || (p.data("autosize", !0), ("border-box" === p.css(
                                "box-sizing") || "border-box" === p.css("-moz-box-sizing") ||
                            "border-box" === p.css("-webkit-box-sizing")) && (w = p.outerHeight() -
                            p.height()), c = Math.max(parseInt(p.css("minHeight"), 10) - w || 0, p
                            .height()), p.css({
                            overflow: "hidden",
                            overflowY: "hidden",
                            wordWrap: "break-word",
                            resize: "none" === p.css("resize") || "vertical" === p.css(
                                "resize") ? "none" : "horizontal"
                        }), "onpropertychange" in u ? "oninput" in u ? p.on(
                            "input.autosize keyup.autosize", r) : p.on("propertychange.autosize",
                            function() {
                                "value" === event.propertyName && r()
                            }) : p.on("input.autosize", r), i.resizeDelay !== !1 && e(window).on(
                            "resize.autosize", l), p.on("autosize.resize", r), p.on(
                            "autosize.resizeIncludeStyle",
                            function() {
                                t = null, r()
                            }), p.on("autosize.destroy", function() {
                            t = null, clearTimeout(h), e(window).off("resize", l), p.off(
                                "autosize").off(".autosize").css(z).removeData("autosize")
                        }), r())
                    })) : this
                }
        })(window.jQuery || window.$);

        var __slice = [].slice;
        (function(e, t) {
            var n;
            n = function() {
                function t(t, n) {
                    var r, i, s, o = this;
                    this.options = e.extend({}, this.defaults, n);
                    this.$el = t;
                    s = this.defaults;
                    for (r in s) {
                        i = s[r];
                        if (this.$el.data(r) != null) {
                            this.options[r] = this.$el.data(r)
                        }
                    }
                    this.createStars();
                    this.syncRating();
                    this.$el.on("mouseover.starrr", "span", function(e) {
                        return o.syncRating(o.$el.find("span").index(e.currentTarget) + 1)
                    });
                    this.$el.on("mouseout.starrr", function() {
                        return o.syncRating()
                    });
                    this.$el.on("click.starrr", "span", function(e) {
                        return o.setRating(o.$el.find("span").index(e.currentTarget) + 1)
                    });
                    this.$el.on("starrr:change", this.options.change)
                }
                t.prototype.defaults = {
                    rating: void 0,
                    numStars: 5,
                    change: function(e, t) {}
                };
                t.prototype.createStars = function() {
                    var e, t, n;
                    n = [];
                    for (e = 1, t = this.options.numStars; 1 <= t ? e <= t : e >= t; 1 <= t ? e++ : e--) {
                        n.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"))
                    }
                    return n
                };
                t.prototype.setRating = function(e) {
                    if (this.options.rating === e) {
                        e = void 0
                    }
                    this.options.rating = e;
                    this.syncRating();
                    return this.$el.trigger("starrr:change", e)
                };
                t.prototype.syncRating = function(e) {
                    var t, n, r, i;
                    e || (e = this.options.rating);
                    if (e) {
                        for (t = n = 0, i = e - 1; 0 <= i ? n <= i : n >= i; t = 0 <= i ? ++n : --n) {
                            this.$el.find("span").eq(t).removeClass("glyphicon-star-empty").addClass(
                                "glyphicon-star")
                        }
                    }
                    if (e && e < 5) {
                        for (t = r = e; e <= 4 ? r <= 4 : r >= 4; t = e <= 4 ? ++r : --r) {
                            this.$el.find("span").eq(t).removeClass("glyphicon-star").addClass(
                                "glyphicon-star-empty")
                        }
                    }
                    if (!e) {
                        return this.$el.find("span").removeClass("glyphicon-star").addClass(
                            "glyphicon-star-empty")
                    }
                };
                return t
            }();
            return e.fn.extend({
                starrr: function() {
                    var t, r;
                    r = arguments[0], t = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
                    return this.each(function() {
                        var i;
                        i = e(this).data("star-rating");
                        if (!i) {
                            e(this).data("star-rating", i = new n(e(this), r))
                        }
                        if (typeof r === "string") {
                            return i[r].apply(i, t)
                        }
                    })
                }
            })
        })(window.jQuery, window);
        $(function() {
            return $(".starrr").starrr()
        })

        $(function() {

            $('#new-review').autosize({
                append: "\n"
            });

            var reviewBox = $('#post-review-box');
            var newReview = $('#new-review');
            var openReviewBtn = $('#open-review-box');
            var closeReviewBtn = $('#close-review-box');
            var ratingsField = $('#ratings-hidden');

            openReviewBtn.click(function(e) {
                reviewBox.slideDown(400, function() {
                    $('#new-review').trigger('autosize.resize');
                    newReview.focus();
                });
                openReviewBtn.fadeOut(100);
                closeReviewBtn.show();
            });

            closeReviewBtn.click(function(e) {
                e.preventDefault();
                reviewBox.slideUp(300, function() {
                    newReview.focus();
                    openReviewBtn.fadeIn(200);
                });
                closeReviewBtn.hide();

            });

            $('.starrr').on('starrr:change', function(e, value) {
                ratingsField.val(value);
            });
        });
    </script>
@endsection
