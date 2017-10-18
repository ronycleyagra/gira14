
<script type="text/javascript" src="../js/jquery-1.2.6.pack.js"></script>
<script type="text/javascript" src="../js/jquery.maskedinput-1.1.4.pack.js"/></script>
<script type="text/javascript">$(document).ready(function(){	$("#cpf").mask("999.999.999-99");});</script>
<Script>
function mascaraDataNascimento(campoData){
	var data = campoData.value;
	if (data.length == 2){
		data = data + '/';
		document.formPessoaC.dataNascimento.value = data;
		return true;
	}
	if (data.length == 5){
		data = data + '/';
		document.formPessoaC.dataNascimento.value = data;
		return true;
	}
}//mascaraDataRG
</script>
<br>
            <table width="100%">
               <tr>
                    <td width="50%" align="left" class="trTopico">
                       Cadastro de participante
                    </td>
               </tr>
            </table>
            ﻿﻿﻿<form action="insertPessoa.php" method="post" name="formPessoaC">
                <table width="100%">
                    <tr>
                        <td width="15%" align="left" valign="top" style="background-color: #DEDEDE;" >Tipo:</td>
                        <td width="85%" align="left">
                            <select name="tipo">
                                <option value="E">EXPOSITOR RODADA</option>
                                <option value="S">EXPOSITOR SHOWROOM</option>
                                <option value="L">COMPRADOR CONVIDADO</option>
                                <option value="X">COMPRADOR ESPONTÂNEO</option>
                                <option value="V">VISITANTE</option>
                                <option value="P">REPRESENTANTE</option>
                                <option value="J">COMPRADOR DE CARAVANA</option>
                                <option value="I">INSTITUCIONAL</option>
                                <option value="C">ORGANIZAÇÃO</option>
                                <option value="M">IMPRENSA</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >EMPRESA:</td>
                        <td align="left">
                            <select name="idEmpresa" onChange="javascript: dadosComprador(this);" class="selectComprador">
                                <option value="0">
                                            SELECIONE A EMPRESA VINCULADA
                                </option>
                                <?php
                            include "../Control.php";
                            $compradores = Control::getEmpresas();
                            for($i=0; $i<count($compradores); $i++){
                                $comprador = $compradores[$i];
                                ?>
                                <option value="<? echo $comprador["id"]; ?>">
                                            <? echo strtoupper(utf8_encode($comprador["nomeFantasia"])); ?>
                                </option>
                                <?
                            }
                            ?>
                            </select><font color="red"> * Para participantes do tipo EXPOSITOR, COMPRADOR OU REPRESENTANTE</font>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >NOME DA ENTIDADE:</td>
                        <td align="left">
                            <input type="text" name="nomeEntidade" id="nomeEntidade"  size="20" maxlength="12"><font color="red"> * caso o tipo seja INSTITUCIONAL</font>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >CPF:</td>
                        <td align="left"><input type="text" name="cpf" id="cpf" size="30" maxlength="11" ></td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >NOME:</td>
                        <td align="left">
                            <input type="text" name="nome" id="cnpj"   size="50">
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >CEP:</td>
                        <td align="left">
                            <input type="text" name="cep" id="cnpj"  size="20">
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >LOGRADOURO:</td>
                        <td align="left">
                            <input type="text" name="logradouro" id="cnpj"   size="50">
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >NÚMERO:</td>
                        <td align="left">
                            <input type="text" name="numero" id="cnpj"   size="20">
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >BAIRRO:</td>
                        <td align="left">
                            <input type="text" name="bairro" id="cnpj"   size="50">
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >CIDADE:</td>
                        <td align="left">
                            <input type="text" name="cidade" id="cnpj"   size="50">
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >ESTADO:</td>
                        <td align="left">
                            <select name="estado">
                                    <option value="AC">ACRE</option>
                                        <option value="AL">ALAGOAS</option>
                                        <option value="AP">AMAPá</option>
                                        <option value="AM">AMAZONAS</option>
                                        <option value="BA">BAHIA</option>
                                        <option value="CE">CEARá</option>
                                        <option value="DF">DISTRITO FEDERAL</option>
                                        <option value="ES">ESPIRITO SANTO</option>
                                        <option value="GO">GOIáS</option>
                                        <option value="MA">MARANHãO</option>
                                        <option value="MT">MATO GROSSO</option>
                                        <option value="MS">MATO GROSSO DO SUL</option>
                                        <option value="MG">MINHAS GERAIS</option>
                                        <option value="PA">PARá</option>
                                        <option value="PB">PARAíBA</option>
                                        <option value="PR">PARANá</option>
                                        <option value="PE">PERNAMBUCO</option>
                                        <option value="PI">PIAUí</option>
                                        <option value="RJ">RIO DE JANEIRO</option>
                                        <option value="RN">RIO GRANDE DO NORTE</option>
                                        <option value="RS">RIO GRANDE DO SUL</option>
                                        <option value="RO">RONDôNIA</option>
                                        <option value="RR">RORAIMA</option>
                                        <option value="SP">S&ATILDE;O PAULO</option>
                                        <option value="SC">SANTA CATARINA</option>
                                        <option value="SE">SERGIPE</option>
                                        <option value="TO">TOCANTINS</option>
                                    </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >E-MAIL:</td>
                        <td align="left">
                            <input type="text" name="email" id="cnpj"   size="50">
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >TELEFONE RESIDENCIAL:</td>
                        <td align="left">
                            <input type="text" name="telResidencial" id="cnpj"  size="20">
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >TELEFONE CELULAR:</td>
                        <td align="left">
                            <input type="text" name="telCelular" id="cnpj"  size="20">
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >DATA DE NASCIMENTO:</td>
                        <td align="left">
                            <input type="text" name="dataNascimento" id="cnpj"  size="20" OnKeyUp="mascaraDataNascimento(this);">
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >SEXO:</td>
                        <td align="left">
                            <select name="sexo">
                               <option value="M">MASCULINO</option>
                               <option value="F">FEMININO</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >NOME PARA CRACHÁ:</td>
                        <td align="left">
                            <input type="text" name="nomeCracha" id="nomeCracha"  size="20" maxlength="12">
                        </td>
                    </tr>
                    <tr>
                        <td align="left">&nbsp;</td>
                        <td align="left">
                            <br>
                            <button type="button" name="" value="" class="css3button" 
                    onClick="javascript:document.formPessoaC.submit();">Cadastrar</button>
                        </td>
                    </tr>
                </table>
                
            </form>
