<div align="center">

<img alt="KPlaysy - Plataforma de Reels Infantis" src="public/logo.png" width="120" />

### KPlaysy — Plataforma de Reels Infantis com Acessibilidade

Experiência segura e inclusiva de vídeos curtos para crianças, incluindo recursos de acessibilidade para crianças PCDs.

</div>

### Visão geral

O KPlaysy é uma aplicação web construída em Laravel cujo objetivo é oferecer uma plataforma de vídeos curtos (estilo reels) focada no público infantil, com ênfase em acessibilidade e inclusão. O projeto contempla curadoria de conteúdo, playlists e interação por curtidas, além de diretrizes para uma UX segura para crianças.

### Principais recursos

- Conteúdo em formato de vídeos curtos (reels)
- Listagem de vídeos e playlists
- Curtidas em vídeos (`POST /videos/like`)
- Autenticação e sessão com Jetstream/Sanctum
- Painel inicial (`GET /`) e catálogo de vídeos (`GET /videos`)
- Acessibilidade dedicada a crianças PCDs (detalhes abaixo)

### Acessibilidade e Inclusão (PCDs)

- Legendas e transcrições planejadas para todos os vídeos
- Contraste adequado e tipografia legível para baixa visão
- Elementos de foco visível e navegação por teclado
- Descrições de mídia (texto alternativo) e rótulos claros
- Controles grandes e com alvo de toque confortável
- Feedback sonoro/visual opcional para ações (ex.: curtir)

> Observação: nem todos os pontos acima podem estar 100% implementados ainda; veja a seção “Roadmap”.

---

## Stack técnica

- PHP (Laravel 8.x) — `laravel/framework:^8.75`
- Jetstream + Livewire — `laravel/jetstream`, `livewire/livewire`
- Autenticação — `laravel/sanctum`
- Processamento de vídeo — `php-ffmpeg/php-ffmpeg`
- Front-end — Blade, Tailwind, Bootstrap 5, jQuery (uso pontual)
- Build de assets — Laravel Mix (webpack) e Vite presentes no repo; scripts oficiais utilizam Mix
- Deploy estático de assets — configurado para Vercel (ver `vercel.json`)

## Começando

### Pré-requisitos

- PHP 8.0+ (o projeto suporta ^7.3|^8.0, recomenda-se 8.x)
- Composer
- Node.js 18+ e npm
- MySQL/MariaDB ou outro banco suportado pelo Laravel

### Instalação

1. Clone o repositório

   ```bash
   git clone <URL_DO_REPO>
   cd projeto1-KPlay
   ```

2. Dependências PHP

   ```bash
   composer install
   ```

3. Variáveis de ambiente

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

   Configure no `.env` o acesso ao banco de dados (DB_HOST, DB_DATABASE, DB_USERNAME, DB_PASSWORD) e URLs.

4. Banco de dados: migrações e seeds

   ```bash
   php artisan migrate --seed
   ```

5. Link de storage (para servir uploads públicos)

   ```bash
   php artisan storage:link
   ```

6. Dependências JS e build

   ```bash
   npm install
   npm run dev
   # ou
   npm run production
   ```

### Executando a aplicação

```bash
php artisan serve
```

Acesse `http://localhost:8000`.

Rotas principais:

- `GET /` — página inicial
- `GET /videos` — listagem de vídeos
- `POST /videos/like` — curtir vídeo (pode exigir autenticação)

## Scripts úteis (npm)

- `npm run dev` / `npm run production` — build com Laravel Mix (veja `webpack.mix.js`)
- `npm run watch` — recompilação no desenvolvimento
- `npm run lint:check` / `npm run lint:fix` — formatação com Prettier (inclui Blade)
- `npm test` — testes JavaScript com Jest

## Testes

- PHP (PHPUnit):

  ```bash
  ./vendor/bin/phpunit
  ```

- JavaScript (Jest):
  ```bash
  npm test
  ```

## Desenvolvimento de Front-end

- Estilos: `resources/scss/` e `resources/css/`
- Scripts: `resources/js/`
- Views Blade: `resources/views/`
- Assets compilados são gerados em `public/`

Observação: há um `vite.config.js`, porém o fluxo oficial deste projeto usa Laravel Mix conforme os scripts do `package.json` e o arquivo `webpack.mix.js`.

## Processamento de Vídeo

O projeto inclui `php-ffmpeg/php-ffmpeg` para operações de vídeo. Dependências do sistema (ex.: FFmpeg) devem estar instaladas no ambiente para funcionalidades de transcodificação, thumbnails, etc.

## Deploy

### Vercel

Este repositório inclui `vercel.json` com:

```json
{ "buildCommand": "npm install && npm run production", "outputDirectory": "public" }
```

Como Laravel é uma aplicação PHP, você pode optar por:

- Usar um servidor PHP (VPS/Forge) e apontar o document root para `public/`;
- Utilizar integrações que suportem Laravel em serverless; ou
- Hospedar apenas assets estáticos na Vercel e rodar o backend em outro provedor (recomendado).

Para setups gerenciados, considere Laravel Forge, Ploi, Railway, Fly.io ou plataformas com suporte nativo a PHP/Laravel.

## Roadmap de Acessibilidade

- Legendas automáticas e editor de transcrição
- Modo alto contraste e ajuste de tamanho de fonte persistente
- Preferências de acessibilidade por perfil da criança
- Descrições de áudio para vídeos selecionados
- Testes de usabilidade com crianças PCDs e revisão contínua WCAG 2.2 AA

## Contribuição

Contribuições são bem-vindas! Abra uma issue com sugestões e pontos de acessibilidade. Para PRs, descreva claramente o impacto na UX infantil e em PCDs.

## Licença

Este projeto é distribuído sob a licença MIT. Consulte o arquivo de licença correspondente quando aplicável.
