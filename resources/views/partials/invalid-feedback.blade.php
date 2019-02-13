<div class="invalid-feedback" style="display:block;">
        @if($errors->has($field))
       <p> {{$errors->get($field)[0]}} </p>
        @endif
    </div>