<div class="row">
    @include('util.errors')

    <div class="col-sm-4">
        <div class="form-group">
            <label for="model"><span class="required">*</span> Modelo:</label>
            <input type="text" id="model" name="model" class="form-control" placeholder="Modelo" value="{{ old('model', $car->model ?? '') }}">
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            <label for="id_brand"><span class="required">*</span> Marca:</label>
            <select id="id_brand" name="id_brand" class="form-control">
                <option value="" selected="">Nehuma Marca</option>
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}" {{ (old('id_brand', $car->id_brand ?? '') ?? '') == $brand->id ? 'selected="selected"' : '' }}>{{ $brand->brand }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            <label for="id_color"><span class="required">*</span> Cor:</label>
            <select id="id_color" name="id_color" class="form-control">
                <option value="" selected="">Nehuma Cor</option>
                @foreach($colors as $color)
                    <option value="{{ $color->id }}" {{ (old('id_color', $car->id_color ?? '') ?? '') == $color->id ? 'selected="selected"' : '' }}>{{ $color->color }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            <label for="year"><span class="required">*</span> Ano:</label>
            <input type="number" id="year" name="year" step="1" min="0" class="form-control" placeholder="Ano" value="{{ old('year', $car->year ?? '') }}">
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            <label for="price"><span class="required">*</span> Preço:</label>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">R$</span>
                <input type="number" id="price" name="price" step="0.01" min="0" class="form-control" placeholder="Preço" value="{{ old('price', $car->price ?? '') }}">
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            <label for="showcase"><span class="required">*</span> Vitrine:</label>
            <select id="showcase" name="showcase" class="form-control">
                <option value="" selected="" disabled="">Selecione 1 Opção</option>
                <option value="1" {{ (old('showcase', $car->showcase ?? '') ?? '') == 1 ? 'selected="selected"' : '' }}>Sim</option>
                <option value="0" {{ (old('showcase', $car->showcase ?? '') ?? '') == 0 ? 'selected="selected"' : '' }}>Não</option>
            </select>
        </div>
    </div>
</div>
