Installation
============

1. Clone and cd to project dir
1. `docker-compose up` 
1. `make docker-composer-install`
1. `make docker-yii-init`
1. `make docker-migrate`
1. Put to `/etc/hosts`:
```
127.0.0.1 frontend.localhost
127.0.0.1 backend.localhost
```
1. Open http://frontend.localhost , http://backend.localhost 