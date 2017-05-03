@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Form Daerah</div>

                <div class="panel-body">
                    <form action="" method="POST" role="form">                        
                        <select name="provinsi" id="provinsi" class="form-control" required="required">
                            <option value=""></option>
                        </select>
                        
                        <br>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>    
                </div>

            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
    <script type="text/javascript">
        
    </script>
@stop