<?php
$cd_paciente = (($paciente['cd_paciente']) ? $paciente['cd_paciente'] : null);
$nm_paciente = (($paciente['nm_paciente']) ? $paciente['nm_paciente'] : null);
$nm_mae = (($paciente['nm_mae']) ? $paciente['nm_mae'] : null);
$nm_pai = (($paciente['nm_pai']) ? $paciente['nm_pai'] : null);
$dt_nascimento = (($paciente['dt_nascimento']) ? $paciente['dt_nascimento'] : null);
$nr_cpf = (($paciente['nr_cpf']) ? $paciente['nr_cpf'] : null);
$nr_cns = (($paciente['nr_cns']) ? $paciente['nr_cns'] : null);
$ds_foto = (($paciente['ds_foto']) ? $paciente['ds_foto'] : null);
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <!-- Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <title>Hello, world!</title>
    </head>
    <body>
        <div>
            <?= $msg ?>
        </div>
        <form method='POST' action='<?= base_url('index.php/paciente') ?>'>
            <div class="form-group col-md-2">
                <label for="inputCod">Codigo</label>
                <input type="text" class="form-control" id="cod" name='cd_paciente' value="<?= $cd_paciente ?>">
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputNome">Nome</label>
                    <input type="text" class="form-control" id="nm_paciente" name='nm_paciente' value="<?= $nm_paciente ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputDtNascimento">Data de Nascimento</label>
                    <input type="date" class="form-control" id="dt_nascimento" name='dt_nascimento' value="<?= $dt_nascimento ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputCPF">CPF</label>
                    <input type="text" class="form-control" id="nr_cpf" name='nr_cpf' value="<?= $nr_cpf ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputPai">CNS</label>
                    <input type="text" class="form-control" id="nr_cns" name=nr_cns value="<?= $nr_cns ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="inputMae">Mãe</label>
                    <input type="text" class="form-control" id="nm_mae" name='nm_mae' value="<?= $nm_mae ?>">
                </div>
                <div class="form-group col-md-5">
                    <label for="inputPai">Pai</label>
                    <input type="text" class="form-control" id="nm_pai" name='nm_pai' value="<?= $nm_pai ?>">
                </div>
            </div>
            <hr>
            <div class="form-group col-md-2">
                <label for="inputCEP">CEP</label>
                <input type="text" class="form-control" id="inputCEP">
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Senha</label>
                    <input type="password" class="form-control" id="inputPassword4" placeholder="Senha">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Endereço</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="Rua dos Bobos, nº 0">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Cidade</label>
                    <input type="text" class="form-control" id="inputCity">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputEstado">Estado</label>
                    <select id="inputEstado" class="form-control">
                        <option selected>Escolher...</option>
                        <option>...</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Clique em mim
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name='submit' value='consulta'>Consultar</button>
            <button type="submit" class="btn btn-primary" name='submit' value='submit'>Entrar</button>
        </form>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>
