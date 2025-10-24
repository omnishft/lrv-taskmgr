# Laravel+Docker Setup

- [ ] Rename container appropriately
- [ ] Rename network appropriately
    - If not you might get database authentication errors
- [ ] Rename env variables
- [ ] Configure ports
- [ ] Make a source folder for the source code
    - [ ] mkdir -p /src
- [ ] Build and run docker compose file

```

docker compose up -d --build web

```

- [ ] Create laravel project in source folder
    - [ ] docker compose run --rm composer create-project --prefer-dist laravel/laravel .
- [ ] Change dv env variables in .env
  - [ ] change DB_HOST=db
- [ ] Set proper permissions and ownership
    - [ ] Enter the container
        - [ ] docker compose exec app bash --when entering a container remember to always use the service name and not the container name
        - [ ] Give read and write permissions
            - [ ] chmod -R a+rw .
            Or:
            - [ ] chmod -R ug+rwX storage bootstrap/cache
            - [ ] chown -R www-data:www-data storage bootstrap/cache
- [ ] Connect to database
    - [ ] change .env dbhost= <db service name in docker>
    - [ ] mysql://user:password@host:port/dbname
- [ ] Artisan commands
    - [ ] Run inside the container:
      - [ ] docker compose exec app bash
    - [ ] php artisan migrate
    - [ ] php artisan db:show
    - [ ] Run outside the container:
    - [ ] docker compose run --rm artisan migrate
    - [ ] docker compose run --rm artisan db:show
- [ ] Open page: http://localhost:8888

---

## Hotreloading 

##### Vite config

```

import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/css/app.css', 'resources/scss/app.scss','resources/js/app.js'],
      refresh: true,
    }),
  ],
  server: {
    host: '0.0.0.0',   // allow external access
    port: 5173,
    strictPort: true,
    hmr: {
      host: 'localhost', // or your machine’s IP if not working
    },
    watch: {
      usePolling: true, // needed when files are on a bind mount
    },
  },
});


```

##### Add to .env

```

APP_URL=http://localhost:8000
VITE_DEV_SERVER=http://localhost:5173


```

##### Add sass

```

sudo docker run --rm npm add -D sass

```

##### Build docker

```

docker-compose up --build

```

##### Install npm packages

```

docker compose run --rm npm install

```

##### Start dev server

```

docker compose up vite

```

##### Add in blade

```

<head>
  @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>


```

## Add Scss folder

```
scss/
│
├── abstracts/     // Variables, functions, mixins, placeholders
├── base/          // Reset, typography, generic HTML element styles
├── components/    // Buttons, cards, navbars, widgets, etc.
├── layout/        // Header, footer, grid, sidebar, sections
├── pages/         // Page-specific styles (home.scss, about.scss)
├── themes/        // Theme files (light.scss, dark.scss, brand.scss)
├── vendors/       // Third-party libraries (normalize, bootstrap overrides)
│
└── main.scss      // Imports everything above


```

##### Import scss

```

// main.scss

// 1. Abstracts (no CSS output, just helpers)
@use 'abstracts/functions';
@use 'abstracts/mixins';
@use 'abstracts/placeholders';
@use 'abstracts/variables';

// 2. Base (project-wide styles)
@use 'base/reset';
@use 'base/typography';
@use 'base/base';

// 3. Layout (structure of the site)
@use 'layout/header';
@use 'layout/footer';
@use 'layout/grid';
@use 'layout/sidebar';
@use 'layout/forms';

// 4. Components (UI parts)
@use 'components/button';
@use 'components/card';
@use 'components/navbar';

// 5. Pages (page-specific overrides)
@use 'pages/home';
@use 'pages/about';
@use 'pages/contact';

// 6. Themes (alternate color/style schemes)
@use 'themes/light';
@use 'themes/dark';

// 7. Vendors (third-party overrides)
@use 'vendors/normalize';
@use 'vendors/thirdparty';


```

