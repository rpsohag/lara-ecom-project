@if(session()->has('error'))
<span class="alert alert-danger">
    <strong>{{ session()->get('error') }}</strong>
</span>
@endif
@if(session()->has('success'))
<span class="alert alert-success">
    <strong>{{ session()->get('success') }}</strong>
</span>
@endif