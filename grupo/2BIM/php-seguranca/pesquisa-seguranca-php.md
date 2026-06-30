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

**```password_hash()```:**   

A linguagem PHP fornece funções nativas robustas para o tratamento e geração de hashes, divididas entre o uso genérico e o tratamento específico de credenciais de acesso. A função ```password_hash()``` foi desenvolvida com o propósito exclusivo de criar hashes de senhas de forma altamente segura. Ela gerencia automaticamente a aplicação de algoritmos fortes e a criação de componentes aleatórios de segurança. 

**```password_verify()```:**   

Complementarmente, a função ```password_verify()``` é utilizada no momento da autenticação para verificar se uma senha fornecida pelo usuário corresponde ao hash seguro previamente armazenado.

**```hash()```:** 

Para cenários que não envolvem senhas, o PHP disponibiliza a função ```hash()```. Ela serve para gerar hashes genéricos utilizando algoritmos de uso geral (como a família SHA) e é frequentemente empregada para verificar a integridade de arquivos ou criar identificadores únicos de dados não confidenciais.

Essas funções devem ser utilizadas em momentos bem definidos: ```password_hash()``` e ```password_verify()``` entram em ação estritamente no cadastro e no login de usuários, enquanto ```hash()``` atua em rotinas de checagem de arquivos e assinaturas digitais.

Atualmente, os algoritmos recomendados pela comunidade de segurança e definidos como padrão no PHP são o **Bcrypt** e o **Argon2id**. Diferente de algoritmos antigos como MD5 e SHA1, que se tornaram obsoletos por serem excessivamente rápidos e vulneráveis a ataques de colisão, o Bcrypt e o Argon2id são intencionalmente projetados para serem lentos e exigirem alto consumo de hardware (processamento e memória). Isso inviabiliza ataques massivos de força bruta.