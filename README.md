
<h1 align="center">Yii2 Builder</h1>

Yii2 Builder - расширение для модуля Gii в фреймворке Yii2 упрощающее генерацию файлов. 

Цель: сделать простой и быстрый инструмент генерацию файлов.

### Содержание:

- [Установка](#yii2-builder-setup)
- [Использование](#yii2-builder-use)

___

<h2 align="center"> <span id="yii2-builder-setup"></span>
    Установка
</h2>

<h3>Требования</h3> <span id="yii2-builder-setup-require"></span>

- php >=8.0
- Yii2

<h3>
    <a href="https://getcomposer.org/download/">Composer</a>
</h3> <span id="yii2-builder-setup-composer"></span>

## Добавление пакета в проект

<h3>Используя: консольные команды. <small><i>(Предпочтительней)</i></small></h3><span id="yii2-migrate-architect-setup-composer-cli"></span>

- используя composer, установленный локально
```bash
composer require andy87/yii2-builder
````  
- используя composer.phar
```bash
php composer.phar require andy87/yii2-builder
```
**Далее:** обновление зависимостей `composer install`


<h3>Используя: файл `composer.json`</h3><span id="yii2-builder-setup-composer-composer-json"></span>

Открыть файл `composer.json`  
В раздел, ключ `require` добавить строку  
`"andy87/yii2-builder": "*"`  
**Далее:** обновление зависимостей `composer install`

<p align="center">- - - - -</p>

В конфигурационном файле `config/web-local.php`/`frontend/config/main-local.php` настроить расширение gii:  
`andy87\yii2\architect\components\controllers\ArchitectController`

```php
use andy87\yii2\builder\components\Builder;

$config['modules']['gii'] = [
        'class' => yii\gii\Module::class,
        'generators' => [
            Builder::ID => [
                'class' => Builder::class,
                'pathCache' => '@frontend/runtime/cache-yii2-builder/',
            ]
        ]
    ];
```

## Использование <span id="yii2-builder-use"></span>

Для использования расширения необходимо перейти в раздел `Gii` и выбрать генератор `Builder`.  

В разделе `Builder` доступно:  
1. Описать новую сущность системы  
2. Редактировать существующую сущность  

При создании/редактировании сущности доступно:  
* Название сущности  
* Описание сущности  
* **Настройка полей сущности**  
 [\_] Название поля  
 [\_] Комментарий  
 [\_] тип поля (string, integer, text, date, datetime, time, boolean, float)  
 [\_] длина поля  
 [\_] значение по умолчанию  
 [\_] required  
 [\_] foreignKey  
* **Настройка фильтра генерации файлов**  
```
 [_] common/
     [_] models/sources/{{PascalCase}}Source
     [_] models/sources/{{PascalCase}}
     [_] repository/{{PascalCase}}Repository
     [_] service/{{PascalCase}}Service
     [_] tests/unit/services/{{PascalCase}}Service  
 
 [_] console/
     [_] models/items/{{PascalCase}}  
     [_] repository/{{PascalCase}}Repository  
     [_] service/{{PascalCase}}Service  
 
 [_] backend/
     [_] models/items/{{PascalCase}}  
     [_] repository/{{PascalCase}}Repository  
     [_] service/{{PascalCase}}Service  
     [_] controllers/{{PascalCase}}Controller  
     [_] views/{{kebab-case}}/
         [_] list  
         [_] create  
         [_] update  
         [_] view  
         [_] _form  
     [_] resources/{{kebab-case}}/
         [_] {{PascalCase}}ListResources  
         [_] {{PascalCase}}CreateResources  
         [_] {{PascalCase}}UpdateResources  
         [_] {{PascalCase}}ViewResources  
     [_] tests/
         [_] service/{{PascalCase}}ServiceTest  
         [_] functional/{{PascalCase}}Cest  
         [_] unit/service/{{PascalCase}}ServiceTest
 
 [_] frontend/
     [_] models/items/{{PascalCase}}  
     [_] repository/{{PascalCase}}Repository  
     [_] service/{{PascalCase}}Service  
     [_] controllers/{{PascalCase}}Controller  
     [_] resources/{{kebab-case}}/
         [_] <Item>ListResources  
         [_] <Item>ViewResources  
     [_] views/{{kebab-case}}/
         [_] list  
         [_] view  
     [_] tests/
         [_] service/{{PascalCase}}ServiceTest  
         [_] functional/{{PascalCase}}Cest  
         [_] unit/service/{{PascalCase}}ServiceTest  
``` 

[Packagist](https://packagist.org/packages/andy87/yii2-builder)