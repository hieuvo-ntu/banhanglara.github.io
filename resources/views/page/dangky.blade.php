@extends('master')
@section('Content')

</div> <!-- #header -->
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đăng kí</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="index.html">Home</a> / <span>Đăng kí</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">

        <form action="{{route('dangky')}}" method="post" class="beta-form-checkout">

            <div class="row">
                <div class="col-sm-3"></div>
                @if(count($errors)>0)
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                <div class="col-sm-6">
                    <h4>Đăng kí</h4>
                    <div class="space20">&nbsp;</div>


                    <div class="form-block">
                        <label for="email">Email*</label>
                        <input type="email" name="email" id="email" required>
                    </div>

                    <div class="form-block">
                        <label for="your_last_name">Tên đầy đủ*</label>
                        <input type="text" id="your_last_name" name="fullname" required>
                    </div>

                    <div class="form-block">
                        <label for="adress">Địa chỉ*</label>
                        <input type="text" id="adress" value="Street Address" name="address" required>
                    </div>


                    <div class="form-block">
                        <label for="phone">Điện thoại*</label>
                        <input type="text" id="phone" name="phone" required>
                    </div>
                    <div class="form-block">
                        <label for="phone">Mật khẩu*</label>
                        <input type="password" id="phone" name="password" required>
                    </div>
                    <div class="form-block">
                        <label for="phone">Nhập lại mật khẩu*</label>
                        <input type="password" id="phone" name="re_password" required>
                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary" name="submit">Đăng ký</button>
                        <input name="_token" type="hidden" value="{{ csrf_token() }}" />

                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->


@endsection