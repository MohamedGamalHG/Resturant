@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            <button class="close" aria-hidden="true" onclick="this.parentElement.style.display='none'">x</button>
            <span>Dange {{$error}}</span>
        </div>
    @endforeach
@endif
