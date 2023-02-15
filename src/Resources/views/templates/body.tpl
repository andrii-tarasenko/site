<div class="alert alert-success" style="display:none;">{$successMessage}</div>
<div class="alert alert-danger" style="display:none;">{$errorMessage}</div>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="text-center mb-4">Реєстрація</h3>
            <form id="registration-form">
                <div class="form-group">
                    <label for="surname">Фамілія</label>
                    <input type="text" class="form-control" id="surname" name="surname">
                </div>
                <div class="form-group">
                    <label for="email">Електронна пошта</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="password-confirm">Підтвердіть пароль</label>
                    <input type="password" class="form-control" id="password-confirm" name="password-confirm">
                </div>
                <button type="submit" class="btn btn-primary">Зареєструватися</button>
            </form>
        </div>
    </div>