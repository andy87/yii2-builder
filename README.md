
<h1 align="center">Yii2 Builder</h1>

Yii2 Builder - расширение для модуля Gii в фреймворке Yii2 упрощающее написание генерацию файлов. 

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

$config['module']['gii'] = [
    'class' => 'yii\gii\Module',
    'allowedIPs' => ['127.0.0.1', '::1'],
    'generators' => [
        'builder' => [
            'class' => Builder::class,
            'template' => [
                'default' => '@vendor/andy87/builder/templates/default',
            ]           
        ],
    ],
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
 [_] Название поля  
 [_] Комментарий  
 [_] тип поля (string, integer, text, date, datetime, time, boolean, float)  
 [_] длина поля  
 [_] значение по умолчанию   
 [_] required   
 [_] foreignKey   
* **Настройка фильтра генерации файлов**  
 [_] common/models/sources/<Item>Source  
 [_] common/models/sources/<Item>  
 [_] common/repository/<Item>Repository  
 [_] common/service/<Item>Service*  
 [_] common/models/
 [_] console/models/items/<Item>  
 [_] console/repository/<Item>Repository  
 [_] console/service/<Item>Service  
 [_] backend/models/items/<Item>  
 [_] backend/repository/<Item>Repository  
 [_] backend/service/<Item>Service  
 [_] backend/controllers/<Item>Controller  
 [_] backend/views/<Item>/list  
 [_] backend/views/<Item>/create  
 [_] backend/views/<Item>/update  
 [_] backend/views/<Item>/view  
 [_] backend/views/<Item>/_form  
 [_] backend/views/<Item>/_search  
 [_] backend/resources/<Item>/<Item>ListResources  
 [_] backend/resources/<Item>/<Item>CreateResources  
 [_] backend/resources/<Item>/<Item>UpdateResources  
 [_] backend/resources/<Item>/<Item>ViewResources
 [_] frontend/models/items/<Item>  
 [_] frontend/repository/<Item>Repository  
 [_] frontend/service/<Item>Service  
 [_] frontend/controllers/<Item>Controller
 [_] frontend/resources/<Item>/<Item>ListResources  
 [_] frontend/resources/<Item>/<Item>ViewResources  
 [_] frontend/views/<Item>/list  
 [_] frontend/views/<Item>/view

[Packagist](https://packagist.org/packages/andy87/yii2-builder)
