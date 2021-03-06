@extends('master')
@section('Content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">{{$type->name}}</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="index.html">Home</a> / <span>Sản phẩm</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-3">
                        <ul class="aside-menu">
                            @foreach($other_type as $loaisp_khac)
                            <li><a href="{{route('loaisanpham',$loaisp_khac->id)}}">{{$loaisp_khac->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-sm-9">
                        <div class="beta-products-list">
                            <h4>{{$type->name}}</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy {{count($product_type)}} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>

                            <div class="row">
                                @foreach($product_type as $sp_l)
                                <div class="col-sm-4">
                                    <div class="single-item">
                                        @if($sp_l->promotion_price != 0)
                                            <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                        @endif
                                        <div class="single-item-header">
                                            <a href="product.html"><img style="height:320px;width:270px" src="source/image/product/{{$sp_l->image}}" alt=""></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{$sp_l->name}}</p>
                                            <p class="single-item-price">
                                                @if($sp_l->promotion_price == 0)
                                                    <span class="flash-sale">{{number_format($sp_l->unit_price,0,",",".")}} đ</span>
                                                @else
                                                    <span class="flash-del">{{number_format($sp_l->unit_price,0,",",".")}} đ</span>
                                                    <span class="flash-sale">{{number_format($sp_l->promotion_price,0,",",".")}} đ</span>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                 @endforeach
                                <div class="row">{{$product_type->links()}}</div>

                            </div>
                        </div> <!-- .beta-products-list -->

                        <div class="space50">&nbsp;</div>

                        <div class="beta-products-list">
                            <h4>Sản phẩm khác</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy {{count($other_product)}} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                @foreach($other_product as $sp_khac)
                                <div class="col-sm-4">
                                    <div class="single-item">
                                        @if($sp_khac->promotion_price != 0)
                                            <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                        @endif
                                        <div class="single-item-header">
                                            <a href="product.html"><img style="height:320px;width:270px" src="source/image/product/{{$sp_khac->image}}" alt=""></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{$sp_khac->name}}</p>
                                            <p class="single-item-price">
                                                @if($sp_khac->promotion_price==0)
                                                    <span class="flash-sale">{{number_format($sp_khac->unit_price,0,",",".")}} đ</span>
                                                @else
                                                    <span class="flash-del">{{number_format($sp_khac->unit_price,0,",",".")}} đ</span>
                                                    <span class="flash-sale">{{number_format($sp_khac->promotion_price,0,",",".")}} đ</span>
                                                @endif

                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div class="row">{{$other_product->links()}}</div>
                            </div>
                            <div class="space40">&nbsp;</div>

                        </div> <!-- .beta-products-list -->
                    </div>
                </div> <!-- end section with sidebar and main content -->


            </div> <!-- .main-content -->
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection
