<?php

$cd_paciente    = (($paciente['cd_paciente'])?$paciente['cd_paciente']:null);
$nm_paciente    = (($paciente['nm_paciente'])?$paciente['nm_paciente']:null);
$nm_mae         = (($paciente['nm_mae'])?$paciente['nm_mae']:null);
$nm_pai         = (($paciente['nm_pai'])?$paciente['nm_pai']:null);
$dt_nascimento  = (($paciente['dt_nascimento'])?$paciente['dt_nascimento']:null);
$nr_cpf         = (($paciente['nr_cpf'])?$paciente['nr_cpf']:null);
$nr_cns         = (($paciente['nr_cns'])?$paciente['nr_cns']:null);
$ds_foto        = (($paciente['ds_foto'])?$paciente['ds_foto']:null);
?>
<form method='POST' action='<?=base_url('index.php/paciente')?>'>
    <div>
    <label for="inputCod">Codigo</label>
        <input type="text" class="form-control" id="cod" name='cd_paciente' value="<?= $cd_paciente ?>">
    </div>
    <div>
    <label for="inputNome">Nome</label>
        <input type="text" class="form-control" id="nm_paciente" name='nm_paciente' value="<?= $nm_paciente ?>">
    </div>
    <div>
    <label for="inputMae">Mãe</label>
        <input type="text" class="form-control" id="nm_mae" name='nm_mae' value="<?= $nm_mae ?>">
    </div>
    <div>
    <label for="inputPai">Pai</label>
        <input type="text" class="form-control" id="nm_pai" name='nm_pai' value="<?= $nm_pai ?>">
    </div>
    <div>
    <label for="inputCPF">CPF</label>
        <input type="text" class="form-control" id="nr_cpf" name='nr_cpf' value="<?= $nr_cpf ?>">
    </div>
    <div>
    <label for="inputPai">CNS</label>
        <input type="text" class="form-control" id="nr_cns" name=nr_cns value="<?= $nr_cns ?>">
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
    <button type="submit" class="btn btn-primary" name='submit' value='submit'>Entrar</button>
</form>