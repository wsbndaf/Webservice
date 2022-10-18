

# Web Service - Base Nacional da Assistência Farmacêutica

O web service da Base Nacional de Dados de Ações e Serviços da Assistência Farmacêutica no SUS (BNDASAF) permite que Municípios, Estados e Distrito Federal que não utilizam o sistema Hórus possam enviar as informações referentes a posição de estoque, entradas, saídas, dispensações deferidas e avaliações, no âmbito dos medicamentos contidos na Rename para a BNDASAF.


## Descontinuação do serviço
O Ministério da Saúde desenvolveu o serviço SOA Bnafar que irá substituir este serviço. O web service será desativado pelo Ministério da Saúde em breve.
Todas as informações sobre o SOA Bnafar estão disponíveis [aqui](https://servicos-datasus.saude.gov.br/detalhe/DxRPsAn2mh)


## Instruções e documentação do web service

### Manual de Integração do Web Service

O Ministério da Saúde disponibiliza no Manual de Integração do web service todas as informações necessárias para o desenvolvimento do sistema por parte dos municípios e estados. A leitura total desse documento é essencial para o desenvolvimento do web service. [Clique aqui para acessar o documento](https://github.com/wsbndaf/Webservice/tree/master/Documentacao/Manual_Integracao).

### Links de acesso ao Web Service

Segue descrito abaixo os links de acesso aos ambientes de Homologação e Produção do web service. Antes de utilizar os mesmos, é necessário realizar a solicitação de perfil de acesso, conforme item “Solicitação de perfil de acesso” do Roteiro de Uso.

[Ambiente de Homologação](http://horusws.treinamento.saude.gov.br/horus-ws-service/HorusWSService/HorusWS?wsdl)

[Ambiente de Produção](http://horusws.saude.gov.br/horus-ws-service/HorusWSService/HorusWS?wsdl)


No GitHub os profissionais poderão encontrar:

- Padrões de códigos do Web Service
  - Códigos dos Produtos;
  - Códigos dos Tipos de Entrada de Estoque;
  - Códigos dos Tipos de Saída de Estoque;
  - Códigos dos Programas de Saúde;
  - Códigos dos Tipos de Estabelecimento de Saúde.
- Arquivos XSD do Web Service;
- Exemplos de arquivos XML aceitos pelo web service;
- Opções de Cliente PHP para download;
- Manual de Integração com dicionário de dados;


## Solicitação de acesso

A solicitação de perfil de acesso ao web service deverá ser, preferencialmente, um responsável da área de TI da Secretaria Municipal ou Estadual de Saúde, haja vista que somente usuários com expertise na área de desenvolvimento de sistemas terão capacidade de utilizar tal perfil.

O sistema de controle de acesso ao web service da Base Nacional de Dados de Ações e Serviços da Assistência Farmacêutica será o SCPA - Sistema de Cadastro e Permissão de Acesso, do Ministério da Saúde.

As instruções para realizar o processo de solicitação de perfil de acesso ao web service estão descritos no tópico “Solicitação de perfil de acesso” do Manual de Integração, [disponível aqui](https://github.com/wsbndaf/Webservice/tree/master/Documentacao/Manual_Integracao).



## Contato:

E-mail: [ws.daf@saude.gov.br](ws.daf@saude.gov.br)

Telefone: 136
