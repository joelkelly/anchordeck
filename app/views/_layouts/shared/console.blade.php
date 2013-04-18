@if(Session::has('error'))
    <div class="error">{{Session::get('error');}}</div>
@endif