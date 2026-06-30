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

