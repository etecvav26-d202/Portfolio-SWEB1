# Pesquisa - Funções para Criptografia, Hash, Codificação e Proteção de Dados em PHP

**`Instituição:`**
ETEC Vasco Antônio Venchiarutti

**`Curso:`**
Informática para Internet

**`Turma:`**
2º ano D

**`Autores:`**
- [Alice Gimenez Siqueira](https://github.com/alice-gimenez)
- [Alice Rasmussen Rezende Alves](https://github.com/alicerez0703)
- [Amanda Neves Oliveira](https://github.com/amandanevoli)
- [Ana Lívia Takeyama Romanato](https://github.com/liviatakeyama)
- [Isabelli Dias da Silva](https://github.com/isabelbelli)

---

## 1. Segurança em aplicações Web

**Segurança da Informação:**   

A Segurança da Informação é definida como o conjunto de práticas, políticas, tecnologias e metodologias que visam proteger dados e sistemas contra acessos não autorizados, modificações indevidas, destruição ou vazamentos. No cenário do desenvolvimento web, essa disciplina apoia-se tradicionalmente na tríade conhecida como CID: Confidencialidade (garantia de que apenas pessoas autorizadas acessem o dado), Integridade (garantia de que a informação não foi alterada indevidamente) e Disponibilidade (garantia de que o sistema estará acessível quando necessário).

**Proteção dos dados do usuário:**   

Proteger os dados dos usuários é uma obrigação tanto técnica quanto legal e ética. Com a vigência de legislações como a Lei Geral de Proteção de Dados (LGPD) no Brasil, as organizações são diretamente responsáveis por salvaguardar informações pessoais e sensíveis contra incidentes. Além de evitar sanções financeiras e processos judiciais, a proteção de dados preserva a reputação da instituição e estabelece uma relação de confiança com o público-alvo, mitigando os severos prejuízos causados pelo roubo de identidade e fraudes financeiras.

**Principais riscos em aplicações:**   

Os principais riscos enfrentados por aplicações desenvolvidas para a Internet derivam, em grande parte, de falhas de lógica no código ou de configurações inadequadas nos servidores. Entre as ameaças mais recorrentes mapeadas por consórcios globais como o OWASP, destacam-se a injeção de scripts e comandos maliciosos, a quebra de autenticação (permitindo o sequestro de contas), o vazamento de dados sensíveis por falta de criptografia em trânsito ou repouso, e a exposição de interfaces de programação (APIs) sem o devido controle de acesso.

## 2. Criptografia, Hash e Codificação

Compreender as distinções entre criptografia, funções de hash e codificação é essencial para a correta implementação de controles de segurança.

**Criptografia:**   

A criptografia é um processo bidirecional projetado para garantir a confidencialidade. Ela transforma um texto claro em um texto cifrado por meio de um algoritmo e de uma chave secreta. O dado pode ser revertido à sua forma original (descriptografado) desde que se possua a respectiva chave. Um exemplo prático de sua utilização ocorre no protocolo HTTPS, que criptografa o tráfego entre o navegador do usuário e o servidor web para que terceiros não interceptem as informações.

**Hash:**   

O hash, por outro lado, é um mecanismo estritamente unidirecional. Ele recebe um dado de qualquer tamanho e o transforma em uma sequência de caracteres de comprimento fixo. O processo é irreversível, o que significa que é computacionalmente inviável recuperar o dado original a partir do hash gerado. Além disso, o hash é determinístico: a mesma entrada sempre produzirá exatamente o mesmo resultado. O exemplo de uso mais comum é o armazenamento de senhas em bancos de dados, onde o sistema valida o acesso comparando os hashes, sem nunca precisar conhecer a senha real em texto puro.

**Codificação:**   

A codificação (encoding) difere completamente dos conceitos anteriores por não possuir nenhum propósito de segurança. Trata-se de uma transformação pública e reversível utilizada apenas para garantir a compatibilidade e a integridade da transmissão de dados entre diferentes sistemas e protocolos. Qualquer pessoa pode decodificar o dado sem a necessidade de chaves. Um exemplo clássico é a codificação URL, que substitui caracteres especiais (como espaços por ```%20```) para garantir que os endereços da web sejam interpretados corretamente pelos navegadores.

## 3. Funções de Hash no PHP

- **```password_hash()```:** A linguagem PHP fornece funções nativas robustas para o tratamento e geração de hashes, divididas entre o uso genérico e o tratamento específico de credenciais de acesso. A função ```password_hash()``` foi desenvolvida com o propósito exclusivo de criar hashes de senhas de forma altamente segura. Ela gerencia automaticamente a aplicação de algoritmos fortes e a criação de componentes aleatórios de segurança. 

- **```password_verify()```:** Complementarmente, a função ```password_verify()``` é utilizada no momento da autenticação para verificar se uma senha fornecida pelo usuário corresponde ao hash seguro previamente armazenado.

- **```hash()```:** Para cenários que não envolvem senhas, o PHP disponibiliza a função ```hash()```. Ela serve para gerar hashes genéricos utilizando algoritmos de uso geral (como a família SHA) e é frequentemente empregada para verificar a integridade de arquivos ou criar identificadores únicos de dados não confidenciais.

Essas funções devem ser utilizadas em momentos bem definidos: ```password_hash()``` e ```password_verify()``` entram em ação estritamente no cadastro e no login de usuários, enquanto ```hash()``` atua em rotinas de checagem de arquivos e assinaturas digitais.

Atualmente, os algoritmos recomendados pela comunidade de segurança e definidos como padrão no PHP são o **Bcrypt** e o **Argon2id**. Diferente de algoritmos antigos como MD5 e SHA1, que se tornaram obsoletos por serem excessivamente rápidos e vulneráveis a ataques de colisão, o Bcrypt e o Argon2id são intencionalmente projetados para serem lentos e exigirem alto consumo de hardware (processamento e memória). Isso inviabiliza ataques massivos de força bruta.

## 4. Funções de Codificação

No ecossistema do PHP, as funções ```base64_encode()``` e ```base64_decode()``` são amplamente utilizadas para manipular dados textuais e binários.

- **```base64_encode()```:** A função ```base64_encode()``` serve para converter qualquer conjunto de dados em uma representação de caracteres ASCII legíveis.

- **```base64_decode()```:** A função ```base64_decode()``` realiza o processo inverso, devolvendo o dado ao seu formato original.

Essas funções são aplicadas em situações práticas onde dados binários precisam ser transmitidos por canais que foram originalmente desenhados para lidar apenas com texto. Um caso de uso comum é a inclusão de imagens diretamente no corpo de documentos HTML ou XML, ou o envio de arquivos anexos através de protocolos de e-mail (como o SMTP).

É um erro conceitual grave classificar o Base64 como uma forma de criptografia. O Base64 não visa ocultar informações ou restringir o acesso a elas; seu algoritmo é amplamente conhecido, público e não faz uso de chaves secretas ou senhas para realizar a conversão. Portanto, qualquer dado codificado em Base64 pode ser decodificado instantaneamente por qualquer sistema ou usuário, não oferecendo nenhuma camada de confidencialidade.


## 5. Criptografia no PHP

Para cenários onde dados confidenciais precisam ser armazenados de forma protegida, mas com a necessidade de recuperação posterior (como o número de um documento ou dados de pagamento), o PHP utiliza a extensão OpenSSL. O OpenSSL é uma biblioteca de código aberto robusta e amplamente adotada no mercado que implementa funções criptográficas avançadas e os protocolos TLS/SSL para comunicação segura na internet.

No PHP, essa biblioteca serve para realizar operações de criptografia simétrica e assimétrica, geração de chaves e assinaturas digitais. Quando um desenvolvedor precisa criptografar informações confidenciais para que fiquem ilegíveis no banco de dados, utiliza-se a função ```openssl_encrypt()```. Quando a aplicação legítima precisa ler esse dado novamente para exibi-lo ao usuário ou processá-lo, utiliza-se a função ```openssl_decrypt()```. O padrão de mercado recomendado para essas operações é o algoritmo AES-256 (Advanced Encryption Standard) operando em modos seguros como o GCM ou CBC.

## 6. Proteção de Senhas

O armazenamento correto de senhas exige que as credenciais nunca, sob hipótese alguma, sejam salvas em texto puro (texto limpo). Se um banco de dados for comprometido e as senhas estiverem expostas sem proteção, todas as contas dos usuários estarão imediatamente sob o controle de invasores. Portanto, o padrão correto exige a aplicação de um algoritmo de hash seguro e lento antes de salvar o registro no banco.

Um componente indispensável nesse processo é o **Salt** (sal). O salt consiste em uma sequência de caracteres aleatórios gerada automaticamente para cada usuário e mesclada à senha antes da execução do hash. A presença do salt garante que, mesmo se dois usuários escolherem a mesma senha (como "123456"), os hashes resultantes gravados no banco serão completamente diferentes. Isso neutraliza ataques baseados em Rainbow Tables, que são tabelas pré-computadas com milhões de hashes de senhas comuns.

Para que um algoritmo de hash seja considerado seguro para senhas, ele deve possuir alta resistência a colisões (duas entradas diferentes gerarem o mesmo hash) e possuir um "fator de custo" ajustável. Esse custo obriga o computador a realizar milhares de ciclos de processamento para gerar um único hash, tornando o processo lento o suficiente para impedir que invasores testem bilhões de combinações por segundo em ataques de força bruta.

## 7. Proteção contra Ataques

O desenvolvimento seguro em PHP exige a adoção de contra-medidas específicas para mitigar os principais ataques da web:

- **SQL Injection:** Ocorre quando um invasor insere comandos SQL maliciosos em campos de entrada de texto, manipulando as consultas enviadas ao banco de dados. A prevenção absoluta no PHP é feita através do uso de Prepared Statements (consultas preparadas) utilizando extensões como PDO ou MySQLi. Com isso, os dados do usuário são tratados estritamente como parâmetros e nunca como parte executável do comando SQL.

- **Cross-Site Scripting (XSS):** Ocorre quando a aplicação aceita dados maliciosos de um usuário e os exibe para outros visitantes sem a devida filtragem, permitindo a execução de códigos JavaScript maliciosos nos navegadores das vítimas. A prevenção consiste em escapar e sanitizar todas as saídas de dados antes de renderizá-las na tela, utilizando funções nativas como ```htmlspecialchars()```.

- **Cross-Site Request Forgery (CSRF):** Consiste em forçar o navegador de um usuário autenticado a realizar ações indesejadas em um site no qual ele confia (como transferir fundos ou alterar uma senha sem perceber). A prevenção padrão no PHP envolve a geração e validação de tokens CSRF — valores únicos, aleatórios e temporários associados à sessão do usuário que devem ser enviados em cada requisição de formulário.

## 8. Aplicações Práticas

Os mecanismos de segurança descritos são a base operacional de praticamente todos os sistemas modernos conectados à internet:

- **Sistemas de Login e Aplicativos de Gerenciamento de Usuários:** Dependem crucialmente das funções ```password_hash()``` e ```password_verify()``` com Salts para proteger as credenciais de acesso de clientes e administradores.

- **Comércio Eletrônico (E-commerce) e Internet Banking:** Utilizam o OpenSSL (```openssl_encrypt```) para proteger transações financeiras, números de cartões de crédito e dados fiscais, além de dependerem de defesas rigorosas contra SQL Injection e CSRF para evitar fraudes financeiras e roubo de saldos.

- **Redes Sociais e Sistemas Escolares:** Manipulam grandes volumes de informações pessoais e de propriedade intelectual. Utilizam a codificação Base64 para tráfego interno de mídias e documentos, combinada com sanitização estrita contra XSS para evitar que publicações de usuários ou mensagens em fóruns escolares espalhem vírus ou scripts de roubo de cookies.

A aplicação dessas técnicas nesses sistemas é vital porque a falha em qualquer um desses pontos pode resultar em severas violações de privacidade, fraudes financeiras massivas e a destruição da confiança do usuário na plataforma.

## 9. Boas Práticas de Segurança

Para construir e manter aplicações escritas em PHP que sejam resilientes a ataques, os desenvolvedores devem seguir um guia rigoroso de boas práticas:

- **Validar e filtrar todas as entradas:** Nunca confiar em qualquer dado vindo do usuário (sejam formulários, URLs ou cookies). Use ```filter_var()``` para garantir que e-mails, números e URLs estejam nos formatos corretos.

- **Utilizar Consultas Preparadas (Prepared Statements):** Adotar o PDO como padrão para toda e qualquer interação com o banco de dados.

