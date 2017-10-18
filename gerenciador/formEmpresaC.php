<br>
            <table width="100%">
               <tr>
                    <td width="50%" align="left" class="trTopico">
                       Cadastro de empresa
                    </td>
               </tr>
            </table>
            ﻿﻿﻿<form action="cancelPedido.php" method="post" name="formEmpresaC">
                <table width="100%">
                    <tr>
                        <td width="15%" align="left" valign="top" style="background-color: #DEDEDE;" >Tipo:</td>
                        <td width="85%" align="left">
                            <select name="tipo">
                                <option value="F">EXPOSITOR</option>
                                <option value="L">COMPRADOR CONVIDADO</option>
                                <option value="X">COMPRADOR ESPONTÂNEO</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="left">CNPJ:</td>
                        <td align="left"><input type="text" name="cnpj" id="cnpj" size="30" onkeypress='mascaraMutuario(this,cpfCnpj)' onblur='clearTimeout()'></td>
                    </tr>
                    <tr>
                        <td align="left">RAZÃO SOCIAL:</td>
                        <td align="left">
                            <input type="text" name="razaoSocial" id="cnpj"   size="50">
                        </td>
                    </tr>
                    <tr>
                        <td align="left">NOME FANTASIA:</td>
                        <td align="left">
                            <input type="text" name="nomeFantasia" id="cnpj"   size="50">
                        </td>
                    </tr>
                    <tr>
                        <td align="left">CEP:</td>
                        <td align="left">
                            <input type="text" name="cep" id="cnpj"  size="20">
                        </td>
                    </tr>
                    <tr>
                        <td align="left">LOGRADOURO:</td>
                        <td align="left">
                            <input type="text" name="logradouro" id="cnpj"   size="50">
                        </td>
                    </tr>
                    <tr>
                        <td align="left">NÚMERO:</td>
                        <td align="left">
                            <input type="text" name="numero" id="cnpj"   size="20">
                        </td>
                    </tr>
                    <tr>
                        <td align="left">BAIRRO:</td>
                        <td align="left">
                            <input type="text" name="bairro" id="cnpj"   size="50">
                        </td>
                    </tr>
                    <tr>
                        <td align="left">CIDADE:</td>
                        <td align="left">
                            <input type="text" name="cidade" id="cnpj"   size="50">
                        </td>
                    </tr>
                    <tr>
                        <td align="left">ESTADO:</td>
                        <td align="left">
                            <select name="estado">
								<option value="0">TODAS</option>
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
                        <td align="left">E-MAIL:</td>
                        <td align="left">
                            <input type="text" name="email" id="cnpj"   size="50">
                        </td>
                    </tr>
                    <tr>
                        <td align="left">TELEFONE COMERCIAL:</td>
                        <td align="left">
                            <input type="text" name="telComercial" id="cnpj"  size="20">
                        </td>
                    </tr>
                    <tr>
                        <td align="left">TELEFONE CELULAR:</td>
                        <td align="left">
                            <input type="text" name="telCelular" id="cnpj"  size="20">
                        </td>
                    </tr>
                    <tr>
                        <td align="left">&nbsp;</td>
                        <td align="left">
                            <br>
                            <button type="button" name="" value="" class="css3button" 
                    onClick="javascript:document.formCancelPedido.submit();">Cadastrar</button>
                        </td>
                    </tr>
                </table>
                
            </form>
