@if (isset($args['title']) || isset($args['input_title']))
<div class="newslatter-bx">
    <div class="container">
        <form action="" method="post" class="row m-lr0 align-items-center dezPlaceAni dzSubscribe">
            @csrf
            <div class="col-xl-6 col-lg-6 col-md-12">
                <div class="title-bx">
                    <h2 class="m-b0">{{ isset($args['title']) ? $args['title'] : '' }}</h2>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 contact-form-bx">
                <div class="form-group">
                    <div class="input-group">
                        <label>{{ isset($args['input_title']) ? $args['input_title'] : '' }}</label>
                        <input name="dzEmail" required="required" type="email" class="form-control" placeholder="">
                        <button name="submit" value="Submit" type="submit" class="btn-link">{{ isset($args['button_text']) ? $args['button_text'] : '' }}</button>
                    </div>
                    <div class="dzSubscribeMsg"></div>
                </div>
            </div>
        </form>
    </div>
</div>
@endif