<?php
$cd_paciente = (($paciente['cd_paciente']) ? $paciente['cd_paciente'] : null);
$nm_paciente = (($paciente['nm_paciente']) ? $paciente['nm_paciente'] : null);
$nm_mae = (($paciente['nm_mae']) ? $paciente['nm_mae'] : null);
$nm_pai = (($paciente['nm_pai']) ? $paciente['nm_pai'] : null);
$dt_nascimento = (($paciente['dt_nascimento']) ? $paciente['dt_nascimento'] : null);
$nr_cpf = (($paciente['nr_cpf']) ? $paciente['nr_cpf'] : null);
$nr_cns = (($paciente['nr_cns']) ? $paciente['nr_cns'] : null);
$ds_foto = (($paciente['ds_foto']) ? $paciente['ds_foto'] : null);

$cep = (($endereco['cep']) ? $endereco['cep'] : null);
$logradouro = (($endereco['logradouro']) ? $endereco['logradouro'] : null);
$numero = (($endereco['numero']) ? $endereco['numero'] : null);
$bairro = (($endereco['bairro']) ? $endereco['bairro'] : null);
$cidade = (($endereco['cidade']) ? $endereco['cidade'] : null);
$uf = (($endereco['uf']) ? $endereco['uf'] : null);

?>
<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <title>Hello, world!</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="<?= base_url('style/js/func.js') ?>"></script>
    <!-- Adicionando Javascript -->
    <script>
    $(document).ready(function() {
        getContent();
    });

    $(document).ready(function() {

        function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#logradouro").val("");
            $("#bairro").val("");
            $("#cidade").val("");
            $("#uf").val("");
            $("#ibge").val("");
        }
        //Quando o campo cep perde o foco.
        $("#cep").blur(function() {

            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#logradouro").val("...");
                    $("#bairro").val("...");
                    $("#cidade").val("...");
                    $("#uf").val("...");
                    $("#ibge").val("...");

                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#logradouro").val(dados.logradouro);
                            $("#bairro").val(dados.bairro);
                            $("#cidade").val(dados.localidade);
                            $("#uf").val(dados.uf);
                            $("#ibge").val(dados.ibge);
                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            alert("CEP não encontrado.");
                        }
                    });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });
    });
    </script>
</head>

<body>

    <div class=".container-fluid">
        <?php
            if ($msg) {
              ?>
        <div class="alert alert-success" role="alert">
            <?= $msg ?>
        </div>

        <?php
            }
            if ($msg_erro) {
              ?>
        <div class="alert alert-danger" role="alert">
            <?= $msg_erro ?>
        </div>
        <?php
            }
            ?>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-paciente-tab" data-toggle="tab" href="#nav-paciente"
                    role="tab" aria-controls="nav-paciente" aria-selected="true">Paciente</a>
                <a class="nav-item nav-link" id="nav-endereco-tab" data-toggle="tab" href="#nav-endereco" role="tab"
                    aria-controls="nav-endereco" aria-selected="false">Endereço</a>
                <a class="nav-item nav-link" id="nav-contato-tab" data-toggle="tab" href="#nav-contato" role="tab"
                    aria-controls="nav-contato" aria-selected="false">Contato</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-paciente" role="tabpanel" aria-labelledby="nav-paciente-tab">
                <form method='POST' action='<?= base_url('index.php/paciente') ?>'>
                    <label for="inputCod">Codigo</label>
                    <div class="input-group col-md-2">

                        <input type="text" class="form-control" placeholder="Código" aria-label="Código do paciente"
                            aria-describedby="button-addon2" id="cd_paciente" name='cd_paciente'
                            value="<?= $cd_paciente ?>">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2"
                                data-toggle="modal" data-target=".bd-example-modal-lg"
                                onclick='buscarNoticias(1)'>
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
                                    <path fill-rule="evenodd"
                                        d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputNome">Nome</label>
                            <input type="text" class="form-control" id="nm_paciente" name='nm_paciente'
                                value="<?= $nm_paciente ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputDtNascimento">Data de Nascimento</label>
                            <input type="date" class="form-control" id="dt_nascimento" name='dt_nascimento'
                                value="<?= $dt_nascimento ?>">
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
                    <a href="<?= base_url('index.php/paciente') ?>" class="btn btn-secondary">Novo</a>
                    <button type="submit" class="btn btn-primary" name='submit' value='consulta'>Consultar</button>
                    <button type="submit" class="btn btn-primary" name='submit' value='submit'>Entrar</button>
                </form>
            </div>
            <div class="tab-pane fade" id="nav-endereco" role="tabpanel" aria-labelledby="nav-endereco-tab">
                <form method='POST' action='<?= base_url('index.php/paciente') ?>'>
                    <div class="form-group col-md-2">
                        <label for="inputCEP">CEP</label>
                        <input type="text" class="form-control" id="cep" value="<?= $cep ?>">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-7">
                            <label for="inputAddress">Endereço</label>
                            <input type="text" class="form-control" id="logradouro" placeholder="Rua dos Bobos"
                                name="logradouro" value="<?= $logradouro ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputCity">Nº</label>
                            <input type="text" class="form-control" id="numero" name="numero" value="<?= $numero ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputCity">Bairro</label>
                            <input type="text" class="form-control" id="bairro" name="bairro" value="<?= $bairro ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputCity">Cidade</label>
                            <input type="text" class="form-control" id="cidade" name="cidade" value="<?= $cidade ?>">
                        </div>
                        <div class="form-group col-md-1">
                            <label for="inputEstado">Estado</label>
                            <input type="text" class="form-control" id="uf" name="uf" value="<?= $uf ?>">
                        </div>
                    </div>
            </div>
            <div class="tab-pane fade" id="nav-contato" role="tabpanel" aria-labelledby="nav-contato-tab">
                teste...
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="resultado">
                    
                </div>
            </div>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
            integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
        </script>
</body>

</html>