@if(Session::has('message_success'))
<script type="text/javascript">
   toastr.success('{{Session::get('message_success')}}')
</script>
@endif
@if(Session::has('message_fail'))
<script type="text/javascript">
   toastr.fail('{{Session::get('message_fail')}}')
</script>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
