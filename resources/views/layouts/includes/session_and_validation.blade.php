<div class="col-md-12">
    @if ($errors->any())
        <div class="alert alert-danger">
            <p data-dismiss="alert" class="float-right">x</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<div class="col-md-12">
    @if(\Illuminate\Support\Facades\Session::get('sessionClass'))
        <div class="alert alert-{{ \Illuminate\Support\Facades\Session::get('sessionClass') }}" role="alert">
            <p data-dismiss="alert" class="float-right">x</p>
            {{ \Illuminate\Support\Facades\Session::get('sessionMessage')?\Illuminate\Support\Facades\Session::get('sessionMessage'):'' }}
        </div>
    @endif
</div>
