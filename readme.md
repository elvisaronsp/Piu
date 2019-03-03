<p align="center">
  <img src="https://github.com/JJS4ntos/Piu/blob/master/piu.svg" height="200"/>
</p>
<p align="center">
    <a href="https://codeclimate.com/github/JJS4ntos/SchoolManager/maintainability">
        <img src="https://api.codeclimate.com/v1/badges/d5755aea0800cbdf5c96/maintainability" />
    </a>
    <a href="https://travis-ci.org/JJS4ntos/Piu">
        <img src="https://travis-ci.org/JJS4ntos/Piu.svg?branch=master">
    </a>
    <a href="https://www.codefactor.io/repository/github/jjs4ntos/piu">
        <img src="https://www.codefactor.io/repository/github/jjs4ntos/piu/badge" alt="CodeFactor" />
    </a> 
    <a href="https://snyk.io/test/github/JJS4ntos/Piu/badge.svg?targetFile=package.json">
        <img src="https://snyk.io/test/github/JJS4ntos/Piu/badge.svg?targetFile=package.json" alt="Vulnerabilities" />
    </a>
    <a href="https://packagist.org/packages/piu/piu">
        <img src="https://poser.pugx.org/piu/piu/version" alt="Latest Stable Version">
    </a>
    <a href="https://packagist.org/packages/piu/piu">
        <img src="https://poser.pugx.org/piu/piu/v/unstable" alt="Latest Unstable Version">
    </a>
    <a href="https://packagist.org/packages/piu/piu/license">
        <img src="https://poser.pugx.org/piu/piu/license" alt="Latest Unstable Version">
    </a>
</p>

<h3 align="center">Atenção - Sistema em desenvolvimento</h3>
<p align="center">
    <img src="https://github.com/JJS4ntos/Piu/blob/master/piu.gif">
</p>

Sistema para gerenciar escolas ou instituições de ensino fazendo o controle de matrículas, professores, alunos, matérias, etc. O foco do sistema é apresentar uma solução mais simplista possível para o usuário, fazendo com que a curva de aprendizado seja bastante suave.

### Principais diretrizes

  - Agilidade na inserção de dados.
  - Facilidade na leitura dos dados.
  - Portabilidade em diferentes modelos de ensino.


### Requisitos

    Requer a instalação da versão estável do [Node.js](https://nodejs.org/). (Somente em desenvolvimento)
    Requer Php >= 7.1.3.
    Requer MySQL >= 5.6

### Instalação

- Instale via composer

        composer create-project piu/piu
    
- Realize a instalação das dependências

        composer install

- Configure o arquivo .env com as informações do banco de dados e do seu servidor de e-mail

- Inicie a execução das migrations (criarão a estrutura do seu banco de dados)

        php artisan migrate
        
- Agora você está pronto para usar :wink:

### Opcional

Caso você queira utilizar o Piu como base de um projeto maior e pensa em desenvolver encima dele, então você deverá fazer mais algumas coisas como:
    
    npm install
    npm run watch

Os comandos acima servem para instalar as dependências do node e acompanhar as mudanças no código (build automático), caso pretenda fazer modificações no frontend que é feito em Vuejs.


