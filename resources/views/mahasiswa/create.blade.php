@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Form Mahasiswa</div>

                <div class="panel-body">
                    {!! Form::open(['method' => 'POST', 'route' => 'mahasiswa.store']) !!}
                        <div class="form-group{{ $errors->has('nim') ? ' has-error' : '' }}">
                            {!! Form::label('nim', 'Nim') !!}
                            {!! Form::text('nim', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('nim') }}</small>
                        </div>      

                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            {!! Form::label('nama', 'Nama Mahasiswa') !!}
                            {!! Form::text('nama', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('nama') }}</small>
                        </div>

                        <div class="form-group{{ $errors->has('provinsi') ? ' has-error' : '' }}">
                            <label for="provinsi">Provinsi</label>
                            <select name="provinsi" id="provinsi" class="form-control" required="required">
                                <option value="">Pilih Provinsi</option>
                                @foreach ($daerahs as $daerah)
                                    <option name="provinsi" value="{{ $daerah->lokasi_nama }}" id="{{ $daerah->lokasi_propinsi }}">{{ $daerah->lokasi_nama }}</option>
                                @endforeach
                            </select>
                            <small class="text-danger">{{ $errors->first('provinsi') }}</small>
                        </div>
                        
                        <div class="form-group{{ $errors->has('kabupatenkota') ? ' has-error' : '' }}">
                            <label for="kabupatenkota">Kabupaten/Kota</label>
                            <select name="kabupatenkota" id="kabupatenkota" class="form-control" required="required">
                                <option value="">Pilih Kabupaten/Kota</option>
                            </select>
                            <small class="text-danger">{{ $errors->first('kabupatenkota') }}</small>
                        </div>
                        
                        <div class="form-group{{ $errors->has('kecamatan') ? ' has-error' : '' }}">
                            <label for="kecamatan">Kecamatan</label>
                            <select name="kecamatan" id="kecamatan" class="form-control" required="required">
                                <option value="">Pilih Kecamatan</option>
                            </select>
                            <small class="text-danger">{{ $errors->first('kecamatan') }}</small>
                        </div>
                        
                        <div class="form-group{{ $errors->has('kelurahan') ? ' has-error' : '' }}">
                            <label for="kecamatan">Kelurahan</label>
                            <select name="kelurahan" id="kelurahan" class="form-control" required="required">
                                <option value="">Pilih Kelurahan</option>
                            </select>
                            <small class="text-danger">{{ $errors->first('kelurahan') }}</small>
                        </div>
                    
                        {!! Form::submit("Tambah Data", ['class' => 'btn btn-primary pull-right']) !!}
                    
                    {!! Form::close() !!}                        

                </div>

            </div>
        </div>
    </div>
</div>
@endsection


@section('script')

    <script type="text/javascript">
        $(document).ready(function(){
            var url = $('meta[name="url"]').attr('content');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#provinsi').change(function(){
                var id = $(this).children(":selected").attr("id");
                $.ajax({
                    url: url + '/daerah/kabupatenkota/' + id,
                    type: 'GET',
                    success: function(val) {
                        $('#kabupatenkota').html(val);
                    }
                });
            });

            $('#kabupatenkota').change(function(){
                var id = $(this).children(":selected").attr("id");
                $.ajax({
                    url: url + '/daerah/kecamatan/' + id,
                    type: 'GET',
                    success: function(val) {
                        $('#kecamatan').html(val);
                    }
                });
            });

            $('#kecamatan').change(function(){
                var id = $(this).children(":selected").attr("id");
                $.ajax({
                    url: url + '/daerah/kelurahan/' + id,
                    type: 'GET',
                    success: function(val) {
                        $('#kelurahan').html(val);
                    }
                });
            });

        });
    </script>
@stop