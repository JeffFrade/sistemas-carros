<div class="row">
    @include('util.errors')

    <div class="col-md-12">
        <div class="form-group">
            <label for="brand"><span class="required">*</span> Marca:</label>
            <input type="text" id="brand" name="brand" class="form-control" placeholder="Marca" value="{{ old('brand', $brand->brand ?? '') }}">
        </div>
    </div>
</div>
