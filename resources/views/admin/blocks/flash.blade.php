<div class="col-lg-12" id = "alert-div">
    @if (Session::has('flash_level'))
        <div class="{{ Session::get('flash_level') }}">
            {!! Session::get('flash_message') !!}
        </div>
    @endif
</div>