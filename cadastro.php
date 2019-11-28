<!DOCTYPE html>
<html>
	<head>
		<title>Odonto - Cadastro</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="styleHeader.css">
        <script type="text/javascript">
            function fMasc(objeto,mascara) {
                obj=objeto
                masc=mascara
                setTimeout("fMascEx()",1)
            }
            function fMascEx() {
                obj.value=masc(obj.value)
            }
            function mTel(tel) {
                tel=tel.replace(/\D/g,"")
                tel=tel.replace(/^(\d)/,"($1")
                tel=tel.replace(/(.{3})(\d)/,"$1)$2")
                if(tel.length == 9) {
                    tel=tel.replace(/(.{1})$/,"-$1")
                } else if (tel.length == 10) {
                    tel=tel.replace(/(.{2})$/,"-$1")
                } else if (tel.length == 11) {
                    tel=tel.replace(/(.{3})$/,"-$1")
                } else if (tel.length == 12) {
                    tel=tel.replace(/(.{4})$/,"-$1")
                } else if (tel.length > 12) {
                    tel=tel.replace(/(.{4})$/,"-$1")
                }
                return tel;
            }
            function mCNPJ(cnpj){
                cnpj=cnpj.replace(/\D/g,"")
                cnpj=cnpj.replace(/^(\d{2})(\d)/,"$1.$2")
                cnpj=cnpj.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3")
                cnpj=cnpj.replace(/\.(\d{3})(\d)/,".$1/$2")
                cnpj=cnpj.replace(/(\d{4})(\d)/,"$1-$2")
                return cnpj
            }
            function mCPF(cpf){
                cpf=cpf.replace(/\D/g,"")
                cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
                cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
                cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
                return cpf
            }
            function mCEP(cep){
                cep=cep.replace(/\D/g,"")
                cep=cep.replace(/^(\d{2})(\d)/,"$1.$2")
                cep=cep.replace(/\.(\d{3})(\d)/,".$1-$2")
                return cep
            }
            function mNum(num){
                num=num.replace(/\D/g,"")
                return num
            }
        </script>
        <script>
            function excluir(id){
                if(confirm('Deseja realmente excluir este Paciente?')){
                    location.href = 'deletarCadastro.php?id=' + id;   
                }
            }
        </script>
	</head>
	<body>
		<?php include 'header.php'?>

		<h1 class = "text-center mb-4">Cadastro de Pacientes</h1>
			
        <div class = "pl-5 pr-5">
            <span class = "d-flex d-inline-flex mb-2">
                <form class="form-inline">
                    <input class="form-control mr-2 ml-1" type="search" name = "nome">
                    <button class="btn btn-primary btn-md mr-3" type="submit">Pesquisar</button>
                </form>
                <a href="cadastroTodos.php"><button type="button" class="btn btn-danger btn-md ml-2">Exibir Todos</button></a>
                <button type="button" class="btn btn-primary btn-md ml-2" data-toggle="modal" data-target="#modalCadastro">Cadastrar Paciente</button>

                <input type="button" class ="btn btn-dark ml-2" onclick="window.print();" value="Imprimir">

                 <div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title text-primary ml-5" id="modalTitle">Formulário de Cadastramento</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body justify-content-around">
                                <h5>Dados Pessoais:</h5>
                                <form class = "form-group mt-2" action="cadastraPessoa.php" method="post">
                                    <div class = "form-row">
                                        <div class="form-group w-100 col-md-6">
                                            <label for="cpf">CPF:</label>
                                            <input type="text" onkeydown = "fMasc(this, mCPF)" class="form-control" id="cpf" placeholder="" name = "cpf">
                                        </div>
                                        <div class="form-group w-100 col-md-6">
                                            <label for="rg">RG:</label>
                                            <input type="text" class="form-control" id="rg" placeholder="" name = "rg">
                                        </div>
                                    </div>
                                    <div class = "form-row">
                                        <div class="form-group col-md-7">
                                            <label for="nome">Nome:</label>
                                            <input type="text" class="form-control" id="nome" placeholder="" name = "nome">
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label for="nascimento">Data de Nascimento:</label>
                                            <input type="date" class="form-control" id="nascimento" placeholder="" name = "nascimento">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" placeholder="" name = "email">
                                    </div>
                                    <div class="form-group">
                                        <label for="orcamento">Orçamento:</label>
                                        <input type="text" class="form-control" id="orcamento" placeholder="" name = "orcamento">
                                    </div>

                                    <div class = "form-row">
                                        <div class="form-group col-md-6">
                                            <label for="telefone">DDD - Telefone:</label>
                                            <input type="text" onkeydown = "fMasc(this, mTel)" class="form-control" id="telefone" placeholder="" name = "telefone">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="celular">DDD - Celular:</label>
                                            <input type="text" onkeydown = "fMasc(this, mTel)" class="form-control" id="celular" placeholder="" name = "celular">
                                        </div>
                                    </div>     

                                    <div class="form-row">
                                        <div class="form-group col-md-5">
                                            <label for="endereco">Endereço:</label>
                                            <input type="endereco" class="form-control" id="endereco" placeholder="" name = "endereco">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="bairro">Bairro:</label>
                                            <input type="text" class="form-control" id="bairro" placeholder="" name = "bairro">
                                        </div> 
                                        <div class="form-group col-md-3">
                                            <label for="cep">CEP:</label>
                                            <input type="text" onkeydown = "fMasc(this, mCEP)" class="form-control" id="cep" placeholder="" name = "cep">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-10">
                                            <label for="Cidade">Cidade:</label>
                                            <input type="text" class="form-control" id="Cidade" name = "cidade">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="UF">UF:</label>
                                            <input type="text" class="form-control" name = "uf" id="UF">
                                        </div>
                                    </div>

                                     <div class="form-group w-100">
                                        <label for="Complemento">Complemento:</label>
                                        <input type="text" class="form-control" id="Complemento" placeholder="" name = "complemento">
                                    </div>
                                    <div class="form-group">
                                        <label>Situação da Ficha:</label>
                                        <select name="situacaoficha" class="form-control">
                                            <option value="" disabled selected>- Escolha -</option>
                                            <option value="ativa">Ativa</option>
                                            <option value="inativa">Inativa</option>
                                        </select>
                                    </div>
                                    <div class = "mb-2">
                                        <h5>-----------------------Anamnese---------------------</h5>
                                    </div>
                                    <div class="form-row">  
                                        <div class="form-group col-md-6">
                                            <label for="data">Doenças de Base:</label>
                                            <input type="text" class="form-control" id="doencabase" placeholder="" name = "doencabase">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="alergia">Alergias:</label>
                                            <input type="text" class="form-control" id="alergia" placeholder="" name = "alergia">
                                        </div> 
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="medicamentos">Medicamentos:</label>
                                            <input type="text" class="form-control" id="medicamentos" placeholder="" name = "medicamentos">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="cirurgia">Cirurgias:</label>
                                            <input type="text" class="form-control" id="cirurgia" placeholder="" name = "cirurgia">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="internacoes">Internacões:</label>
                                            <input type="text" class="form-control" id="internacoes" placeholder="" name = "internacoes">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="pa">P.A:</label>
                                            <input type="text" class="form-control" id="pa" placeholder="" name = "pa">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="queixas">Queixas Principais:</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = "queixaprinc"></textarea>
                                    </div>                    
                                    <input type="submit" class="btn btn-primary float-right" value = "Cadastrar">
                                </form>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>
            </span>
                <?php
                    if(isset($_GET["nome"])){
                        $nome = $_GET["nome"];
                        include_once 'conexao.php';
                        $sql = "SELECT * FROM paciente WHERE nome
                        LIKE '{$nome}%'";
                      

                        if($nome == "" || $nome == "%" || $nome == "'"){ ?>
                            <div class = "container">
                                <div class="alert alert-danger mt-5" role="alert">
                                    <h4 class="alert-heading">Valor digitado inválido!</h4>
                                    <p>Você precisa digitar um valor para consultar um paciente;</p>
                                    <hr>
                                    <p class="mb-0">Sistema Odontológico</p>
                                </div>
                            </div>
                        <?php 
                        } else {
                        $buscar = mysqli_query($con, $sql); 
                        
                        $totalRegistros = mysqli_num_rows($buscar);

                        if($totalRegistros > 0){
                ?>
                <!--Modal  Tela de Cadastro-->
            <div class = "overflow-auto ml-1 mr-1 mt-3" style = "max-height: 550px">
                <table class="table table-hover">
                    <thead id = "theadCadastro" class = "thead-dark">
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Data de Nascimento</th>
                            <th scope="col">Celular</th>
                            <th scope="col">E-mail</th>
                            
                            <th scope="col"></th>
                        </tr>
                    </thead>

                    <tbody id = "tbodyCadastro">
                        <?php
                            while($array = mysqli_fetch_array($buscar)){
                                $id = $array['id'];


                                //$situacaoficha = $array['situacaoficha'];
                                $nascimento = $array['nascimento'];
                                $dtNasci = explode('-', $nascimento);
                                $datadeNascimento = $dtNasci[2] . "-" . $dtNasci[1]. "-" . $dtNasci[0];
                            ?>
                            <tr><td><?php echo $array['nome']?></td>
                                <td><?php echo $datadeNascimento?></td>
                                <td><?php echo $array['celular']?></td>                                
                                <td><?php echo $array['email']?></td>
                                <td class = "d-flex justify-content-around">

                                    <a style = "font-size:15px" class="btn btn-primary btn-sm"  style="color:#fff" href="ficha.php?id=<?php echo $id?>" role="button">
                                        <i class="fa fa-address-book-o mr-2" aria-hidden="true"></i>
                                        Visualizar Ficha
                                    </a>
                                    <a style = "font-size:15px" class="btn btn-warning btn-sm text-white"  style="color:#fff" href="editarCadastro.php?id=<?php echo $id?>" role="button">
                                        <i class="fa fa-pencil-square-o mr-2" aria-hidden="true"></i>
                                        Editar
                                    </a> 
                                    <a style = "font-size:15px" class="btn btn-danger btn-sm"  style="color:#fff" href="#" onclick = "excluir(<?php echo $array['id']?>)" role="button">
                                        <i class="fa fa-trash-o mr-2" aria-hidden="true"></i>
                                        Excluir
                                    </a>

                                    <!--<a class="btn btn-success btn-sm"  style="color:#fff" href="consulta.php (<?php echo $array['id_atendimento']?>)" role="button"><i  aria-hidden="true">CONSULTAS</i></a>-->

                                    
                                </td>
                            </tr>
                        <?php
                        };?>
                       </tbody>
                    </table>
                </div>
            </div>
                            
                    <?php
                    } else {?>
                        <div class = "container">  
                            <div class="alert alert-primary mt-5" role="alert">
                                <h4 class="alert-heading">Nenhum registro encontrado!</h4>
                                <p>Por favor, verifique se digitou corretamente o nome do Paciente!</p>
                                <hr>
                                <p class="mb-0">Sistema Odontológico</p>
                            </div>
                        </div>
                        <?php
                    }
                }
            }   
                ?>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>