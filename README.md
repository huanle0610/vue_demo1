# vue_demo1

> A Vue.js project

## Build Setup

``` bash
# install dependencies
npm install

# serve with hot reload at localhost:8080
npm run dev

# build for production with minification
npm run build

# build for production and view the bundle analyzer report
npm run build --report
```

for php
```nginx
  server {
  listen 80;
  server_name vue.amtf.com;
  root /data/projects/web/ci_vue/;

  index index.html index.htm index.php ;

  location / {
                 try_files $uri $uri/ /index.php;
  }

  location ~ \.php$ {
      include fastcgi_params;
      fastcgi_pass php_process;
      fastcgi_index index.php;
      fastcgi_param SCRIPT_FILENAME    $document_root$fastcgi_script_name;
      fastcgi_read_timeout 600;
      }
  }
 ```
for webpack
```nginx
server {
  listen 80;
  server_name vue.demo.com;
  root /data/projects/web/vue/vue_demo1;

  index index.html index.htm index.php ;

  location / {
                    try_files $uri $uri/ /index.php;
  }

  location ~* \.(html|css|js)(\?[0-9]+)?$ {
                   proxy_pass http://localhost:8080;
  }

  location /__webpack_hmr {
                   proxy_pass http://localhost:8080;
  }

  location /welcome {
                   proxy_pass http://vue.amtf.com;
  }

  location ~ \.php$ {
      include fastcgi_params;
      fastcgi_pass php_process;
      fastcgi_index index.php;
      fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
      fastcgi_read_timeout 600;
    }
  }
``
For detailed explanation on how things work, checkout the [guide](http://vuejs-templates.github.io/webpack/) and [docs for vue-loader](http://vuejs.github.io/vue-loader).
