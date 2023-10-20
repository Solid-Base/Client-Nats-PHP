<?php

use SolidBase\Nats\Connection;
use SolidBase\Nats\ConnectionOptions;
use SolidBase\Nats\EncodedConnection;
use SolidBase\Nats\Encoders\JSONEncoder;

require_once __DIR__ . '/../vendor/autoload.php';

$connectionOptions = new ConnectionOptions();
$connectionOptions->setHost('10.0.1.5')->setPort(4222);

echo 'Server: nats://' . $connectionOptions->getHost() . ':' . $connectionOptions->getPort() . PHP_EOL;

$c = new EncodedConnection($connectionOptions, new JSONEncoder());
$c->connect();

$message = json_decode('{"modalidade":1,"amparoLegal":1,"origemRecurso":null,"convenioRecurso":null,"registroPreco":false,"prazoValidade":null,"permitidoCarona":null,"numeroProcesso":"0556565/2023","numeroPregao":"03565656/2023","tipoIntervalo":1,"numeroDotacaoOrcamentaria":"0656588985","modoDisputa":1,"formatoLance":1,"dataPublicacaoPlataforma":null,"dataPublicacaoDiario":"2023-10-18T13:00:00+00:00","dataInicioDisputa":"2023-10-29T13:00:00+00:00","dataLimiteImpugnacao":"2023-10-26T13:00:00+00:00","preferenciaRegional":false,"numeroCasasDecimaisLance":2,"ordemFase":1,"objetoEdital":"CONTRATAÇÃO DE EMPRESA APTA A PRESTAR OS SERVIÇOS DE LOCAÇÃO MENSAL E SUPORTE TÉCNICO ESPECIALIZADO NOS SOFTWARES DE SISTEMAS INFORMATIZADOS DE GESTÃO PÚBLICA (GESTÃO DA CONTROLADORIA, RECURSOS HUMANOS E TRIBUTAÇÃO E SISTEMA ESPECÍFICO PARA O CIDADÃO NA ÁREA EDUCAÇÃO MUNICIPAL), POR TEMPO DETERMINADO, BEM COMO OS SERVIÇOS DE INSTALAÇÃO, IMPLANTAÇÃO, MIGRAÇÃO DOS DADOS JÁ EXISTENTES E TREINAMENTO DOS SERVIDORES; COMPLEMENTADO COM CONSULTORIA ESPECIALIZADA NA UTILIZAÇÃO DOS SISTEMAS E SUPORTE LOCAL OU REMOTO, JÁ INCLUSAS ALTERAÇÕES LEGAIS E MANUTENÇÕES CORRETIVAS","lotes":[{"id":"01HCJ2T5BDZH6CXQ5A50H3898J","alterarDescricao":false,"createdAt":"2023-10-12T13:56:56+00:00","descricaoLote":"Lote tal","documentosProposta":false,"intervaloLance":1,"items":[{"id":"01HCJ2T5BE65BPN6JH8QCPD9DB","descricao":"Teste","quantidade":10,"sequencia":1,"unidadeMedida":"10","valorTotal":"200.00","valorUnitario":"20.00000","createdAt":"2023-10-12T13:56:56+00:00","updatedAt":"2023-10-12T13:56:56+00:00"}],"marcaFabricante":true,"sequencia":1,"sigiloso":false,"status":0,"tipoBeneficio":0,"tipoItens":1,"updatedAt":"2023-10-12T13:56:56+00:00","valorTotal":200},{"id":"01HCJ7KVSMFT4YE96PSJ5Y4YBB","alterarDescricao":false,"createdAt":"2023-10-12T15:20:52+00:00","descricaoLote":"Outro teste","documentosProposta":false,"intervaloLance":1,"items":[{"id":"01HCJ7KVSMFT4YE96PSJ5Y4YBC","descricao":"Outro teste","quantidade":10,"sequencia":1,"unidadeMedida":"PC","valorTotal":"50.00","valorUnitario":"5.00000","createdAt":"2023-10-12T15:20:52+00:00","updatedAt":"2023-10-12T15:20:52+00:00"}],"marcaFabricante":false,"sequencia":2,"sigiloso":false,"status":0,"tipoBeneficio":0,"tipoItens":1,"updatedAt":"2023-10-12T15:20:52+00:00","valorTotal":50}],"status":0,"propostas":[],"segmentos":[{"id":"33YQMREMV24KX4SWTGQ55NY3JH","cnae":"7111100","atividadeEconomica":"Serviços de arquitetura","codigoSetor":71,"setor":"SERVIÇOS DE ARQUITETURA E ENGENHARIA; TESTES E ANÁLISES TÉCNICAS","fornecedores":[]},{"id":"33YQMRE267G63T14XXE74EA82P","cnae":"7119703","atividadeEconomica":"Serviços de desenho técnico relacionados à arquitetura e engenharia","codigoSetor":71,"setor":"SERVIÇOS DE ARQUITETURA E ENGENHARIA; TESTES E ANÁLISES TÉCNICAS","fornecedores":[]},{"id":"33YQMREMNM61T5DWSBX0YXRCTE","cnae":"7119799","atividadeEconomica":"Atividades técnicas relacionadas à engenharia e arquitetura não especificadas anteriormente","codigoSetor":71,"setor":"SERVIÇOS DE ARQUITETURA E ENGENHARIA; TESTES E ANÁLISES TÉCNICAS","fornecedores":[]},{"id":"33YQMRE3JYBSJ6PWZA56GNR09C","cnae":"7120100","atividadeEconomica":"Testes e análises técnicas","codigoSetor":71,"setor":"SERVIÇOS DE ARQUITETURA E ENGENHARIA; TESTES E ANÁLISES TÉCNICAS","fornecedores":[]}],"documentos":[{"nome":"01HCJ7B3XRDC96N3DF2FFQPXP8","caminho":"http://10.0.1.100:8001/01HCJ7B3XRDC96N3DF2FFQPXP8","tamanho":168265,"tipoDocumento":1,"nomeOriginal":"175b155b-25fd-42b4-ab8f-0f725fa9e12d.pdf","id":"01HCJ7FE6K2G8442C7F140PMDB","createdAt":"2023-10-12T15:18:27+00:00","updatedAt":"2023-10-12T15:18:27+00:00"},{"nome":"01HCJ7GHAZMRQS0988AN2BDXM1","caminho":"http://10.0.1.100:8001/01HCJ7GHAZMRQS0988AN2BDXM1","tamanho":177023,"tipoDocumento":2,"nomeOriginal":"comprovante-endereco.pdf","id":"01HCJ7GHN3CF8SRDVVQRR6Q9E8","createdAt":"2023-10-12T15:19:04+00:00","updatedAt":"2023-10-12T15:19:04+00:00"}],"solicitacoes":[{"descricao":"Teste de impulgnação","dataEnvio":"2023-10-12T15:41:22+00:00","documentoSolicitante":null,"resposta":null,"dataResposta":null,"documentoResposta":null,"publicarNaAta":false,"solicitante":{"nome":"Guilherme Luiz Pereira Pinto","cpf":"038.422.061-43","celular":"(62) 9 9166-6294","email":"guilhermelpp.eng@gmail.com","id":"01HCJ10223Q41G7KAVSPMB1B3H","createdAt":"2023-10-12T13:25:11+00:00","updatedAt":"2023-10-12T13:25:11+00:00","userIdentifier":"guilhermelpp.eng@gmail.com"},"status":0,"ouvidor":null,"tipoSolicitacao":2,"id":"01HCJ8SCVH8TC852YH94JEQGM9","createdAt":"2023-10-12T15:41:22+00:00","updatedAt":"2023-10-12T15:41:22+00:00"}],"id":"01HCJ2RZRGB6PK4BFF9FQPFC4H","createdAt":"2023-10-12T13:56:17+00:00","updatedAt":"2023-10-12T13:56:17+00:00","pregoeiro":{"tipoUsuarioEntidadePublica":2,"id":"01HCJ2HTWVGW02SNXGW5Q6YHH3","createdAt":"2023-10-12T13:52:23+00:00","updatedAt":"2023-10-12T13:52:23+00:00","usuarioId":"6KKPXNW4BP8V5VDAFDH08DEPSF","nome":"Carlos Yago Nunes","pregoeiro":true,"equipeAuxiliar":false,"autoridade":false},"autoridadeSuperior":{"tipoUsuarioEntidadePublica":1,"id":"01HCJ2HHHF777Q1PR1CWX7JEJV","createdAt":"2023-10-12T13:52:13+00:00","updatedAt":"2023-10-12T13:52:13+00:00","usuarioId":"01HCJ10223Q41G7KAVSPMB1B3H","nome":"Guilherme Luiz Pereira Pinto","pregoeiro":false,"equipeAuxiliar":false,"autoridade":true},"equipeDeApoio":[{"tipoUsuarioEntidadePublica":3,"id":"01HCJ2GJ71NWYKKGZNFDFDPRHK","createdAt":"2023-10-12T13:51:41+00:00","updatedAt":"2023-10-12T13:51:41+00:00","usuarioId":"6X5W6VC7WX8EXATEY3ACHRFEHN","nome":"Olivia Bárbara Figueiredo","pregoeiro":false,"equipeAuxiliar":true,"autoridade":false},{"tipoUsuarioEntidadePublica":3,"id":"01HCJ2GQGBWBJK5P45VDFVH40Q","createdAt":"2023-10-12T13:51:47+00:00","updatedAt":"2023-10-12T13:51:47+00:00","usuarioId":"6SARMTQNS69PZAC75MTETB6TNY","nome":"Bernardo Cauã da Mota","pregoeiro":false,"equipeAuxiliar":true,"autoridade":false},{"tipoUsuarioEntidadePublica":3,"id":"01HCJ2H19SQDEXGXRV43533MJC","createdAt":"2023-10-12T13:51:57+00:00","updatedAt":"2023-10-12T13:51:57+00:00","usuarioId":"5H4XFWT71X8P4SY3NJB5SWM2EN","nome":"Betina Letícia Julia da Silva","pregoeiro":false,"equipeAuxiliar":true,"autoridade":false},{"tipoUsuarioEntidadePublica":3,"id":"01HCJ2HD2Y3FS9DJM5SHHQ6YMP","createdAt":"2023-10-12T13:52:09+00:00","updatedAt":"2023-10-12T13:52:09+00:00","usuarioId":"17XJHF5DVA8F0B0TN9JA4PA9ZX","nome":"Heloise Lorena Vieira","pregoeiro":false,"equipeAuxiliar":true,"autoridade":false}],"nomeEntidade":"Solidbase Sistemas","estadoEntidade":"GO","cidadeEntidade":"Goiânia"}');
$c->publish('l-01HCJ2RZRGB6PK4BFF9FQPFC4H', $message);
$c->close();