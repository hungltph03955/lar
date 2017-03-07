<!-- <ul class = "error_msg">
	<li>loi1</li>
</ul>
 -->
@if (count($errors) > 0)
    <div class="error_msg">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif