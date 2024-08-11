<form action="{{ route('namelist.store') }}" enctype="multipart/form-data"  method="POST">
    @csrf
    <input type="file" name="file" >
    <button>Submit</button>
</form>
