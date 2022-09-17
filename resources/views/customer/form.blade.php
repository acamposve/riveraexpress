<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $customer->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('NickName') }}
            {{ Form::text('NickName', $customer->NickName, ['class' => 'form-control' . ($errors->has('NickName') ? ' is-invalid' : ''), 'placeholder' => 'Nickname']) }}
            {!! $errors->first('NickName', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Contact') }}
            {{ Form::text('Contact', $customer->Contact, ['class' => 'form-control' . ($errors->has('Contact') ? ' is-invalid' : ''), 'placeholder' => 'Contact']) }}
            {!! $errors->first('Contact', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>