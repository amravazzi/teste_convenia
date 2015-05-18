# Testes Convenia

Para rodar o programa "cometas-ovnis", basta colocar o arquivo php em um servidor.

Para rodar o programa "ferias-clt", é necessário rodar os seguintes comandos no shell:

Roda a migration

`$ php index.php migrate latest`

Seeda a tabela

`$ php index.php migrate seed`

O programa "ferias-clt" foi desenvolvido em Codeigniter. Logo, será necessário alterar o aquivo `application/config/database.php` para os dados de seu banco local.

Caso o endereço default de seu servidor não seja `localhos`, então também deverá mudar o aquivo `application/config/config.php`

Finalmente, o endereço para acessar o resultado é `/ferias/resumo`

Para criar as regras de negócio, foram consultadas as seguintes bibliografias:

[FÉRIAS ANUAIS](http://www.professortrabalhista.adv.br/ferias_anuais.html)

[Períodos Aquisitivo e Concessivo](https://www.portaleducacao.com.br/direito/artigos/24763/periodos-aquisitivo-e-concessivo)

[DO DIREITO A FÉRIAS E DA SUA DURAÇÃO](http://disciplinas.stoa.usp.br/mod/book/view.php?id=44526&chapterid=340)
