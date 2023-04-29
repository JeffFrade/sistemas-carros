<div class="row">
    @include('util.errors')

    <div class="col-md-12">
        <div class="form-group">
            <label for="color"><span class="required">*</span> Cor:</label>
            <input type="text" id="color" name="color" class="form-control" placeholder="Cor" value="{{ old('color', $color->color ?? '') }}">
        </div>
    </div>
</div>
