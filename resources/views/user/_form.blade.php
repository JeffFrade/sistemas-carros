<div class="row">
    @include('util.errors')

    <div class="col-md-4">
        <div class="form-group">
            <label for="name"><span class="required">*</span> Nome:</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Nome" value="{{ old('name', $user->name ?? '') }}">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="email"><span class="required">*</span> E-mail:</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="E-mail" value="{{ old('email', $user->email ?? '') }}">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="password"><span class="required">*</span> Senha:</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Senha" value="{{ old('password', '') }}">
        </div>
    </div>
</div>
