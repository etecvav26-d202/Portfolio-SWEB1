# Exercícios - Cookies e Sessions no PHP

## Instituição:
`ETEC Vasco Antônio Venchiarutti`

## Turma e Curso:
`2º ano D - Informática para Internet`

## Autores
| Alunos(as) | Função |
| ------ | ------ |
| [Alice Gimenez Siqueira](https://github.com/alice-gimenez) | Estrutura do Relatório e Exercício |
| [Alice Rasmussen Rezende Alves](https://github.com/alicerez0703) | Estrutura do Relatório e Exercício |
| [Amanda Neves Oliveira](https://github.com/amandanevoli) | Estrutura do Relatório e Exercício 3 |
| [Ana Lívia Takeyama Romanato](https://github.com/liviatakeyama) | Estrutura do Relatório e Exercício 2 |
| [Isabelli Dias da Silva](https://github.com/isabelbelli) | Estrutura do Relatório e Exercício |

---

# Exercícios

## Exercício 1 — Pergunta conceitual

Cookies e sessions são usados para **manter informações entre páginas**, mas possuem diferenças importantes. Os **cookies armazenam os dados diretamente no navegador do usuário** (lado do cliente), o que os torna mais simples, porém menos seguros, já que podem ser apagados ou modificados. Já as **sessions armazenam os dados no servidor** (lado do servidor), mantendo no navegador apenas um identificador que permite reconhecer o usuário. Dessa forma, as sessions são mais seguras, enquanto os cookies são mais limitados.

As **sessions** são mais seguras, isso porque os dados ficam armazenados no servidor, e no navegador vai apenas um identificador, dificultando que o usuário veja ou altere as informações.

Já os **cookies** são menos seguros, pois ficam no cliente (navegador) e podem ser acessados, modificados ou até apagados pelo usuário. 

Os **cookies** são mais adequados para dados simples e ficam armazenados no navegador (cliente), enquanto os **sessions** são mais adequadas para dados importantes e ficam armazenadas no servidor.


---

## Exercício 2 — Pergunta de aplicação

Em uma loja virtual, **cookies e sessions** podem ser usados juntos para garantir funcionamento e segurança.

Para manter o usuário logado, o mais indicado é usar **sessions**, pois os dados ficam no servidor, sendo mais seguros. Se for necessário manter o login após fechar o navegador, pode-se usar um **cookie** com um token para recriar a sessão.

No caso do **carrinho de compras**, as **sessions** também são mais adequadas, pois armazenam os itens com segurança no servidor, evitando alterações indevidas.

Já para **preferências do usuário**, como idioma ou tema, os **cookies** são ideais, pois guardam dados simples no navegador e permitem que essas configurações sejam mantidas por mais tempo.

Assim, **sessions** são usadas para **dados sensíveis e temporários**, enquanto **cookies* são mais indicados para **informações simples e persistentes**.

--- 

## Exercício 3 — Pergunta de investigação

Para iniciar a atividade, foi criado um arquivo (teste.php) com um código já definido em PHP responsável por **criar e acessar um cookie chamado "contador"**. O arquivo foi executadoo no navegador através do servidor local (localhost).

Na 1ª execução da página, o código utilizou a função `setcookie()` para enviar o cookie ao navegador, definindo seu valor como **"1"** e o tempo de expiração de **1 hora** (devido ao `time()+3600` presente no código). Porém, mesmo com a criação do cookie, a mensagem exibida foi **"Cookie ainda não disponível"**. Isso ocorreu porque, no funcionamento do protocolo HTTP, o cookie é enviado do servidor para o navegador na resposta da requisição, mas ele só estará disponível para leitura pelo PHP em uma requisição futura, ou seja, **após a página ser recarregada**.

Em seguida, ao atualizar a página no navegador, o comportamento mudou. Dessa vez, o navegador já havia armazenado o cookie enviado anteriormente e o **incluiu automaticamente na nova requisição ao servidor**. Com isso, o PHP conseguiu acessar o valor do cookie por meio da variável `$_COOKIE`, exibindo na tela a mensagem "Valor do cookie: 1". Isso confirmou que o cookie foi corretamente criado, armazenado e recuperado.

Na sequência, foi realizado o processo de **exclusão do cookie**. Para isso, utilizou-se novamente a função `setcookie()`, desta vez definindo um tempo de expiração no passado, o que fez com que o navegador removesse o cookie automaticamente. Após essa ação, ao atualizar a página, o cookie deixou de existir, retornando ao estado inicial. Dessa forma, ao executar novamente o código original e atualizar a página, o comportamento se repetiu: na primeira execução o cookie não estava disponível e, após o recarregamento, passou a ser exibido corretamente.

**Conclusão:** Ao final do exercício, foi possível compreender claramente o funcionamento dos cookies em aplicações web, incluindo seu processo de criação, armazenamento no navegador, envio automático em requisições futuras e remoção.
Além disso,  **o cookie não aparece imediatamente na primeira execução porque ele só se torna disponível para o servidor após o navegador recebê-lo e reenviá-lo em uma nova requisição.**

---

## Exercício 4 — Pergunta de reflexão

---

# Referências


